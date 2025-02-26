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
    public partial class FrmForgotPassword : Form
    {

        public string getEmailOrUsername {
            get
            {
                return tbEmail.Text;
            }
        }

        public FrmForgotPassword()
        {
            InitializeComponent();
            this.ActiveControl = tbEmail ;
        }

        private void FrmForgotPassword_FormClosing(object sender, FormClosingEventArgs e)
        {
            if(DialogResult == DialogResult.OK)
            {
                if (string.IsNullOrWhiteSpace(tbEmail.Text))
                {
                    MessageBox.Show("Моля, въведете потребителско име или имейл.", "Празно име или парола", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                    e.Cancel = true;
                }
            }
        }
    }
}
