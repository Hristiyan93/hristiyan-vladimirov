using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms
{
    public partial class Dashboard : Form
    {

        const int USER_ADMIN = 1;
        const int USER_MANAGER = 2;
        const int USER_EMPLOYEE = 3;
        const int USER_SELLER = 4;

        User userLogged;

        public Dashboard(User user)
        {
            InitializeComponent();
            userLogged = user;
            lblInfo.Text = user.fullname + ", " + user.Usertype.name + "@" + user.Department.departmentName;

            Forms.Controls.BaseMenu menu = getCustomMenu(user.usertypeId);
            menu.ButtonClick += buttonHandler;
            pnlMenu.Controls.Add(menu);
            startControl(getHomeControl(userLogged.usertypeId));
        }

        private Forms.Controls.BaseMenu getCustomMenu(int userRole)
        {
            switch (userRole)
            {
                case USER_ADMIN: return new Forms.Controls.UcAdministratorMenu();
                case USER_EMPLOYEE: return new Forms.Controls.UcEmployeeMenu();
            }
            return null;
        }

        private UserControl getHomeControl(int userRole)
        {
            return new Forms.Controls.UcDirectorHome();
        }

        private void buttonHandler(object sender, EventArgs e)
        {
            
            switch (((Button)sender).Tag)
            {
                case "exit":
                    {
                        this.Close();
                        break;
                    }
                case "home":
                    {
                        startControl(getHomeControl(userLogged.usertypeId));
                        break;
                    }
                case "orders":
                    {
                        startControl(new Forms.Orders.UcOrders(userLogged));
                        break;
                    }
                case "inventory":
                    {
                        startControl(new Forms.Inventories.UcInvetories(userLogged));
                        break;
                    }
                case "reports":
                    {
                        startControl(new Forms.Reports.UcReports());
                        break;
                    }
                case "customers":
                    {
                        startControl(new Forms.Customers.UcCustomers());
                        break;
                    }
                case "vendors":
                    {
                        startControl(new Forms.Vendors.UcVendors());
                        break;
                    }
                case "products":
                    {
                        startControl(new Forms.Products.UcProducts());
                        break;
                    }
                case "departments":
                    {
                        startControl(new Forms.Departments.UcDepartments());
                        break;
                    }
                case "employees":
                    {
                        startControl(new Forms.Accounts.UcAccounts());
                        break;
                    }
            }
            
        }

        private void startControl(Control control)
        {
            pnlMain.Controls.Clear();
            if (control != null) pnlMain.Controls.Add(control);
        }

    }
}
