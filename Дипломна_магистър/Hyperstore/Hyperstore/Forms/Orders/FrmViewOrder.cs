using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Orders
{
    public partial class FrmViewOrder : Form
    {

        const int VENDOR_COL = 0;
        const int PRODUCT_COL = 1;

        public FrmViewOrder(Order order)
        {
            InitializeComponent();
            dgOrderProducts.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgOrderProducts.MultiSelect = false;

            orderDetailBindingSource.DataSource = order.OrderDetails.ToList();
            orderBindingSource.DataSource = order;

            lblUser.Text = order.User.fullname;
            lblDepartment.Text = order.Department.departmentName;
            lblStatus.Text = order.OrderStatus.name;

            this.Text = "Преглед поръчка №" + order.Id;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dgOrderProducts_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (OrderDetail)row.DataBoundItem;
                    row.Cells[VENDOR_COL].Value = item.Product.Vendor.name;
                    row.Cells[PRODUCT_COL].Value = item.Product.name;
                }
            }
        }
    }
}
