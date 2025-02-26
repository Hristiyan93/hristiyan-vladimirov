using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using HyperStoreApp.Forms.Controls;

namespace HyperStoreApp.Forms.Controls
{
    public partial class UcEmployeeMenu : BaseMenu
    {

        public UcEmployeeMenu()
        {
            InitializeComponent();

            btnExit.Click += ButtonClicked;
            btnCompleteOrders.Click += ButtonClicked;
            btnCompleteRequests.Click += ButtonClicked;
            btnHome.Click += ButtonClicked;
        }

    }
}
