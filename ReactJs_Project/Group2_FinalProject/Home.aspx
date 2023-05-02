<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Home.aspx.cs" Inherits="Group2_FinalProject.Home" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <style>
        #title {
            background-image: url(../images/homeImage.png);
            background-size: cover;
            height: 600px;
            width: 948px;
        }

        #title2 {
            background-image: url(../images/homeImage2.png);
            background-size: cover;
            height: 600px;
            width: 948px;
        }

        .top-head {
    font-size: 3rem;
    margin-top: 20rem;
    color: white;
    font-weight: bold;
    margin-left: 0rem;
}
        .top-head2 {
    font-size: 3rem;
    margin-top: 20rem;
    color: black;
    font-weight: bold;
    margin-left: 0rem;
}

        .top-container {
            padding-top: 100px;
            padding-bottom: 85px;
        }

        .top-button {
            margin-left: 0rem;
            border: white;
            background: white;
            color: black;
            padding: 0.4rem;
        }

        #shippingBanner {
            background-color: #008A94;
            width: 948px;
            margin: -3rem 2rem 1rem 18rem;
            color: white;
        }

        .shipping-container {
            font-weight: bold;
        }

        .shipping-head {
            margin-left: 0rem;
            font-weight: bold;
            padding: 1rem;
        }

        #adBanner {
            background-color: #f1ebdf;
            width: 948px;
            margin: 2rem 2rem 1rem 18rem;
            color: red;
        }

            #adBanner h3 {
                color: red !important;
            }
    </style>
</asp:Content>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">

    <div class="container" id="shippingBanner">
        <div class="shipping-container">
            <div>
                <h2 class="shipping-head">Free Shipping on all orders</h2>
            </div>
        </div>
    </div>

    <div class="container" id="title">
        <div class="top-container">
            <div>
                <h2 class="top-head">All pink everything</h2>
                <asp:LinkButton ID="LinkButton1" runat="server" class="top-button" PostBackUrl="~/Products.aspx">Shop Now </asp:LinkButton>
                <%-- <button class="top-button" PostBackUrl="~/Order.aspx">Shop now</button>--%>
            </div>
        </div>
    </div>
    <div class="container" id="adBanner">
        <div class="shipping-container">
            <div>
                <h3 class="shipping-head">Member giveaway: Enter to win a matching outfit for the family + a bundle of board games!</h3>
            </div>
        </div>
    </div>
    <div class="container" id="title2">
        <div class="top-container">
            <div>
                <h2 class="top-head2">New Winter Collection</h2>
                <asp:LinkButton ID="LinkButton2" runat="server" class="top-button" PostBackUrl="~/Products.aspx">Shop Now </asp:LinkButton>
                <%-- <button class="top-button" PostBackUrl="~/Order.aspx">Shop now</button>--%>
            </div>
        </div>
    </div>
</asp:Content>
