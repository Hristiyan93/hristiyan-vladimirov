using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Vendors
{
    public partial class UcVendors : UserControl
    {
        hypermarketEntities db;

        public UcVendors()
        {
            InitializeComponent();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private void UcVendors_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            vendorBindingSource.DataSource = db.Vendors.ToList();
        }

        private Vendor itemFromList()
        {
            Vendor vendor = (Vendor)vendorBindingSource.Current;
            return vendor == null ? null : db.Vendors.FirstOrDefault(obj => obj.Id == vendor.Id);
        }

        private void editItem()
        {
            Vendor item = itemFromList();
            if (item == null)
                return;
            using (FrmAddEditVendor frm = new FrmAddEditVendor(item.Id))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    vendorBindingSource.DataSource = db.Vendors.ToList();
                }
            }
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using (FrmAddEditVendor frm = new FrmAddEditVendor(0))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                    vendorBindingSource.DataSource = db.Vendors.ToList();
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
            Vendor item = itemFromList();
            if (item != null)
            {
                if (MessageBox.Show("Изтриване на запис?", "Изтриване", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                {
                    db.Vendors.Remove(item);
                    vendorBindingSource.RemoveCurrent();
                    db.SaveChanges();
                }
            }
        }
    }
}
