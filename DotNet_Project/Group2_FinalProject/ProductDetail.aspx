<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="ProductDetail.aspx.cs" Inherits="Group2_FinalProject.ProductDetail" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <style>
        .imageWidth {
            width: 77%;
        }

        .pricegrp {
            padding-top: 1rem;
            font-size: large;
            font-weight: bold;
        }
        .txtaln{
            text-align:left;
        }
        .quant{
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .marg
        {
            margin-top:1rem;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container mt-3 mb-2">
        <div class="row">
            <%-- row 1 --%>
            <div class="col-sm-8 txtaln">
                <%-- product drop down and info column --%>
                <div class="row">
                <div class="form-group" style="display: none">
                    <label class="col-sm-5">Please select a product:</label>
                    <div class="col-sm-5">
                        <asp:DropDownList ID="ddlProducts" runat="server" AutoPostBack="True"
                            DataSourceID="SqlDataSource1" DataTextField="Name"
                            DataValueField="ProductID" CssClass="form-control" OnSelectedIndexChanged="ddlProducts_SelectedIndexChanged">
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource1" runat="server"
                            ConnectionString='<%$ ConnectionStrings:FashionMerch %>'
                            SelectCommand="SELECT [ProductID], [Name], [ShortDescription], [LongDescription], [ImageFile], [UnitPrice] FROM [Products] ORDER BY [Name]"></asp:SqlDataSource>
                    </div>
                </div>
                <div class="form-group marg">
                    <div class="col-sm-12">
                        <h3>
                            <asp:Label ID="lblName" runat="server"></asp:Label></h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <asp:Label ID="lblShortDescription" style="font-style: italic;" runat="server"></asp:Label></div>
                </div>
                <div class="form-group marg">
                    <div class="col-sm-12">
                        <asp:Label ID="lblLongDescription" runat="server"></asp:Label></div>
                </div>
                <div class="form-group pricegrp">
                    <div class="col-sm-12">
                        <asp:Label ID="lblUnitPrice" runat="server"></asp:Label></div>
                </div>
                    </div>
                     <div class="row">
            <%-- row 2 --%>
            <div class="col-sm-12">
                <div class="form-group row col-12 quant">
                    <label class="col-sm-1">Quantity:</label>
                    <div class="col-sm-3">
                        <asp:TextBox ID="txtQuantity" runat="server"
                            CssClass="form-control"></asp:TextBox>
                    </div>
                    <div class="col-sm-8">
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" CssClass="text-danger"
                            runat="server" ControlToValidate="txtQuantity" Display="Dynamic"
                            ErrorMessage="Quantity is a required field."></asp:RequiredFieldValidator>
                        <asp:RangeValidator ID="RangeValidator1" runat="server" CssClass="text-danger"
                            ControlToValidate="txtQuantity" Display="Dynamic"
                            ErrorMessage="Quantity must range from 1 to 500."
                            MaximumValue="500" MinimumValue="1" Type="Integer"></asp:RangeValidator>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <asp:Button ID="btnAdd" runat="server" Text="Add to Cart"
                            OnClick="btnAdd_Click" CssClass="btn btn-info" />
                        <asp:Button ID="btnCart" runat="server" Text="Go to Cart" style="margin-left: 3.5rem;"
                            PostBackUrl="~/Cart" CausesValidation="False" CssClass="btn btn-dark" />
                    </div>
                </div>
            </div>
        </div>
            </div>
            <div class="col-sm-4">
                <%-- product image column --%>
                <asp:Image class="imageWidth" ID="imgProduct" runat="server" />
            </div>
        </div>
        <%-- end of row 1 --%>
   
        <%-- end of row 2 --%>
    </div>
</asp:Content>
