using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new LoginForm());
            //hypermarketEntities db = new hypermarketEntities();
            //Application.Run(new Forms.Dashboard(db.Users.First()));
            //Application.Run(new Forms.Dashboard(db.Users.Find(9)));
            //Application.Run(new Forms.Orders.FrmAddOrder(db.Users.First()));
            //Application.Run(new Forms.Accounts.FrmAccounts());
            //Application.Run(new Forms.Customers.FrmCustomers());
            //Application.Run(new Forms.Departments.FrmDepartments());
            //Application.Run(new Forms.Products.FrmProducts());

            //Application.Run(new Forms.Orders.FrmViewOrder(db.Orders.First()));
            //Application.Run(new Forms.Orders.FrmCompleteOrder(db.Orders.First()));
        }
    }
}
