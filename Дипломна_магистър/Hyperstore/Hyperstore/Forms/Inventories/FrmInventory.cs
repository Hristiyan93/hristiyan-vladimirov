using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Inventories
{
    public partial class FrmInventory : Form
    {
        private const int QTY_COL = 0;
        private const int PRODUCT_COL = 1;
        private const int BARCODE_COL = 2;

        hypermarketEntities db;
        Inventory inventory;

        public FrmInventory(int inventoryId)
        {
            InitializeComponent();
            db = new hypermarketEntities();

            inventory = db.Inventories.Find(inventoryId);

            cbQty.SelectedIndex = 0;

            inventoryFoundDatasource.DataSource = inventory.InventoryDetails.Where(p => p.qtyActual > 0).ToList();
            inventoryStockDatasource.DataSource = inventory.InventoryDetails.Where(p => p.qtyInStock > p.qtyActual).ToList();

            lblDepartment.Text = inventory.Department.departmentName;
            this.ActiveControl = tbBarcode;

            dgChecked.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgChecked.MultiSelect = false;

            dgStock.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgStock.MultiSelect = false;
        }

        private void dgChecked_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (InventoryDetail)row.DataBoundItem;
                    row.Cells[PRODUCT_COL].Value = item.Product.name;
                    row.Cells[BARCODE_COL].Value = item.Product.barcode;
                }
            }
        }

        private void dgStock_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (InventoryDetail)row.DataBoundItem;
                    row.Cells[QTY_COL].Value = item.qtyInStock - item.qtyActual;
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
            if (string.IsNullOrWhiteSpace(barcode)) return;

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
            //check product has been in inventory
            var stockProduct = inventory.InventoryDetails.FirstOrDefault(p => p.productId == product.Id);
            if (stockProduct == null)
            {
                MessageBox.Show("От продукт '" + product.name + "' няма наличности в този департамент", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }
            if (shouldAdd)
            {
                //check qties to match adding
                if (stockProduct.qtyActual + qty > stockProduct.qtyInStock)
                {
                    MessageBox.Show("Сканирано е по-голямо количество '" + (stockProduct.qtyActual + qty) + "' от наличното '" + stockProduct.qtyInStock + "' за продукт '" + product.name + "'", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
                stockProduct.qtyActual += qty;
            }
            else
            {
                //check qties to match subtracting
                if (qty > stockProduct.qtyActual)
                {
                    MessageBox.Show("Сканирано е по-голямо количество '" + qty + "' от полученото '" + stockProduct.qtyActual + "' за продукт '" + product.name + "'", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    return;
                }
                stockProduct.qtyActual -= qty;
            }

            inventoryFoundDatasource.DataSource = inventory.InventoryDetails.Where(p => p.qtyActual > 0).ToList();
            inventoryStockDatasource.DataSource = inventory.InventoryDetails.Where(p => p.qtyInStock > p.qtyActual).ToList();
        }

        private void dgStock_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var product = (InventoryDetail)inventoryStockDatasource.Current;
            if (product != null)
            {
                tbBarcode.Text = product.Product.barcode;
                sendBarcode();
            }
        }

        private void dgChecked_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            var product = (InventoryDetail)inventoryFoundDatasource.Current;
            if (product != null)
            {
                tbBarcode.Text = product.Product.barcode;
                rbRemove.Checked = true;
                sendBarcode();
            }
        }

        private void FrmInventory_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                var allQtyChecked = true;

                foreach (InventoryDetail product in inventory.InventoryDetails)
                {
                    if (product.qtyActual != product.qtyInStock)
                    {
                        allQtyChecked = false;
                        break;
                    }
                }
                if (!allQtyChecked)
                {
                    if (MessageBox.Show("Не всички продукти са проверени. Продължаване?", "Грешка", MessageBoxButtons.OKCancel, MessageBoxIcon.Error) != DialogResult.OK)
                    {
                        e.Cancel = true;
                        return;
                    }
                    else
                    {
                        inventory.statusId = 3;
                    }
                }
                else
                {
                    inventory.statusId = 2;
                }
                db.SaveChanges();
            }
            else
            {
                if (MessageBox.Show("Сигурни ли сте?", "Отказване инвентаризация", MessageBoxButtons.YesNo, MessageBoxIcon.Asterisk) == DialogResult.No)
                {
                    e.Cancel = true;
                }
            }
        }
    }
}
