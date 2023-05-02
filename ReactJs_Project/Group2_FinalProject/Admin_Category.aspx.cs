using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Group2_FinalProject
{
    public partial class Admin_Category : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void grdCategories_PreRender(object sender, EventArgs e)
        {
            grdCategories.HeaderRow.TableSection = TableRowSection.TableHeader;
        }

        protected void btnAdd_Click(object sender, EventArgs e)
        {
            if (IsValid)
            {
                var parameters = SqlDataSource1.InsertParameters;
                parameters["CategoryID"].DefaultValue = txtID.Text;
                parameters["ShortName"].DefaultValue = txtShortName.Text;
                parameters["LongName"].DefaultValue = txtLongName.Text;

                try
                {
                    SqlDataSource1.Insert();
                    txtID.Text = "";
                    txtShortName.Text = "";
                    txtLongName.Text = "";
                }
                catch (Exception ex)
                {
                    lblError.Text = DatabaseErrorMessage(ex.Message);
                }
            }
        }

        protected void grdCategories_RowUpdated(object sender, GridViewUpdatedEventArgs e)
        {
            if (e.Exception != null)
            {
                lblError.Text = DatabaseErrorMessage(e.Exception.Message);
                e.ExceptionHandled = true;
                e.KeepInEditMode = true;
            }
            else if (e.AffectedRows == 0)
            {
                lblError.Text = ConcurrencyErrorMessage();
            }
        }

        protected void grdCategories_RowDeleted(object sender, GridViewDeletedEventArgs e)
        {
            if (e.Exception != null)
            {
                lblError.Text = DatabaseErrorMessage(e.Exception.Message);
                e.ExceptionHandled = true;
            }
            else if (e.AffectedRows == 0)
            {
                lblError.Text = ConcurrencyErrorMessage();
            }
        }

        private string DatabaseErrorMessage(string errorMsg)
        {
            return $"<b>A database error has occurred:</b> {errorMsg}";
        }
        private string ConcurrencyErrorMessage()
        {
            return "Another user may have updated that category. Please try again";
        }
    }
}