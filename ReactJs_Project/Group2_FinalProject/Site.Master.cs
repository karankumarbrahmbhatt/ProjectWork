using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Group2_FinalProject
{
    public partial class Site : System.Web.UI.MasterPage
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Logout_Click(object sender, EventArgs e)
        {

            //clear firstname
            HttpCookie UsernameCookie = new HttpCookie("Username");
            UsernameCookie.Expires = DateTime.Now.AddSeconds(-1);
            Response.Cookies.Add(UsernameCookie);

            //clear lastname
            HttpCookie PasswordCookie = new HttpCookie("Password");
            PasswordCookie.Expires = DateTime.Now.AddSeconds(-1);
            Response.Cookies.Add(PasswordCookie);

            //Response.Redirect("~/Home");
        }
    }
}