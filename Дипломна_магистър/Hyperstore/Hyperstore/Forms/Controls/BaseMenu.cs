using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HyperStoreApp.Forms.Controls
{
    public class BaseMenu : UserControl
    {
        public event EventHandler ButtonClick;

        protected void ButtonClicked(object sender, EventArgs e)
        {
            ButtonClick?.Invoke(sender, e);
        }
    }
}
