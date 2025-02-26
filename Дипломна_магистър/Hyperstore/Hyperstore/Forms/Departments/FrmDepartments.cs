using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using FrmType = HyperStoreApp.Forms.Departments.FrmAddEditDepartments;

namespace HyperStoreApp.Forms.Departments
{
    public partial class FrmDepartments : Form
    {
        hypermarketEntities db;
        public FrmDepartments()
        {
            InitializeComponent();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private Department itemFromList()
        {
            return (Department)departmentBindingSource.Current;
        }

        private void editItem()
        {
            Department item = itemFromList();
            if (item == null)
                return;
            using (FrmType frm = new FrmType(item.Id))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    departmentBindingSource.DataSource = db.Departments.ToList();
                }
            }
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using (FrmType frm = new FrmType(0))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                    departmentBindingSource.DataSource = db.Departments.ToList();
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            editItem();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            Department item = itemFromList();
            if (item != null)
            {
                if (MessageBox.Show("Изтриване на запис?", "Изтриване", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes)
                {
                    if (item.Id == 1)
                    {
                        MessageBox.Show("Не може да изтриете главен департамент", "Грешка при изтриване", MessageBoxButtons.OK, MessageBoxIcon.Question);
                        return;
                    }
                    if (item.Stocks.Count() > 0)
                    {
                        MessageBox.Show("В този департамент има позиционирани продукти", "Грешка при изтриване", MessageBoxButtons.OK, MessageBoxIcon.Question);
                        return;
                    }
                    if (item.Users.Count() > 0)
                    {
                        MessageBox.Show("Има асоциирани потребители с този департамент", "Грешка при изтриване", MessageBoxButtons.OK, MessageBoxIcon.Question);
                        return;
                    }
                    db.Departments.Remove(item);
                    departmentBindingSource.RemoveCurrent();
                    db.SaveChanges();
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void FrmDepartments_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            departmentBindingSource.DataSource = db.Departments.ToList();
        }

        private void dgView_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            editItem();
        }
    }
}
