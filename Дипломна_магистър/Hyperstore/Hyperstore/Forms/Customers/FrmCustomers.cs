using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using FrmType = HyperStoreApp.Forms.Customers.FrmAddEditCustomer;

namespace HyperStoreApp.Forms.Customers
{
    public partial class FrmCustomers : Form
    {
        hypermarketEntities db;

        public FrmCustomers()
        {
            InitializeComponent();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private Customer itemFromList()
        {
            CustomersList item = (CustomersList)customersListBindingSource.Current;
            return item == null ? null : db.Customers.FirstOrDefault(obj => obj.Id == item.Id);
        }

        private void editItem()
        {
            Customer item = itemFromList();
            if (item == null)
                return;
            using (FrmType frm = new FrmType(item.Id))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    customersListBindingSource.DataSource = db.CustomersLists.ToList();
                }
            }
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using (FrmType frm = new FrmType(0))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                    customersListBindingSource.DataSource = db.CustomersLists.ToList();
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            editItem();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            Customer item = itemFromList();
            if (item != null)
            {
                if (MessageBox.Show("Изтриване на запис?", "Изтриване", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                {
                    db.Customers.Remove(item);
                    customersListBindingSource.RemoveCurrent();
                    db.SaveChanges();
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dgView_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            editItem();
        }

        private void FrmCustomers_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            customersListBindingSource.DataSource = db.CustomersLists.ToList();
        }
    }
}
