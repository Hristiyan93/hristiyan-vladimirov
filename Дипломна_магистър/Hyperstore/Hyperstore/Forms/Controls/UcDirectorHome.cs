using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Controls
{
    public partial class UcDirectorHome : UserControl
    {

        hypermarketEntities db;

        public UcDirectorHome()
        {
            InitializeComponent();
        }

        private void UcDirectorHome_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            initLabels();
        }

        private void initLabels()
        {
            lblDepartments.Text = db.Departments.Count().ToString();
            lblEmployees.Text = db.Users.Select(u => u.statusId == 1).Count().ToString();
            lblClients.Text = db.CustomersLists.Count().ToString();
            lblVendors.Text = db.Vendors.Count().ToString();

            lblSales.Text = db.Sales.Count().ToString();
            lblSalesTotal.Text = (db.Sales.Sum(i => i.totalCost) - db.Sales.Sum(i => i.discountCost)).ToString();
            lblPurchases.Text = db.Orders.Count().ToString();
            lblPurchasesTotal.Text = db.Orders.Sum(i => i.totalCost).ToString();
        }
    }
}
