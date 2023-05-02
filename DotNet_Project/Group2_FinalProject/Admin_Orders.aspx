<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Admin_Orders.aspx.cs" Inherits="Group2_FinalProject.Admin_Orders" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div class="container">
     <h2>Orders</h2>
          <div class="col-sm-5 table-responsive">
                <asp:GridView ID="grdCustomers" runat="server" 
                    AutoGenerateColumns="False" DataKeyNames="OrderID" 
                    DataSourceID="SqlDataSource1" AllowPaging="True" 
                    SelectedIndex="0" 
                    CssClass="table table-bordered table-striped table-condensed" 
                   >
                    <Columns>
                        <asp:BoundField DataField="OrderID" HeaderText="OrderID" 
                            ReadOnly="True" SortExpression="OrderID">
                        </asp:BoundField>
                        <asp:BoundField DataField="Email" HeaderText="Email" SortExpression="Email">
                        </asp:BoundField>
                        <asp:BoundField DataField="FirstName" HeaderText="FirstName" SortExpression="FirstName"> 
                        </asp:BoundField>
                        <asp:BoundField DataField="LastName" HeaderText="LastName" SortExpression="LastName" />
                        <asp:CommandField ButtonType="Link" ShowSelectButton="true"> 
                            <ItemStyle CssClass="col-xs-2" />
                        </asp:CommandField>
                    </Columns>
                    <HeaderStyle CssClass="bg-halloween" />
                    <PagerSettings Mode="NextPreviousFirstLast" />
                    <PagerStyle CssClass="pagerStyle" 
                        BackColor="#8c8c8c" HorizontalAlign="Center" />
                    <SelectedRowStyle CssClass="warning" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:FashionMerch %>" 
                    SelectCommand="SELECT [OrderID], [Email], [FirstName], [LastName] FROM [Orders]">
                </asp:SqlDataSource>    
            </div>  

            <div class="col-sm-7">
                <asp:DetailsView ID="dvCustomer" runat="server" 
                    DataSourceID="SqlDataSource2" DataKeyNames="Email" 
                    AutoGenerateRows="False"  
                    CssClass="table table-bordered table-condensed" 
                    OnItemDeleted="dvCustomer_ItemDeleted" 
                    OnItemDeleting="dvCustomer_ItemDeleting" 
                    OnItemInserted="dvCustomer_ItemInserted" 
                    OnItemUpdated="dvCustomer_ItemUpdated">
                    <Fields>
                        <asp:TemplateField HeaderText="Email">
                            <EditItemTemplate>
                                <asp:Label runat="server" ID="lblEmail"
                                    Text='<%# Eval("Email") %>'></asp:Label>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtEmail" 
                                        Text='<%# Bind("Email") %>' MaxLength="25" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvEmail" runat="server" 
                                    ControlToValidate="txtEmail" CssClass="text-danger"
                                    ErrorMessage="Email is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="Label1" 
                                    Text='<%# Bind("Email") %>'></asp:Label>
                            </ItemTemplate>
                            <HeaderStyle CssClass="col-xs-4" />
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Last Name">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtLastName"
                                        Text='<%# Bind("LastName") %>' MaxLength="20" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvLastName" runat="server" 
                                    ControlToValidate="txtLastName" CssClass="text-danger"
                                    ErrorMessage="LastName is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtLastName" 
                                        Text='<%# Bind("LastName") %>' MaxLength="20" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                    ControlToValidate="txtLastName" CssClass="text-danger"
                                    ErrorMessage="LastName is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblLastName"
                                    Text='<%# Bind("LastName") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="First Name">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtFirstName" 
                                        Text='<%# Bind("FirstName") %>' MaxLength="20"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvFirstName" runat="server" 
                                    ControlToValidate="txtFirstName" CssClass="text-danger"
                                    ErrorMessage="First Name is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtFirstName" 
                                        Text='<%# Bind("FirstName") %>' MaxLength="20"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                                    ControlToValidate="txtFirstName" CssClass="text-danger"
                                    ErrorMessage="First Name is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblFirstName" 
                                    Text='<%# Bind("FirstName") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Address">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtAddress" 
                                        Text='<%# Bind("Address") %>' MaxLength="40"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvAddress" runat="server" 
                                    ControlToValidate="txtAddress" CssClass="text-danger"
                                    ErrorMessage="Address is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtAddress" 
                                        Text='<%# Bind("Address") %>' MaxLength="40"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                                    ControlToValidate="txtAddress" CssClass="text-danger"
                                    ErrorMessage="Address is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblAddress" 
                                    Text='<%# Bind("Address") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="City">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtCity" 
                                        Text='<%# Bind("City") %>' MaxLength="30"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvCity" runat="server" 
                                    ControlToValidate="txtCity" CssClass="text-danger"
                                    ErrorMessage="City is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtCity" 
                                        Text='<%# Bind("City") %>' MaxLength="30"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                                    ControlToValidate="txtCity" CssClass="text-danger"
                                    ErrorMessage="City is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblCity" 
                                    Text='<%# Bind("City") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="State">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:DropDownList runat="server" ID="ddlStates" 
                                        DataSourceID="SqlDataSource3" 
                                        DataTextField="StateName" DataValueField="StateCode" 
                                        SelectedValue='<%# Bind("State") %>'
                                        CssClass="form-control"></asp:DropDownList>
                                </div>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:DropDownList runat="server" ID="ddlStates" 
                                        DataSourceID="SqlDataSource3" 
                                        DataTextField="StateName" DataValueField="StateCode" 
                                        SelectedValue='<%# Bind("State") %>'
                                        CssClass="form-control"></asp:DropDownList>
                                </div>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblState" 
                                    Text='<%# Bind("State") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Zip Code">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtZipCode" 
                                        Text='<%# Bind("ZipCode") %>' MaxLength="9" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtZipCode" 
                                        Text='<%# Bind("ZipCode") %>' MaxLength="9" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblZipCode" 
                                    Text='<%# Bind("ZipCode") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Phone Number">
                            <EditItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtPhone" 
                                        Text='<%# Bind("PhoneNumber") %>' MaxLength="20" 
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="rfvPhone" runat="server" 
                                    ControlToValidate="txtPhone" CssClass="text-danger"
                                    ErrorMessage="Phone Number is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </EditItemTemplate>
                            <InsertItemTemplate>
                                <div class="col-xs-11 col-edit-insert">
                                    <asp:TextBox runat="server" ID="txtPhone" 
                                        Text='<%# Bind("PhoneNumber") %>' MaxLength="20"
                                        CssClass="form-control"></asp:TextBox>
                                </div>
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                                    ControlToValidate="txtPhone" CssClass="text-danger"
                                    ErrorMessage="Phone Number is a required field." Text="*">
                                </asp:RequiredFieldValidator>
                            </InsertItemTemplate>
                            <ItemTemplate>
                                <asp:Label runat="server" ID="lblUnitPrice" 
                                    Text='<%# Bind("PhoneNumber") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:CommandField ButtonType="Link" 
                            ShowDeleteButton="true" 
                            ShowEditButton="true" 
                            ShowInsertButton="true" />
                    </Fields>
                    <RowStyle BackColor="#e7e7e7" />
                    <CommandRowStyle BackColor="#8c8c8c" ForeColor="white" />
                </asp:DetailsView>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server"
                    ConnectionString="<%$ ConnectionStrings:FashionMerch %>"
                    ConflictDetection="CompareAllValues" 
                    OldValuesParameterFormatString="original_{0}" 
                    SelectCommand="SELECT [OrderID], [Email], [LastName], [FirstName], [Address], [City], [State], [ZipCode], [PhoneNumber] FROM [Orders] WHERE ([OrderID] = @OrderID)" 
                    DeleteCommand="DELETE FROM [Orders] WHERE [OrderID] = @original_Email AND [LastName] = @original_LastName AND [FirstName] = @original_FirstName AND [Address] = @original_Address AND [City] = @original_City AND [State] = @original_State AND [ZipCode] = @original_ZipCode AND [PhoneNumber] = @original_PhoneNumber" 
                    InsertCommand="INSERT INTO [Orders] ([Email], [LastName], [FirstName], [Address], [City], [State], [ZipCode], [PhoneNumber]) VALUES (@Email, @LastName, @FirstName, @Address, @City, @State, @ZipCode, @PhoneNumber)" 
                    UpdateCommand="UPDATE [Orders] SET [LastName] = @LastName, [FirstName] = @FirstName, [Address] = @Address, [City] = @City, [State] = @State, [ZipCode] = @ZipCode, [PhoneNumber] = @PhoneNumber WHERE [OrderID] = @original_OrderID AND [LastName] = @original_LastName AND [FirstName] = @original_FirstName AND [Address] = @original_Address AND [City] = @original_City AND [State] = @original_State AND [ZipCode] = @original_ZipCode AND [PhoneNumber] = @original_PhoneNumber">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="grdCustomers" Name="OrderID" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="original_OrderID" Type="String" />
                        <asp:Parameter Name="original_Email" Type="String" />
                        <asp:Parameter Name="original_LastName" Type="String" />
                        <asp:Parameter Name="original_FirstName" Type="String" />
                        <asp:Parameter Name="original_Address" Type="String" />
                        <asp:Parameter Name="original_City" Type="String" />
                        <asp:Parameter Name="original_State" Type="String" />
                        <asp:Parameter Name="original_ZipCode" Type="String" />
                        <asp:Parameter Name="original_PhoneNumber" Type="String" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="original_OrderID" Type="String" />
                        <asp:Parameter Name="LastName" Type="String" />
                        <asp:Parameter Name="FirstName" Type="String" />
                        <asp:Parameter Name="Address" Type="String" />
                        <asp:Parameter Name="City" Type="String" />    
                        <asp:Parameter Name="State" Type="String" />
                        <asp:Parameter Name="ZipCode" Type="String" />
                        <asp:Parameter Name="PhoneNumber" Type="String" />
                        <asp:Parameter Name="original_Email" Type="String" />
                        <asp:Parameter Name="original_LastName" Type="String" />
                        <asp:Parameter Name="original_FirstName" Type="String" />
                        <asp:Parameter Name="original_Address" Type="String" />
                        <asp:Parameter Name="original_City" Type="String" />
                        <asp:Parameter Name="original_State" Type="String" />
                        <asp:Parameter Name="original_ZipCode" Type="String" />
                        <asp:Parameter Name="original_PhoneNumber" Type="String" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:Parameter Name="Email" Type="String" />
                        <asp:Parameter Name="LastName" Type="String" />
                        <asp:Parameter Name="FirstName" Type="String" />
                        <asp:Parameter Name="Address" Type="String" />
                        <asp:Parameter Name="City" Type="String" />
                        <asp:Parameter Name="State" Type="String" />
                        <asp:Parameter Name="ZipCode" Type="String" />
                        <asp:Parameter Name="PhoneNumber" Type="String" />
                    </InsertParameters>
                </asp:SqlDataSource>  
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString='<%$ ConnectionStrings:FashionMerch %>' 
                    SelectCommand="SELECT [StateCode], [StateName] FROM [States] ORDER BY [StateName]">
                </asp:SqlDataSource> 

                <p><asp:ValidationSummary ID="ValidationSummary1" runat="server" 
                        HeaderText="Please correct the following errors:" 
                        CssClass="text-danger" />
                <p><asp:Label ID="lblError" runat="server" 
                    EnableViewState="false" CssClass="text-danger"></asp:Label></p>

            </div>
        </div>
</asp:Content>
