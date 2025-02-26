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
    public partial class FrmCompleteOrder : Form
    {
        private const int QTY_COL = 0;
        private const int PRODUCT_COL = 1;
        private const int BARCODE_COL = 2;

        hypermarketEntities db;
        Order order;

        public FrmCompleteOrder(Order order)
        {
            InitializeComponent();

            db = new hypermarketEntities();
            this.order = order;

            orderBindingSource.DataSource = order;

            lblDepartment.Text = order.Department.departmentName;
            lblUser.Text = order.User.fullname;
            lblDate.Text = String.Format("{0:d/M/yyyy HH:mm:ss}", order.date);

            dgReceivedProducts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgReceivedProducts.MultiSelect = false;

            dgOrderedProducts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgOrderedProducts.MultiSelect = false;

            receievedSource.DataSource = order.OrderDetails.Where(od => od.qtyReceived > 0).ToList();
            orderedSource.DataSource = order.OrderDetails.Where(od => od.qtyOrdered > od.qtyReceived).ToList();

            cbQty.SelectedIndex = 0;

            this.ActiveControl = tbBarcode;
        }

        private void dgOrderedProducts_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (OrderDetail)row.DataBoundItem;
                    row.Cells[QTY_COL].Value = item.qtyOrdered-item.qtyReceived;
                    row.Cells[PRODUCT_COL].Value = item.Product.name;
                    row.Cells[BARCODE_COL].Value = item.Product.barcode;
                }
            }
        }

        private void dgReceivedProducts_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (OrderDetail)row.DataBoundItem;
                    row.Cells[PRODUCT_COL].Value = item.Product.name;
                    row.Cells[BARCODE_COL].Value = item.Product.barcode;
                }
            }
        }

        private void tbBarcode_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter && !string.IsNullOrEmpty(tbBarcode.Text))
            {
                sendBarcode();
            }
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
            //check product has been ordered
            var orderedProduct = order.OrderDetails.FirstOrDefault(p => p.productId == product.Id);
            if(orderedProduct == null)
            {
                MessageBox.Show("Продукт '" + product.name + "' не е поръчван", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }
            if (shouldAdd)
            {
                //check qties to match adding
                if (orderedProduct.qtyReceived + qty > orderedProduct.qtyOrdered)
                {
                    MessageBox.Show("Сканирано е по-голямо количество '" + (orderedProduct.qtyReceived + qty) + "' от заявеното '" + orderedProduct.qtyOrdered + "' за продукт '" + product.name + "'", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
                orderedProduct.qtyReceived += qty;
            }
            else
            {
                //check qties to match subtracting
                if (qty > orderedProduct.qtyReceived)
                {
                    MessageBox.Show("Сканирано е по-голямо количество '" + qty + "' от полученото '" + orderedProduct.qtyReceived + "' за продукт '" + product.name + "'", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
                orderedProduct.qtyReceived -= qty;
            }

            receievedSource.DataSource = order.OrderDetails.Where(od => od.qtyReceived > 0).ToList();
            orderedSource.DataSource = order.OrderDetails.Where(od => od.qtyOrdered > od.qtyReceived).ToList();

        }

        private void dgOrderedProducts_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var product = (OrderDetail)orderedSource.Current;
            if (product != null)
            {
                tbBarcode.Text = product.Product.barcode;
                sendBarcode();
            }
        }

        private void dgReceivedProducts_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var product = (OrderDetail)receievedSource.Current;
            if (product != null)
            {
                tbBarcode.Text = product.Product.barcode;
                rbRemove.Checked = true;
                sendBarcode();
            }
        }

        private void FrmCompleteOrder_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                var allQtyReceived = true;

                foreach(OrderDetail product in order.OrderDetails)
                {
                    if (product.qtyOrdered != product.qtyReceived)
                    {
                        allQtyReceived = false;
                        break;
                    }
                }
                if (!allQtyReceived)
                {
                    if(MessageBox.Show("Не всички поръчани продукти са закупени. Продължаване?", "Грешка", MessageBoxButtons.OKCancel, MessageBoxIcon.Error) != DialogResult.OK)
                    {
                        e.Cancel = true;
                    }
                }
            }
            else
            {
                if (MessageBox.Show("Сигурни ли сте?", "Отказване получаване поръчка", MessageBoxButtons.YesNo, MessageBoxIcon.Asterisk) == DialogResult.No)
                {
                    e.Cancel = true;
                }
            }
        }
    }
}
