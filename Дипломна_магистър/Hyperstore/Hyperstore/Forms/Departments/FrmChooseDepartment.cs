using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Departments
{
    public partial class FrmChooseDepartment : Form
    {
        public int choosenDepartment {
            get
            {
                return (int)comboBox1.SelectedValue;
            }  }

        hypermarketEntities db;

        public FrmChooseDepartment()
        {
            InitializeComponent();


            db = new hypermarketEntities();

            comboBox1.DataSource = db.Departments.ToList();
            comboBox1.DisplayMember = "departmentName";
            comboBox1.ValueMember = "Id";
        }
    }
}
