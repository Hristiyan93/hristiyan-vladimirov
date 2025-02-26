using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Departments
{
    public partial class FrmAddEditDepartments : Form
    {
        hypermarketEntities db;

        public FrmAddEditDepartments(int itemId)
        {
            InitializeComponent();
            db = new hypermarketEntities();
            Department item = db.Departments.FirstOrDefault(v => v.Id == itemId);
            if (item == null)
            {
                item = new Department();
                db.Departments.Add(item);
            }
            else
            {
                db.Departments.Attach(item);
            }
            departmentBindingSource.DataSource = item;
        }

        private void FrmAddEditDepartments_FormClosing(object sender, FormClosingEventArgs e)
        {
            if (DialogResult == DialogResult.OK)
            {
                db.SaveChanges();
            }
            e.Cancel = false;
        }
    }
}
