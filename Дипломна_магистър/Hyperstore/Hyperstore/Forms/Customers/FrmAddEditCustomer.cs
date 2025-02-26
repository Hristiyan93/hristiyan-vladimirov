using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Customers
{
    public partial class FrmAddEditCustomer : Form
    {
        hypermarketEntities db;

        public FrmAddEditCustomer(int itemId)
        {
            InitializeComponent();
            db = new hypermarketEntities();
            Customer item = db.Customers.FirstOrDefault(v => v.Id == itemId);
            if (item == null)
            {
                item = new Customer {
                    discountId = 1
                };
                db.Customers.Add(item);
            }
            else
            {
                db.Customers.Attach(item);
            }
            customerBindingSource.DataSource = item;

            comboBox1.DataSource = db.Discounts.ToList();
            comboBox1.DisplayMember = "name";
            comboBox1.ValueMember = "Id";
       
        }

        private void FrmAddEditCustomer_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                if (string.IsNullOrEmpty(comboBox1.Text))
                {
                    MessageBox.Show("Моля, посочете отстъпка", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    e.Cancel = true;
                    return;
                }
                db.SaveChanges();
            }
            e.Cancel = false;
        }
    }
}
