<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Admin_Product.aspx.cs" Inherits="Group2_FinalProject.Admin_Product" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <style>
        a href{
            color:black;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container">
    <h2>Product</h2>
             <div class="form-group">
                <label id="lblCategory" for="ddlCategory" 
                    class="col-xs-4 col-sm-offset-1 col-sm-3 control-label">
                    Choose a category:</label>
                <div class="col-xs-8 col-sm-5">
                    <asp:DropDownList ID="ddlCategory" runat="server" AutoPostBack="true"
                        DataSourceID="SqlDataSource4" DataTextField="LongName" 
                        DataValueField="CategoryID" CssClass="form-control">
                    </asp:DropDownList>
                    <asp:SqlDataSource runat="server" ID="SqlDataSource4" 
                        ConnectionString='<%$ ConnectionStrings:FashionMerch %>' 
                        SelectCommand="SELECT [CategoryID], [LongName] FROM [Categories] 
                            ORDER BY [LongName]">
                    </asp:SqlDataSource>
                </div>
            </div>
            <br />
            <div class="col-sm-6 table table-responsive">
                <asp:GridView ID="grdProducts" runat="server" SelectedIndex="0"
                    AutoGenerateColumns="False" DataKeyNames="ProductID" 
                    DataSourceID="SqlDataSource1" AllowPaging="True" 
                    CssClass="table table-responsive" 
                    OnPreRender="grdProducts_PreRender">
                    <Columns>
                        <asp:BoundField DataField="ProductID" HeaderText="ID" 
                            ReadOnly="True">
                            <ItemStyle CssClass="col-xs-2" />
                        </asp:BoundField>
                        <asp:BoundField DataField="Name" HeaderText="Name">
                            <ItemStyle CssClass="col-xs-6" />
                        </asp:BoundField>
                        <asp:BoundField DataField="CategoryID" HeaderText="Category"> 
                            <ItemStyle CssClass="col-xs-3" />
                        </asp:BoundField>
                        <asp:CommandField ButtonType="Link" ShowSelectButton="true"> 
                            <ItemStyle CssClass="link-dark col-xs-1" />
                        </asp:CommandField>
                    </Columns>
                    <HeaderStyle CssClass="bg-halloween" />
                    <PagerSettings Mode="NumericFirstLast" />
                    <PagerStyle CssClass="pagerStyle" 
                        BackColor="#8c8c8c" HorizontalAlign="Center" />
                    <SelectedRowStyle CssClass="warning" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:FashionMerch %>" 
                    SelectCommand="SELECT [ProductID], [Name], [CategoryID], 
                        [UnitPrice], [OnHand] FROM [Products] WHERE ([CategoryID] = @CategoryID) ORDER BY [ProductID]">
                    <SelectParameters>
                            <asp:ControlParameter ControlID="ddlCategory" Name="CategoryID" 
                                PropertyName="SelectedValue" Type="String" />
                        </SelectParameters>
                </asp:SqlDataSource> 
                
                <p><asp:ValidationSummary ID="ValidationSummary1" runat="server" 
                        HeaderText="Please correct the following errors:" 
                        CssClass="text-danger" />
                <p><asp:Label ID="lblError" runat="server" 
                    EnableViewState="false" CssClass="text-danger"></asp:Label></p>   
            </div>  

            <div class="col-sm-6">
                <asp:FormView ID="fvProduct" runat="server" DataKeyNames="ProductID" 
                    DataSourceID="SqlDataSource2" OnItemDeleting="fvProduct_ItemDeleting" 
                    OnItemDeleted="fvProduct_ItemDeleted" OnItemInserted="fvProduct_ItemInserted" 
                    OnItemUpdated="fvProduct_ItemUpdated">
                    <EditItemTemplate>
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="NameTextBox">Name:</label>
                                <asp:RequiredFieldValidator ID="rfvName" runat="server" Display="Dynamic" 
                                    ControlToValidate="NameTextBox" CssClass="text-danger"
                                    ErrorMessage="Name is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="NameTextBox" runat="server" Text='<%# Bind("Name") %>' 
                                    CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="ShortDescriptionTextBox">Short Description:</label>
                                <asp:RequiredFieldValidator ID="rfvShortDesc" runat="server" 
                                    ControlToValidate="ShortDescriptionTextBox" CssClass="text-danger" Display="Dynamic"
                                    ErrorMessage="Short Description is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="ShortDescriptionTextBox" runat="server" 
                                    Text='<%# Bind("ShortDescription") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="LongDescriptionTextBox">Long Description:</label>
                                <asp:RequiredFieldValidator ID="rfvLongDesc" runat="server" Display="Dynamic"
                                    ControlToValidate="LongDescriptionTextBox" CssClass="text-danger"
                                    ErrorMessage="Long Description is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="LongDescriptionTextBox" runat="server" 
                                    Text='<%# Bind("LongDescription") %>' CssClass="form-control" 
                                    TextMode="MultiLine" Rows="4" />
                            </div>
                            <div class="form-group">
                                <label for="ddlCategory">Category:</label>
                                <asp:DropDownList runat="server" ID="ddlCategory" 
                                    DataSourceID="SqlDataSource3" DataTextField="LongName" DataValueField="CategoryID" 
                                    SelectedValue='<%# Bind("CategoryID") %>' CssClass="form-control">
                                </asp:DropDownList>
                            </div>
                            <div class="form-group">
                                <label for="ImageFileTextBox">Image File:</label>
                                <asp:TextBox ID="ImageFileTextBox" runat="server" 
                                    Text='<%# Bind("ImageFile") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="UnitPriceTextBox">Unit Price:</label>
                                <asp:RequiredFieldValidator ID="rfvUnitPrice" runat="server" Display="Dynamic"  
                                    ControlToValidate="UnitPriceTextBox" CssClass="text-danger"
                                    ErrorMessage="Unit Price is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:CompareValidator ID="cvUnitPrice" runat="server" Display="Dynamic" 
                                    ControlToValidate="UnitPriceTextBox" Type="Double" Operator="GreaterThan" 
                                    ErrorMessage="Unit Price must be a number greater than zero." Text="*" 
                                    CssClass="text-danger" ValueToCompare="0.00"></asp:CompareValidator>
                                <asp:TextBox ID="UnitPriceTextBox" runat="server" 
                                    Text='<%# Bind("UnitPrice") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="OnHandTextBox">On Hand:</label>
                                <asp:RequiredFieldValidator ID="rfvOnHand" runat="server" Display="Dynamic" 
                                    ControlToValidate="OnHandTextBox" CssClass="text-danger"
                                    ErrorMessage="On Hand is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:CompareValidator ID="cvOnHand" runat="server" Display="Dynamic" 
                                    ControlToValidate="OnHandTextBox" CssClass="text-danger"
                                    Type="Integer" Operator="GreaterThan" ValueToCompare="0" 
                                    ErrorMessage="On Hand must be a whole number greater than zero." Text="*">
                                </asp:CompareValidator>
                                <asp:TextBox ID="OnHandTextBox" runat="server" Text='<%# Bind("OnHand") %>' 
                                    CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <asp:LinkButton ID="UpdateButton"  CssClass="btn btn-warning"  runat="server" CausesValidation="True" 
                                    CommandName="Update" Text="Update" />
                                &nbsp;<asp:LinkButton CssClass="btn btn-danger" ID="UpdateCancelButton" runat="server" 
                                    CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                            </div>
                        </div>
                    </EditItemTemplate>
                    <InsertItemTemplate>
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="ProductIDTextBox">Product ID:</label>
                                <asp:RequiredFieldValidator ID="rfvProductID" runat="server" Display="Dynamic" 
                                    ControlToValidate="ProductIDTextBox" CssClass="text-danger"
                                    ErrorMessage="ProductID is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="ProductIDTextBox" runat="server" 
                                    Text='<%# Bind("ProductID") %>' CssClass="form-control" />  
                            </div>
                            <div class="form-group">
                                <label for="NameTextBox">Name:</label>
                                <asp:RequiredFieldValidator ID="rfvName" runat="server" Display="Dynamic" 
                                    ControlToValidate="NameTextBox" CssClass="text-danger"
                                    ErrorMessage="Name is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="NameTextBox" runat="server" 
                                    Text='<%# Bind("Name") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="ShortDescriptionTextBox">Short Description:</label>
                                <asp:RequiredFieldValidator ID="rfvShortDesc" runat="server" 
                                    ControlToValidate="ShortDescriptionTextBox" CssClass="text-danger" Display="Dynamic"
                                    ErrorMessage="Short Description is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="ShortDescriptionTextBox" runat="server" 
                                    Text='<%# Bind("ShortDescription") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="LongDescriptionTextBox">Long Description:</label>
                                <asp:RequiredFieldValidator ID="rfvLongDesc" runat="server" Display="Dynamic"
                                    ControlToValidate="LongDescriptionTextBox" CssClass="text-danger"
                                    ErrorMessage="Long Description is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:TextBox ID="LongDescriptionTextBox" runat="server" 
                                    Text='<%# Bind("LongDescription") %>' CssClass="form-control" 
                                    TextMode="MultiLine" Rows="4" />
                            </div>
                            <div class="form-group">
                                <label for="ddlCategory">Category:</label>
                                <asp:DropDownList runat="server" ID="ddlCategory" 
                                    DataSourceID="SqlDataSource3" DataTextField="LongName" 
                                    DataValueField="CategoryID" SelectedValue='<%# Bind("CategoryID") %>' 
                                    CssClass="form-control"></asp:DropDownList>
                            </div>
                            <div class="form-group">
                                <label for="ImageFileTextBox">Image File:</label>
                                <asp:TextBox ID="ImageFileTextBox" runat="server" 
                                    Text='<%# Bind("ImageFile") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="UnitPriceTextBox">Unit Price:</label>
                                <asp:RequiredFieldValidator ID="rfvUnitPrice" runat="server" Display="Dynamic"  
                                    ControlToValidate="UnitPriceTextBox" CssClass="text-danger"
                                    ErrorMessage="Unit Price is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:CompareValidator ID="cvUnitPrice" runat="server" Display="Dynamic" 
                                    ControlToValidate="UnitPriceTextBox" Type="Double" Operator="GreaterThan" 
                                    ErrorMessage="Unit Price must be a number greater than zero." Text="*" 
                                    CssClass="text-danger" ValueToCompare="0.00"></asp:CompareValidator>
                                <asp:TextBox ID="UnitPriceTextBox" runat="server" 
                                    Text='<%# Bind("UnitPrice") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="OnHandTextBox">On Hand:</label>
                                <asp:RequiredFieldValidator ID="rfvOnHand" runat="server" Display="Dynamic" 
                                    ControlToValidate="OnHandTextBox" CssClass="text-danger"
                                    ErrorMessage="On Hand is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                                <asp:CompareValidator ID="cvOnHand" runat="server" Display="Dynamic" 
                                    ControlToValidate="OnHandTextBox" CssClass="text-danger"
                                    Type="Integer" Operator="GreaterThan" ValueToCompare="0" 
                                    ErrorMessage="On Hand must be a whole number greater than zero." Text="*">
                                </asp:CompareValidator>
                                <asp:TextBox ID="OnHandTextBox" runat="server" 
                                    Text='<%# Bind("OnHand") %>' CssClass="form-control" />
                            </div>
                            <div class="form-group">
                                <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                                    CommandName="Insert" CssClass="btn btn-dark" Text="Insert" />
                                &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                                    CausesValidation="False" CssClass="btn btn-dark" CommandName="Cancel" Text="Cancel" />
                            </div>
                        </div>
                    </InsertItemTemplate>
                    <ItemTemplate>
                        <div class="list-group">
                            <div class="list-group-item bg-halloween">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <b><asp:Label ID="NameLabel" runat="server" 
                                            Text='<%# Bind("Name") %>' /></b>
                                    </div>
                                    <div class="col-sm-4">
                                        <asp:Label ID="UnitPriceLabel" runat="server" 
                                            Text='<%# Bind("UnitPrice", "{0:c}") %>' /> each
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <asp:Label ID="ShortDescriptionLabel" runat="server" 
                                    Text='<%# Bind("ShortDescription") %>' />
                                &nbsp;-&nbsp;
                                <asp:Label ID="LongDescriptionLabel" runat="server" 
                                    Text='<%# Bind("LongDescription") %>' />
                            </div>
                        </div>

                        <table class="table">
                            <thead class="bg-halloween">
                                <tr>
                                    <th>Product ID</th>
                                    <th>On Hand</th>
                                    <th>Category</th>
                                    <th>Image File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><asp:Label ID="ProductIDLabel" runat="server" 
                                        Text='<%# Eval("ProductID") %>' /></td>
                                    <td><asp:Label ID="OnHandLabel" runat="server" 
                                        Text='<%# Bind("OnHand") %>' /></td>
                                    <td><asp:Label ID="CategoryIDLabel" runat="server" 
                                        Text='<%# Bind("CategoryID") %>' /></td>
                                    <td><asp:Label ID="ImageFileLabel" runat="server" 
                                        Text='<%# Bind("ImageFile") %>' /></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="list-group">
                            <div class="list-group-item">
                                <asp:LinkButton CssClass="btn btn-dark" ID="EditButton" runat="server" 
                                    CausesValidation="False" CommandName="Edit" Text="Edit" />
                                &nbsp;<asp:LinkButton CssClass="btn btn-danger" ID="DeleteButton" runat="server" 
                                    CausesValidation="False" CommandName="Delete" Text="Delete" />
                                &nbsp;<asp:LinkButton  CssClass="btn btn-success" ID="NewButton" runat="server" 
                                    CausesValidation="False" CommandName="New" Text="New" />
                            </div>
                        </div>
                    </ItemTemplate>
                </asp:FormView>

                <asp:SqlDataSource ID="SqlDataSource2" runat="server"
                    ConnectionString="<%$ ConnectionStrings:FashionMerch %>"
                    ConflictDetection="CompareAllValues" 
                    OldValuesParameterFormatString="original_{0}" 
                    SelectCommand="SELECT [ProductID], [Name], [ShortDescription], 
                            [LongDescription], [CategoryID], [ImageFile], 
                            [UnitPrice], [OnHand] 
                        FROM [Products] 
                        WHERE ([ProductID] = @ProductID)" 
                    DeleteCommand="DELETE FROM [Products] 
                        WHERE [ProductID] = @original_ProductID 
                          AND [Name] = @original_Name 
                          AND [ShortDescription] = @original_ShortDescription 
                          AND [LongDescription] = @original_LongDescription 
                          AND [CategoryID] = @original_CategoryID 
                          AND (([ImageFile] = @original_ImageFile) 
                           OR ([ImageFile] IS NULL AND @original_ImageFile IS NULL))
                          AND [UnitPrice] = @original_UnitPrice 
                          AND [OnHand] = @original_OnHand" 
                    InsertCommand="INSERT INTO [Products] ([ProductID], [Name], 
                          [ShortDescription], [LongDescription], [CategoryID], 
                          [ImageFile], [UnitPrice], [OnHand]) 
                        VALUES (@ProductID, @Name, @ShortDescription, 
                          @LongDescription, @CategoryID, @ImageFile,  
                          @UnitPrice, @OnHand)" 
                    UpdateCommand="UPDATE [Products] SET [Name] = @Name, 
                          [ShortDescription] = @ShortDescription, 
                          [LongDescription] = @LongDescription, 
                          [CategoryID] = @CategoryID, 
                          [ImageFile] = @ImageFile, 
                          [UnitPrice] = @UnitPrice, 
                          [OnHand] = @OnHand 
                        WHERE [ProductID] = @original_ProductID 
                          AND [Name] = @original_Name 
                          AND [ShortDescription] = @original_ShortDescription 
                          AND [LongDescription] = @original_LongDescription
                          AND [CategoryID] = @original_CategoryID 
                          AND (([ImageFile] = @original_ImageFile) 
                           OR ([ImageFile] IS NULL AND @original_ImageFile IS NULL))
                          AND [UnitPrice] = @original_UnitPrice 
                          AND [OnHand] = @original_OnHand">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="grdProducts" Name="ProductID" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="original_ProductID" Type="String" />
                        <asp:Parameter Name="original_Name" Type="String" />
                        <asp:Parameter Name="original_ShortDescription" Type="String" />
                        <asp:Parameter Name="original_LongDescription" Type="String" />
                        <asp:Parameter Name="original_CategoryID" Type="String" />
                        <asp:Parameter Name="original_ImageFile" Type="String" />
                        <asp:Parameter Name="original_UnitPrice" Type="Decimal" />
                        <asp:Parameter Name="original_OnHand" Type="Int32" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="Name" Type="String" />
                        <asp:Parameter Name="ShortDescription" Type="String" />
                        <asp:Parameter Name="LongDescription" Type="String" />
                        <asp:Parameter Name="CategoryID" Type="String" />    
                        <asp:Parameter Name="ImageFile" Type="String" />
                        <asp:Parameter Name="UnitPrice" Type="Decimal" />
                        <asp:Parameter Name="OnHand" Type="Int32" />
                        <asp:Parameter Name="original_ProductID" Type="String" />
                        <asp:Parameter Name="original_Name" Type="String" />
                        <asp:Parameter Name="original_ShortDescription" Type="String" />
                        <asp:Parameter Name="original_LongDescription" Type="String" />
                        <asp:Parameter Name="original_CategoryID" Type="String" />
                        <asp:Parameter Name="original_ImageFile" Type="String" />
                        <asp:Parameter Name="original_UnitPrice" Type="Decimal" />
                        <asp:Parameter Name="original_OnHand" Type="Int32" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:Parameter Name="ProductID" Type="String" />
                        <asp:Parameter Name="Name" Type="String" />
                        <asp:Parameter Name="ShortDescription" Type="String" />
                        <asp:Parameter Name="LongDescription" Type="String" />
                        <asp:Parameter Name="CategoryID" Type="String" />
                        <asp:Parameter Name="ImageFile" Type="String" />
                        <asp:Parameter Name="UnitPrice" Type="Decimal" />
                        <asp:Parameter Name="OnHand" Type="Int32" />
                    </InsertParameters>
                </asp:SqlDataSource>  
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString='<%$ ConnectionStrings:FashionMerch %>' 
                    SelectCommand="SELECT [CategoryID], [LongName] 
                        FROM [Categories] ORDER BY [LongName]">
                </asp:SqlDataSource> 
            </div>
        </div>
</asp:Content>
