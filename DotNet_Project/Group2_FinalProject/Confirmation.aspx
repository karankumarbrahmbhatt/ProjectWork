<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Confirmation.aspx.cs" Inherits="Group2_FinalProject.OrderPlaced" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container">
        <div class="form-group">
                <asp:TextBox ID="txtData" runat="server" TextMode="MultiLine" CssClass="form-control" 
                    Columns="50" Rows="25"></asp:TextBox>  
            </div>

            <div class="form-group">
                <asp:Button ID="btnContinue" runat="server" CssClass="btn btn-default"
                    PostBackUrl="~/Products" Text="Continue Shopping" />
            </div>
        </div>
</asp:Content>
