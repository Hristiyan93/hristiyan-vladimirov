using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Reports
{
    public partial class UcReports : UserControl
    {
        public UcReports()
        {
            InitializeComponent();
        }

        private void button7_Click(object sender, EventArgs e)
        {
            using(FrmReportProducts frm = new FrmReportProducts())
            {
                frm.ShowDialog();
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {

        }
    }
}
