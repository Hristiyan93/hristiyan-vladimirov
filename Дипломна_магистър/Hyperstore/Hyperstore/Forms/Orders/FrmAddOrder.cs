using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


namespace HyperStoreApp.Forms.Orders
{

    public partial class FrmAddOrder : Form
    {
        private const int VENDOR_COL = 3;
        private const int PRODUCT_COL = 1;

        hypermarketEntities db;
        Order order;

        public FrmAddOrder(User user)
        {
            InitializeComponent();

            db = new hypermarketEntities();
            order = db.Orders.Create();
            order.employeeId = user.id;
            order.date = DateTime.Now;
            order.departmentId = user.departmentId;
            order.statusId = 1;
            order.totalCost = 0;

            orderBindingSource.DataSource = order;

            db.Orders.Add(order);
            lblUser.Text = order.User.fullname;
            lblDate.Text = String.Format("{0:d/M/yyyy HH:mm:ss}", order.date);

            comboBox1.DataSource = db.Departments.ToList();
            comboBox1.DisplayMember = "departmentName";
            comboBox1.ValueMember = "Id";

            //init available products
            dgProducts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgProducts.MultiSelect = false;
            productBindingSource.DataSource = db.Products.ToList();

            //init ordered products]
            dgOrderProducts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgOrderProducts.MultiSelect = false;
            orderDetailBindingSource.DataSource = order.OrderDetails.ToList();

            cbQty.SelectedIndex = 0;

            this.ActiveControl = tbBarcode;
        }

        private void updateTotalCost()
        {
            double? price = 0.0;
            foreach(OrderDetail product in order.OrderDetails)
            {
                price += product.price * product.qtyOrdered;
            }
            order.totalCost = (double)price;
            orderBindingSource.ResetBindings(true);
        }

        private void addProductQty(Product product, int qty)
        {
            //to check product exist
            var orderProduct = order.OrderDetails.FirstOrDefault(p => p.productId == product.Id);
            if (orderProduct != null)
            {
                orderProduct.qtyOrdered += qty;
            }
            else
            {
                var orderedProduct = db.OrderDetails.Create();
                orderedProduct.productId = product.Id;
                orderedProduct.price = product.priceBuy;
                orderedProduct.qtyOrdered = qty;
                orderedProduct.qtyReceived = 0;
                orderedProduct.Product = product;
                order.OrderDetails.Add(orderedProduct);
            }
            updateTotalCost();
        }

        private void removeProductQty(Product product, int qty)
        {
            var orderProduct = order.OrderDetails.FirstOrDefault(p => p.productId == product.Id);
            if (orderProduct != null)
            {
                if (orderProduct.qtyOrdered > qty)
                {
                    orderProduct.qtyOrdered -= qty;
                }
                else
                {
                    order.OrderDetails.Remove(orderProduct);
                }
                updateTotalCost();
            }
        }

        private void sendBarcode()
        {
            string barcode = tbBarcode.Text;
            tbBarcode.Clear();

            var qty = int.Parse(cbQty.SelectedItem.ToString());
            cbQty.SelectedIndex = 0;

            var shouldAdd = rbAdd.Checked;
            rbAdd.Checked = true;

            //check barcode
            var product = db.Products.FirstOrDefault(p => p.barcode.Contains(barcode));
            if (product == null)
            {
                MessageBox.Show("Невалиден баркод '" + barcode + "'", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            if (shouldAdd)
            {
                addProductQty(product, qty);
            }
            else
            {
                removeProductQty(product, qty);
            }
            orderDetailBindingSource.DataSource = order.OrderDetails.ToList();
        }

        [System.Runtime.InteropServices.DllImport("user32.dll")]
        private static extern IntPtr PostMessage(IntPtr hWnd, int msg, IntPtr wp, IntPtr lp);

        protected override bool ProcessCmdKey(ref Message msg, Keys keyData)
        {
            if (!tbBarcode.Focused)
            {
                PostMessage(tbBarcode.Handle, msg.Msg, msg.WParam, msg.LParam);
                tbBarcode.Focus();
                return true;
            }
            return base.ProcessCmdKey(ref msg, keyData);
        }

        private void tbBarcode_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter && !string.IsNullOrEmpty(tbBarcode.Text))
            {
                sendBarcode();
            }
        }

        private void dgProducts_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach(DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (Product)row.DataBoundItem;
                    row.Cells[VENDOR_COL].Value = item.Vendor.name;
                }
            }
        }

        private void dgProducts_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var product = (Product)productBindingSource.Current;
            if (product != null)
            {
                tbBarcode.Text = product.barcode;
                sendBarcode();
            }
        }

        private void dataGridView1_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (OrderDetail)row.DataBoundItem;
                    row.Cells[PRODUCT_COL].Value = item.Product.name;
                }
            }
        }

        private void dataGridView1_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var orderedProduct = (OrderDetail)orderDetailBindingSource.Current;
            if (orderedProduct != null)
            {
                removeProductQty(orderedProduct.Product, 1);
                orderDetailBindingSource.DataSource = order.OrderDetails.ToList();
            }
        }

        private void FrmAddOrder_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                if (order.OrderDetails.Count < 1)
                {
                    MessageBox.Show("Няма поръчани продукти.", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    e.Cancel = true;
                }
                else
                {
                    db.SaveChanges();
                }
            }
            else
            {
                if (MessageBox.Show("Сигурни ли сте?", "Отказване поръчка", MessageBoxButtons.YesNo, MessageBoxIcon.Asterisk) == DialogResult.No)
                {
                    e.Cancel = true;
                }
            }
        }
    }
}
