<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Products.aspx.cs" Inherits="Group2_FinalProject.Products" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
<style>
    /* Generic Styles */

* {
  box-sizing: border-box;
}

body {
  background-color: #f1f5f9;
}

h2 {
  margin: 0;
}

.container {
  padding: 2rem;
}

.item {
    background-color: white;
    line-height: 1.4;
    color: #333;
    border-radius: 0.5rem;
    transition-property: box-shadow, transform;
    transition-duration: 350ms;
    transition-timing-function: ease;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 24%);
    min-height: 48rem;
}

.item:is(:hover, :focus) {
  box-shadow: 0px 8px 10px 1px rgba(0, 0, 0, 0.2);
  transform: translateY(-8px);
}

.item img {
width: 100%;
    height: 26rem;
    object-fit: cover;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
    object-position: top;
}

.desc {
 padding: 1rem 1.6rem 1.6rem;
    min-height: 17rem;
}

a {
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: bold;
  color: #9333ea;
  
}

/* Generic Styles End */

.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
  gap: 2rem;
  min-height:73rem;
  
}
span {
  display: block;
  margin-top: 20px;
  font-weight: bold;
  font-size: 1.4rem;
  color: #0891B2;
}
h3 {
  margin: 10px 0 0;
  color:black;
}
p {
  margin: 10px 0 0;
  line-height: 1.4;
  color: #666;
}
.btn {
  margin-top: 10px;
  background-color: #0891B2;
  color: white;
  border: none;
  padding: 10px 16px;
  border-radius: 5px;
  font-size: 0.9rem;
}

.btn:hover {
    background-color: orange;
    color: black;
}

    
</style>
</asp:Content>
 <asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
        <div class="container">
        <asp:Repeater ID="Repeater1" runat="server" DataSourceID="SqlDataSource1">
            <ItemTemplate>
                <div class="item">
                    <img src='/Images/Products/<%# Eval("ImageFile") %>' 
                                alt='<%# Eval("Name") %>'/>

                     <div class="desc">
                        <span>  Price: <%# Eval("UnitPrice", "{0:c}") %></span>
                                    <h3><%# Eval("Name") %></h3>
                                  
                                    <p><%# Eval("LongDescription") %></p>
                                </div>            
                   
                        <a class="btn" href='/ProductDetail/<%# Eval("ProductID") %>'>View Product</a>
                            
                </div>
            </ItemTemplate>
        </asp:Repeater>
        <asp:SqlDataSource runat="server" ID="SqlDataSource1" 
            ConnectionString='<%$ ConnectionStrings:FashionMerch %>' 
            SelectCommand="SELECT [ProductID], [Name], [LongDescription], [ImageFile], [UnitPrice] FROM [Products] ORDER BY [Name]">
        </asp:SqlDataSource>
    </div>
</asp:Content>
