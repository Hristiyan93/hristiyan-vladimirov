using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HyperStoreApp
{
    class Constants
    {
        public enum OrderStatus { NEW, PARTIAL, COMPLETED}
        public static string[] OrderStatusName = {"нова", "незавършена", "завършена" };

        public static string orderStatusToString(OrderStatus status)
        {
            return OrderStatusName[(int)status];
        }

        public static OrderStatus stringToOrderStatus(string val)
        {
            int id = Array.IndexOf(OrderStatusName, val);
            return (OrderStatus)Enum.ToObject(typeof(OrderStatus), id);
        }
    }
}
