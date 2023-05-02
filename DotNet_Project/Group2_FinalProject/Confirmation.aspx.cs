using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Group2_FinalProject
{
    public partial class OrderPlaced : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            var customer = (Customer)Session["Customer"];

            string message =
                "Contact information\n\n" +
                "    Email: " + customer.EmailAddress + "\n" +
                "    First name: " + customer.FirstName + "\n" +
                "    Last name: " + customer.LastName + "\n" +
                "    Phone number: " + customer.Phone + "\n" +
                "    Date of birth: " + customer.BirthDate + "\n" +
                "<br/>Billing address\n" +
                "    Address: " + customer.Address + "\n" +
                "    City: " + customer.City + "\n" +
                "    State: " + customer.State + "\n" +
                "    Zip code: " + customer.Zip + "\n" +
                "<br/>Shipping address\n" +
                "    Address: " + customer.ShippingAddress + "\n" +
                "    City: " + customer.ShippingCity + "\n" +
                "    State: " + customer.ShippingState + "\n" +
                "    Zip code: " + customer.ShippingZip + "\n";

            txtData.Text = message;
        }
    }
}