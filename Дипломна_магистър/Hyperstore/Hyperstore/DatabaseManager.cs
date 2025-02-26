using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HyperStoreApp
{
    class DatabaseManager
    {
        private static DatabaseManager _instance;
        private SqlConnection __conn;

        private DatabaseManager()
        {
            __conn = new SqlConnection(GetConnectionString());
        }

        static DatabaseManager()
        {
            _instance = new DatabaseManager();
        }

        private string GetConnectionString()
        {
            return Properties.Settings.Default.hypermarketConnectionString;
        }

        public static SqlConnection getConnection()
        {
            return _instance.__conn;
        }

 
    }
}
