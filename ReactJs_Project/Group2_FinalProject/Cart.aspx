<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Cart.aspx.cs" Inherits="Group2_FinalProject.Cart" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <style>
        h2 {
            padding-right:440px;
            margin: 12px;
        }
    </style>
    <div class="container mt-3 mb-3">	
    <h2 style="margin-right:35rem;margin-bottom: 2rem;">Your Shopping Cart</h2>	
    <div class="row"><%-- row 1 --%>	
        <div class="col-sm-6"><%-- cart display column --%>	
            <div class="form-group">	
                <div class="col-sm-12"><asp:ListBox ID="lstCart" runat="server" CssClass="form-control"></asp:ListBox></div>	
            </div>	
        </div>	
        <div class="col-sm-6"><%-- cart edit buttons column --%>	
            <div class="form-group">	
                <div class="col-sm-12"><asp:Button ID="btnRemove" runat="server" Text="Remove Item" onclick="btnRemove_Click" CssClass="btn btn-warning mt-2" /></div>	
                <div class="col-sm-12"><asp:Button ID="btnEmpty" runat="server" Text="Empty Cart" onclick="btnEmpty_Click" CssClass="btn btn-danger mt-2" /></div>	
            </div>	
        </div>	
    </div><%-- end of row 1 --%>	
    <div class="row"><%-- row 2 --%>	
        <div class="col-sm-12">	
            <div class="form-group"><%-- message label --%>	
                <asp:Label ID="lblMessage" runat="server" EnableViewState="False"	
                    CssClass="text-info col-sm-12"></asp:Label>	
            </div>
            <div class="form-group row">
                <%-- buttons --%>
                <div class="col-sm-6 row" style="margin-top:1rem">
                    <div class="col-sm-3">
                        <asp:Button ID="btnContinue" runat="server" PostBackUrl="~/Products" Text="Continue Shopping" CssClass="btn btn-success mt-2" />
                    </div>
                    <div class="col-sm-3">
                        <asp:Button ID="btnCheckOut" runat="server" Text="Check Out" PostBackUrl="~/Checkout" CssClass="btn btn-primary mt-2" />
                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><%-- end of row 2 --%>	
</div>	
</asp:Content>