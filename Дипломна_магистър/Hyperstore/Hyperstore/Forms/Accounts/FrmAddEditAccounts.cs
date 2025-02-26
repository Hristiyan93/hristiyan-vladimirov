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
    public partial class FrmAddEditAccounts : Form
    {
        hypermarketEntities db;
        User user;
        public FrmAddEditAccounts(int userId)
        {
            InitializeComponent();
            db = new hypermarketEntities();
            user = db.Users.FirstOrDefault(u => u.id == userId);

            if (user == null)
            {
                user = new User {
                    statusId = 1,
                    departmentId = 1,
                    usertypeId = 1
                };
                db.Users.Add(user);
            }
            else
            {
                db.Users.Attach(user);
            }
            userBindingSource.DataSource = user;

            comboBox1.DataSource = db.Departments.ToList();
            comboBox1.DisplayMember = "departmentName";
            comboBox1.ValueMember = "Id";

            comboBox2.DataSource = db.Usertypes.ToList();
            comboBox2.DisplayMember = "name";
            comboBox2.ValueMember = "Id";

            comboBox3.DataSource = db.Statuses.ToList();
            comboBox3.DisplayMember = "name";
            comboBox3.ValueMember = "Id";
        }

        private void frmAddEditAccounts_FormClosing(object sender, FormClosingEventArgs e)
        {
            if(DialogResult == DialogResult.OK)
            {
                var password = textBox4.Text;
                if (!string.IsNullOrWhiteSpace(password))
                {
                    user.password = Tools.PasswordEncoder.encodeString(password);
                }
                db.SaveChanges();
            }
            e.Cancel = false;
        }
    }
}
