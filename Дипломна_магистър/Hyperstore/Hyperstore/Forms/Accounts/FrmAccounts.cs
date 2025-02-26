using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Accounts
{
    public partial class FrmAccounts : Form
    {
        hypermarketEntities db;

        public FrmAccounts()
        {
            this.InitializeComponent();
            dgAccounts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgAccounts.MultiSelect = false;
        }

        private void dgAccounts_RowPrePaint(object sender, DataGridViewRowPrePaintEventArgs e)
        {
            e.PaintParts &= ~DataGridViewPaintParts.Focus;
        }

        private void AccountsForm_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            usersListBindingSource.DataSource = db.UsersLists.ToList();
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using (FrmAddEditAccounts frm = new FrmAddEditAccounts(0))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                    usersListBindingSource.DataSource = db.UsersLists.ToList();
            }
        }

        private User itemFromList()
        {
            UsersList user = (UsersList)usersListBindingSource.Current;
            return user!=null? db.Users.FirstOrDefault(obj => obj.id == user.id):null;
        }

        private void editItem()
        {
            User user = itemFromList();
            if (user == null)
                return;
            using (FrmAddEditAccounts frm = new FrmAddEditAccounts(user.id))
            {
                if (frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    usersListBindingSource.DataSource = db.UsersLists.ToList();
                }
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            editItem();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            User user = itemFromList();
            if (user != null)
            {
                if (MessageBox.Show("Изтриване на запис?", "Изтриване", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                {
                    db.Users.Remove(user);
                    usersListBindingSource.RemoveCurrent();
                    db.SaveChanges();
                }
            }
        }

        private void dgAccounts_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            editItem();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
