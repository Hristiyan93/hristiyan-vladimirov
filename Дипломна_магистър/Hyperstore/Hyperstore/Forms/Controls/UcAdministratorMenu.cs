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
    public partial class UcAdministratorMenu : BaseMenu
    {

        public UcAdministratorMenu():base()
        {
            
            InitializeComponent();

            btnExit.Click += ButtonClicked;
            btnInventory.Click += ButtonClicked;
            btnOrders.Click += ButtonClicked;

            button1.Click += ButtonClicked;
            button2.Click += ButtonClicked;
            button3.Click += ButtonClicked;
            button4.Click += ButtonClicked;
            button5.Click += ButtonClicked;
            button6.Click += ButtonClicked;
            button7.Click += ButtonClicked;
        }

    }
}
