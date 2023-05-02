<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ContactUs.aspx.cs" Inherits="Group2_FinalProject.WebForm1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
	<html>
	<head>
		<style>
		    /* Style inputs with type="text", select elements and textareas */
		    input[type=text], select, textarea {
		        width: 100%; /* Full width */
		        padding: 12px; /* Some padding */
		        border: 1px solid #ccc; /* Gray border */
		        border-radius: 4px; /* Rounded borders */
		        box-sizing: border-box; /* Make sure that padding and width stays in place */
		        margin-top: 6px; /* Add a top margin */
		        margin-bottom: 16px; /* Bottom margin */
		        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
		    }

		    /* Style the submit button with a specific background color etc */
		    input[type=submit] {
		        background-color: #04AA6D;
		        color: white;
		        padding: 12px 20px;
		        border: none;
		        border-radius: 4px;
		        cursor: pointer;
		    }

		        /* When moving the mouse over the submit button, add a darker green color */
		        input[type=submit]:hover {
		            background-color: #45a049;
		        }

		    /* Add a background color and some padding around the form */
		    .container {
		        border-radius: 5px;
		        background-color: #f2f2f2;
		        padding: 20px;
		    }
		</style>
	</head>
	<body>
        <img src="Images/aboutUs.jpg" style="filter: grayscale(50%); width:100%"/>
		<div class="container" style=""font-family:Arial">
            <fieldset stye="width:480px, align:center">
                <h3>Please, contact us with any questions or concerns regarding your purchase from us.</h3>
                <table>
                    <tr>
                        <td>
                            <b>FullName:</b>
                        </td>
                        <td>
                              <asp:TextBox ID="txtName" runat="server" Width="480px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ErrorMessage="FullName is required!" ControlToValidate="txtName" Text="*" ForeColor="Red" SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email:</b>
                        </td>
                        <td>
                              <asp:TextBox ID="txtEmail" runat="server" Width="480px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                                ErrorMessage="Email is required!" ControlToValidate="txtEmail" Display="Dynamic" Text="*" ForeColor="Red" SetFocusOnError="True"></asp:RequiredFieldValidator>
                            
                            <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
                                ErrorMessage="Please, enter a valid email address" ControlToValidate="txtEmail" ForeColor="Red" SetFocusOnError="True" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">*</asp:RegularExpressionValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Subject:</b>
                        </td>
                        <td>
                              <asp:TextBox ID="txtSubject" runat="server" Width="480px" Height="55px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                                ErrorMessage="Subject is required!" ControlToValidate="txtSubject" Text="*" ForeColor="Red" SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align:top">
                            <b>Comments:</b>
                        </td>
                        <td style="vertical-align:top">
                              <asp:TextBox ID="txtComments" runat="server" Width="480px" Rows="5" TextMode="MultiLine" Height="188px"></asp:TextBox>
                        </td>
                        <td style="vertical-align:top">
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                                ErrorMessage="Comments are required!" ControlToValidate="txtComments" Text="*" ForeColor="Red" SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <asp:ValidationSummary HeaderText="Please fix following errors!!!" ForeColor="Red" ID="ValidationSummary1" runat="server" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <asp:Label ID="Label1" runat="server" Font-Bold="true"></asp:Label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <asp:Button ID="Button1" runat="server" Text="Submit" OnClick="Button1_Click" Height="55px" Width="235px"/>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </div>

	</body>
	</html>
</asp:Content>
