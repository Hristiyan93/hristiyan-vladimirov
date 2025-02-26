using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Security.Cryptography;
using System.Threading.Tasks;

namespace HyperStoreApp.Tools
{
    static public class PasswordEncoder
    {
        public static string encodeString(string text)
        {
            using (SHA1Managed sha1 = new SHA1Managed())
            {
                var bytes = Encoding.UTF8.GetBytes(text);
                var hash = sha1.ComputeHash(bytes);
                return Convert.ToBase64String(hash);
            }
        }
    }
}
