using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Reports
{
    public partial class FrmReportProducts : Form
    {
        hypermarketEntities db;

        public FrmReportProducts()
        {
            InitializeComponent();
            db = new hypermarketEntities();

            StockBindingSource.DataSource = db.Stocks.ToList();
            ProductsBindingSource.DataSource = db.Products.ToList();
        }

        private void FrmReportProducts_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'DSProducts.Products' table. You can move, or remove it, as needed.
            this.ProductsTableAdapter.Fill(this.DSProducts.Products);
            this.reportViewer1.RefreshReport();
        }
    }
}
