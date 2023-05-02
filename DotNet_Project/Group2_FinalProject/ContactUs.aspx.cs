using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Mail;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net.Mail;

namespace Group2_FinalProject
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            try
            {
                if (Page.IsValid)
                {
                    MailMessage mailMessage = new MailMessage();
                    mailMessage.From = new MailAddress("nazaraecomm@gmail.com");
                    mailMessage.To.Add("nazaraecomm@gmail.com");
                    mailMessage.Subject = txtSubject.Text;

                    mailMessage.Body = "<b>Sender Name: </b>" + txtName.Text + "<br/>"
                        + "<b>Sender Email: </b>" + txtEmail.Text + "<br/>"
                        + "<b>Comments: </b>" + txtComments.Text;
                    mailMessage.IsBodyHtml = true;

                    var smtp = new SmtpClient
                    {
                        Host = "smtp.gmail.com",
                        Port = 587,
                        EnableSsl = true,
                        DeliveryMethod = SmtpDeliveryMethod.Network,
                        UseDefaultCredentials = false,
                        Credentials = new System.Net.NetworkCredential("nazaraecomm@gmail.com", "Nazara@123")
                    };

                    smtp.Send(mailMessage);

                    Label1.ForeColor = System.Drawing.Color.Blue;
                    Label1.Text = "Thank you for contacting us";

                    txtName.Enabled = false;
                    txtEmail.Enabled = false;
                    txtSubject.Enabled = false;
                    txtComments.Enabled = false;
                    Button1.Enabled = false;
                }
            }

            catch (Exception ex)
            {
                // Log -Event Viewer or table
                Label1.ForeColor = System.Drawing.Color.Blue;
                Label1.ForeColor = System.Drawing.Color.Red;
                Label1.Text = ex + "There is an unknown Exception. Please try again later";
            }
        }
    }
}