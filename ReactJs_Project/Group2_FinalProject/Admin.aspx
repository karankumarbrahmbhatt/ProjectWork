<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Admin.aspx.cs" Inherits="Group2_FinalProject.Admin" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">

    <div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Page</th>
                    <th scope="col">Visit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Category</td>
                    <td><a class="btn btn-dark" href="Admin_Category.aspx">Visit</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Product</td>
                    <td><a class="btn btn-dark" href="Admin_Product.aspx">Visit</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Customer</td>
                    <td><a class="btn btn-dark" href="Admin_Customer.aspx">Visit</a></td>
                </tr>
                      <tr>
                    <th scope="row">4</th>
                    <td>Orders</td>
                    <td><a class="btn btn-dark" href="Admin_Orders.aspx">Visit</a></td>
                </tr>
            </tbody>
        </table>

    </div>
        </div>

</asp:Content>
