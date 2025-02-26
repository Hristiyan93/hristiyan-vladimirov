using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Products
{
    public partial class FrmAddEditProduct : Form
    {
        hypermarketEntities db;

        public FrmAddEditProduct(int itemId)
        {
            InitializeComponent();
            db = new hypermarketEntities();
            Product item = db.Products.FirstOrDefault(v => v.Id == itemId);
            if (item == null)
            {
                Vendor vendor = db.Vendors.FirstOrDefault();
                int vendorId = vendor != null ? vendor.Id : 0;
                item = new Product {
                    vendorId = vendorId
                };
                db.Products.Add(item);
            }
            else
            {
                db.Products.Attach(item);
            }
            productBindingSource.DataSource = item;

            comboBox1.DataSource = db.Vendors.ToList();
            comboBox1.DisplayMember = "name";
            comboBox1.ValueMember = "Id";
        }

        private void FrmAddEditProduct_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                try
                {
                    db.SaveChanges();
                }
                catch(DBConcurrencyException exception)
                {
                    MessageBox.Show("Записът е бил променен. Грешка:"+exception.Message);
                }
                catch(Exception exception)
                {
                    MessageBox.Show("Записът не може да бъде променен. Грешка:" + exception.Message);
                }
            }
            e.Cancel = false;
        }
    }
}
