using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Inventories
{
    public partial class UcInvetories : UserControl
    {

        User loggedUser;
        hypermarketEntities db;

        public UcInvetories(User user)
        {
            loggedUser = user;
            InitializeComponent();
            db = new hypermarketEntities();
            inventoryBindingSource.DataSource = db.Inventories.ToList();
            dgView.SelectionMode = DataGridViewSelectionMode.FullRowSelect;
            dgView.MultiSelect = false;
        }

        private void showInvetory(int inventoryId)
        {
            using (FrmInventory frm = new FrmInventory(inventoryId))
            {
                frm.ShowDialog();
                if (frm.DialogResult == DialogResult.OK)
                {
                    inventoryBindingSource.DataSource = db.Inventories.ToList();
                }
            }
        }

        private void btnNew_Click(object sender, EventArgs e)
        {
            var departmentId = loggedUser.departmentId;
            if (departmentId == 1)
            {
                using (Forms.Departments.FrmChooseDepartment frm = new Departments.FrmChooseDepartment()) {
                    frm.ShowDialog();
                    if (frm.DialogResult == DialogResult.OK)
                    {
                        departmentId = frm.choosenDepartment;
                    }
                }
            }

            if (departmentId > 1)
            {
                using(hypermarketEntities db = new hypermarketEntities())
                {
                    Inventory inventory = db.Inventories.FirstOrDefault(inv => inv.departmentId == departmentId && inv.statusId == 1);
                    if (inventory == null)
                    {
                        inventory = new Inventory {
                            departmentId = departmentId,
                            statusId = 1,
                            employeeId = loggedUser.id,
                            date = DateTime.Now
                        };

                        var stocks = db.Stocks.Where(st => st.departmentId == departmentId);
                        foreach(Stock stock in stocks)
                        {
                            InventoryDetail details = db.InventoryDetails.Create();
                            details.productId = stock.productId;
                            details.qtyInStock = (int)stock.qty;
                            details.qtyActual = 0;
                            inventory.InventoryDetails.Add(details);
                        }

                        db.Inventories.Add(inventory); 

                        db.SaveChanges();
                    }
                    showInvetory(inventory.Id);
                }
                
            }

        }

        private void dgView_DataBindingComplete(object sender, DataGridViewBindingCompleteEventArgs e)
        {
            var grid = (DataGridView)sender;
            foreach (DataGridViewRow row in grid.Rows)
            {
                if (!row.IsNewRow)
                {
                    var item = (Inventory)row.DataBoundItem;
                    row.Cells[1].Value = item.User.fullname;
                    row.Cells[2].Value = item.Department.departmentName;
                    row.Cells[3].Value = item.InventoryStatus.name;
                    var qtyActual = 0;
                    var qtyStock = 0;
                    foreach(InventoryDetail product in item.InventoryDetails)
                    {
                        qtyActual += product.qtyActual;
                        qtyStock += product.qtyInStock;
                    }
                    row.Cells[4].Value = qtyActual;
                    row.Cells[5].Value = qtyStock;
                }
            }
        }

        private Inventory itemFromList()
        {
            var item = (Inventory)inventoryBindingSource.Current;
            return item;
        }

        private void continueInventory()
        {
            var inventory = itemFromList();
            if (inventory == null)
            {
                return;
            }
            if (inventory.statusId == 1)
            {
                showInvetory(inventory.Id);
            }
            else
            {
                MessageBox.Show("Тази инвентаризация е приключена вече", "Грешка", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void dgView_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            continueInventory();
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            continueInventory();
        }
    }
}
