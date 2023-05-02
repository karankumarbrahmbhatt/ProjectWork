using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Xml.Linq;

namespace Group2_FinalProject
{
    public partial class Checkout : System.Web.UI.Page
    {
        private Customer customer;
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                customer = (Customer)Session["Customer"];
                LoadCustomerData();
            }
        }
        protected void btnCheckOut_Click(object sender, EventArgs e)
        {
            if (IsValid)
            {
                string constr = ConfigurationManager.ConnectionStrings["FashionMerch"].ConnectionString;
                using (SqlConnection con = new SqlConnection(constr))
                {
                    using (SqlCommand cmd = new SqlCommand("INSERT INTO Orders " +
                        "(FirstName,LastName, Email, PhoneNumber, Address,City, State, ZipCode) " +
                        "VALUES (@FirstName,@LastName,@EmailAddress,@Phone,@Address,@city,@State,@Zipcode)"))
                    {
                        
                        cmd.Parameters.AddWithValue("@FirstName", txtFirstName.Text);
                        cmd.Parameters.AddWithValue("@LastName", txtLastName.Text);
                        cmd.Parameters.AddWithValue("@EmailAddress", txtEmail1.Text);
                        cmd.Parameters.AddWithValue("@Phone", txtPhone.Text);
                        cmd.Parameters.AddWithValue("@BirthDate", txtDOB.Text);
                        cmd.Parameters.AddWithValue("@Address", txtAddress.Text);
                        cmd.Parameters.AddWithValue("@City", txtCity.Text);
                        cmd.Parameters.AddWithValue("@State", ddlState.SelectedValue);
                        cmd.Parameters.AddWithValue("@Zipcode", txtZip.Text);
                        cmd.Parameters.AddWithValue("@ShippingAddress", txtShipAddress.Text);
                        cmd.Parameters.AddWithValue("@ShippingCity", txtShipCity.Text);
                        cmd.Parameters.AddWithValue("@ShippingState", ddlShipState.SelectedValue);
                        cmd.Parameters.AddWithValue("@ShippingZipcode", txtShipZip.Text);


                        cmd.Connection = con;
                        con.Open();
                        cmd.ExecuteNonQuery();
                        con.Close();
                    }
                }

                GetCustomerData();
                Response.Redirect("~/Confirmation.aspx");
            }
        }
        protected void btnCancel_Click(object sender, EventArgs e)
        {
            Session.Remove("Cart");
            Session.Remove("Customer");
            Response.Redirect("~/Products.aspx");
        }
        private void LoadCustomerData()
        {
            if (customer != null)
            {
                txtFirstName.Text = customer.FirstName;
                txtLastName.Text = customer.LastName;
                txtEmail1.Text = customer.EmailAddress;
                txtPhone.Text = customer.Phone;
                txtDOB.Text = customer.BirthDate;
                txtAddress.Text = customer.Address;
                txtCity.Text = customer.City;
                txtZip.Text = customer.Zip;
                ddlState.SelectedValue = customer.State;
                txtShipAddress.Text = customer.ShippingAddress;
                txtShipCity.Text = customer.ShippingCity;
                ddlShipState.SelectedValue = customer.ShippingState;
                txtShipZip.Text = customer.ShippingZip;
            }
        }
        private void GetCustomerData()
        {
            if (customer == null) customer = new Customer();
            customer.FirstName = txtFirstName.Text;
            customer.LastName = txtLastName.Text;
            customer.EmailAddress = txtEmail1.Text;
            customer.Phone = txtPhone.Text;
            customer.BirthDate = txtDOB.Text;
            customer.Address = txtAddress.Text;
            customer.City = txtCity.Text;
            customer.State = ddlState.SelectedValue;
            customer.Zip = txtZip.Text;

            if (chkSameAsBilling.Checked)
            {
                customer.ShippingAddress = customer.Address;
                customer.ShippingCity = customer.City;
                customer.ShippingState = customer.State;
                customer.ShippingZip = customer.Zip;
            }
            else
            {
                customer.ShippingAddress = txtShipAddress.Text;
                customer.ShippingCity = txtShipCity.Text;
                customer.ShippingState = ddlShipState.SelectedValue;
                customer.ShippingZip = txtShipZip.Text;
            }
            Session["Customer"] = customer;
        }

        protected void chkSameAsBilling_CheckedChanged(object sender, EventArgs e)
        {
            rfvShipAddress.Enabled = !rfvShipAddress.Enabled;
            rfvShipCity.Enabled = !rfvShipCity.Enabled;
            rfvShipState.Enabled = !rfvShipState.Enabled;
            rfvShipZip.Enabled = !rfvShipZip.Enabled;

            txtShipAddress.Enabled = !txtShipAddress.Enabled;
            txtShipCity.Enabled = !txtShipCity.Enabled;
            ddlShipState.Enabled = !ddlShipState.Enabled;
            txtShipZip.Enabled = !txtShipZip.Enabled;
        }
    }
}