using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Orders
{
    public partial class UcEmployeeOrders : UserControl
    {

        const int USER_COL = 1;
        const int DEPARTMENT_COL = 2;
        const int STATUS_COL = 4;
        const int ORDERQTY_COL = 5;
        const int RECEIVEQTY_COL = 6;

        hypermarketEntities db;
        User loggedUser;

        public UcEmployeeOrders(User user)
        {
            InitializeComponent();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private Order itemFromList()
        {
            //Sp_GetOrderByDepartment_Result item = (Sp_GetOrderByDepartment_Result)spGetOrderByDepartmentResultBindingSource.Current;
            //return item == null ? 0 : item.id;
            var item = (Order)orderBindingSource.Current;
            return item;
        }

        private void showItem()
        {
            var order = itemFromList();
            if (order != null)
                using (FrmViewOrder frm = new FrmViewOrder(order))
                {
                    frm.ShowDialog();
                }
        }

        private List<Order> getOrdersList()
        {
            if (loggedUser.usertypeId > 1)
            {
                return (from records in db.Orders
                        where (records.departmentId == loggedUser.departmentId)
                        || (records.departmentId == 1)
                        select records).ToList();
            }
            return db.Orders.ToList();
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            using(FrmAddOrder frm = new FrmAddOrder(loggedUser))
            {
                if(frm.ShowDialog() == DialogResult.OK)
                {
                    db = new hypermarketEntities();
                    orderBindingSource.DataSource = getOrdersList();
                }
            }
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            showItem();
        }

        private void UcOrders_Load(object sender, EventArgs e)
        {
            db = new hypermarketEntities();
            orderBindingSource.DataSource = getOrdersList();
        }

        private void dgView_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            showItem();
        }

        private void dgView_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (Order)row.DataBoundItem;
                    row.Cells[USER_COL].Value = item.User.fullname;
                    row.Cells[DEPARTMENT_COL].Value = item.Department.departmentName;
                    row.Cells[STATUS_COL].Value = item.OrderStatus.name;
                    var orderQty = 0;
                    var receiveQty = 0;

                    foreach(OrderDetail product in item.OrderDetails)
                    {
                        orderQty += (int)product.qtyOrdered;
                        receiveQty += (int)product.qtyReceived;
                    }

                    row.Cells[ORDERQTY_COL].Value = orderQty.ToString();
                    row.Cells[RECEIVEQTY_COL].Value = receiveQty.ToString();
                }
            }
        }

    }
}
