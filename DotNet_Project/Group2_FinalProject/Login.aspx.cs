using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Group2_FinalProject
{
    public partial class Login : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                HttpCookie username = Request.Cookies["Username"];
                HttpCookie password = Request.Cookies["Password"];
                txtUsername.Text = username?.Value;
                txtPassword.Text = password?.Value;

                if(txtUsername.Text != "")
                {
                    Response.Redirect("~/Admin");
                }
            }

           
        }

        protected void btnLogin_Click(object sender, EventArgs e)
        {
            if (IsValid)
            {
                if (txtUsername.Text == "Admin" && txtPassword.Text == "Admin")
                {
                    DateTime expiry = DateTime.Now.AddMinutes(5);
                    SetCookie("Username", txtUsername.Text, expiry);
                    SetCookie("Password", txtPassword.Text, expiry);

                    Response.Redirect("~/Admin");
                }
                else
                {
                    lblError.Text = "Invalid username or password";
                }
            }

            
        }

        private void SetCookie(string name, string value, DateTime expiry)
        {
            HttpCookie cookie = new HttpCookie(name, value);
            cookie.Expires = expiry;
            Response.Cookies.Add(cookie);
        }

    }
}