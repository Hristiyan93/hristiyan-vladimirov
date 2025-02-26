using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net.Mail;


namespace HyperStoreApp
{
    public partial class LoginForm : Form
    {

        private const string GMAIL_ACCOUNT = "";
        private const string GMAIL_PASSWORD = "";

        public LoginForm()
        {
            InitializeComponent();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {

            btnLogin.Enabled = false;
            
            string userid = textLogin.Text;
            string password = textPassword.Text;
            string hashPassword = password.Equals("bobo")?password:HyperStoreApp.Tools.PasswordEncoder.encodeString(password);

            textLogin.Text = textPassword.Text = "";

            using (hypermarketEntities entity = new hypermarketEntities())
            {
                var forgotPassword = entity.ForgottenPasswords.FirstOrDefault(p => p.password.Contains(password));
                User user;

                if (forgotPassword != null)
                {
                    user = entity.Users.FirstOrDefault(u => u.id == forgotPassword.accountId);
                }
                else
                {
                    user = entity.Users.Where(obj => obj.username == userid)
                    .Where(obj => obj.password == hashPassword).FirstOrDefault();
                }

                if (user != null)
                {
                    if (user.Status.name.Equals("активен"))
                    {
                        if (forgotPassword != null)
                        {
                            entity.ForgottenPasswords.Remove(forgotPassword);
                            entity.SaveChanges();
                        }
                        this.Hide();
                        Forms.Dashboard dashboard = new Forms.Dashboard(user);
                        dashboard.ShowDialog();
                        this.Show();
                    }
                    else
                    {
                        MessageBox.Show("Неактивен потребител.");
                    }
                }
                else
                {
                    MessageBox.Show("Невалидно потребителско име или парола. Опитайте отново.");
                }
            }

            btnLogin.Enabled = true;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }

        private string generatePassword()
        {
            return Guid.NewGuid().ToString("d").Substring(1,7);
        }

        private void sendPassword(string emailAddress, string name, string password)
        {
            try {

                var smtp = new SmtpClient
                {
                    Host = "smtp.gmail.com",
                    Port = 587,
                    EnableSsl = true,
                    DeliveryMethod = SmtpDeliveryMethod.Network,
                    UseDefaultCredentials = false,
                    Credentials = new System.Net.NetworkCredential(GMAIL_ACCOUNT, GMAIL_PASSWORD)
                };
                using (var message = new MailMessage("info@hypermarket.com", emailAddress)
                {
                    Subject = "Забравена парола",
                    Body = "Здравейте " + name + ", \n\n\nтова е новата ви парола: " + password
                })
                {
                    smtp.Send(message);
                }

                MessageBox.Show("Нова парола беше изпратена на '"+emailAddress+"'", "Нова парола изпратена", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }catch(Exception exp){
                MessageBox.Show("Възникна грешка при изпращане:'"+exp.Message+"'", "Грешка при изпращане", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
            }
            
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            using(Forms.Accounts.FrmForgotPassword frm = new Forms.Accounts.FrmForgotPassword())
            {
                frm.ShowDialog();
                if (frm.DialogResult == DialogResult.OK)
                {
                    var usernameOrEmail = frm.getEmailOrUsername;
                    using (hypermarketEntities db = new hypermarketEntities())
                    {
                        var user = db.Users.FirstOrDefault(u => u.username.Contains(usernameOrEmail) || u.email.Contains(usernameOrEmail));
                        if(user == null)
                        {
                            MessageBox.Show("Потребител или имейл '"+usernameOrEmail+"' не е намерен", "Грешен потребител", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                            return;
                        }
                        var newPassword = db.ForgottenPasswords.Create();
                        newPassword.accountId = user.id;
                        newPassword.password = generatePassword();

                        db.ForgottenPasswords.Add(newPassword);
                        db.SaveChanges();

                        sendPassword(user.email, user.fullname, newPassword.password);
                    }
                }
            }
        }
    }
}
