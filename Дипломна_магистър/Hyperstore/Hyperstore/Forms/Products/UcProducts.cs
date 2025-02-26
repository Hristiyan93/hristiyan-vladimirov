using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using FrmType = HyperStoreApp.Forms.Products.FrmAddEditProduct;

namespace HyperStoreApp.Forms.Products
{
    public partial class UcProducts : UserControl
    {
        hypermarketEntities db;

        public UcProducts()
        {
            InitializeComponent();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private Product itemFromList()
        {
            ProductsList item = (ProductsList)productsListBindingSource.Current;
            return item == null ? null : db.Products.FirstOrDefault(obj => obj.Id == item.Id);
        }

        private void editItem()
        {
            Product item = itemFromList();
            if (item == null)
                return;
            using (FrmType frm = new FrmType(item.Id))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    productsListBindingSource.DataSource = db.ProductsLists.ToList();
                }
            }
        }

        private void UcProducts_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            productsListBindingSource.DataSource = db.ProductsLists.ToList();
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using (FrmType frm = new FrmType(0))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                    productsListBindingSource.DataSource = db.ProductsLists.ToList();
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            editItem();
        }

        private void dgView_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            editItem();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            Product item = itemFromList();
            if (item != null)
            {
                if (MessageBox.Show("Изтриване на запис?", "Изтриване", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes)
                {
                    if (item.Stocks.Count() > 0)
                    {
                        MessageBox.Show("Все още има наличности от този продукт", "Грешка при изтриване", MessageBoxButtons.OK, MessageBoxIcon.Question);
                        return;
                    }
                    db.Products.Remove(item);
                    productsListBindingSource.RemoveCurrent();
                    db.SaveChanges();
                }
            }
        }
    }
}
