using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Vendors
{
    public partial class FrmAddEditVendor : Form
    {

        hypermarketEntities db;

        public FrmAddEditVendor(int itemId)
        {
            InitializeComponent();
            db = new hypermarketEntities();
            Vendor item = db.Vendors.FirstOrDefault(v => v.Id == itemId);
            if (item == null)
            {
                item = new Vendor();
                db.Vendors.Add(item);
            }
            else
            {
                db.Vendors.Attach(item);
            }
            vendorBindingSource.DataSource = item;
        }

        private void FrmAddEditVendor_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                db.SaveChanges();
            }
            e.Cancel = false;
        }
    }
}
