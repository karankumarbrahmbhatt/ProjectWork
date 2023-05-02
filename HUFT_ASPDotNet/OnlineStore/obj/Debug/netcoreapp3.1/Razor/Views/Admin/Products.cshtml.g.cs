#pragma checksum "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "5b1110453c00fc8e3f2b78051d2c6187c6936a2d"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Admin_Products), @"mvc.1.0.view", @"/Views/Admin/Products.cshtml")]
namespace AspNetCore
{
    #line hidden
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using Microsoft.AspNetCore.Mvc;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using Microsoft.AspNetCore.Mvc.ViewFeatures;
#nullable restore
#line 1 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\_ViewImports.cshtml"
using OnlineStore;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\_ViewImports.cshtml"
using OnlineStore.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"5b1110453c00fc8e3f2b78051d2c6187c6936a2d", @"/Views/Admin/Products.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"a85bb3a1f5b42cee7936e01fe8aebb63edeff1ce", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_Admin_Products : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<OnlineStore.Models.ViewModel.AdminProducts>
    #nullable disable
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
#nullable restore
#line 2 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
  
    ViewData["Title"] = "Products";
    Layout = "~/Views/Admin/_AdminLayout.cshtml";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<h1>Products</h1>
<style>
    .btn a {
        margin-left: 3px;
    }
</style>
<table class=""table"">
    <thead>
        <tr>
            <td>Name</td>
            <td>Owner</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
");
#nullable restore
#line 22 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
         foreach (var i in Model.Products)
        {

#line default
#line hidden
#nullable disable
            WriteLiteral("            <tr>\r\n                <td>\r\n                    <a");
            BeginWriteAttribute("href", " href=\"", 528, "\"", 549, 2);
            WriteAttributeValue("", 535, "/product/", 535, 9, true);
#nullable restore
#line 26 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
WriteAttributeValue("", 544, i.Id, 544, 5, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">");
#nullable restore
#line 26 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
                                        Write(i.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</a>\r\n                </td>\r\n                <td>\r\n                    ");
#nullable restore
#line 29 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
               Write(i.CreatorUser.Surname);

#line default
#line hidden
#nullable disable
            WriteLiteral(" ");
#nullable restore
#line 29 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
                                      Write(i.CreatorUser.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n                </td>\r\n                <td>\r\n                    <a class=\"btn btn-dark\"");
            BeginWriteAttribute("href", " href=\"", 761, "\"", 824, 4);
            WriteAttributeValue("", 768, "/api/product/remove/", 768, 20, true);
#nullable restore
#line 32 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
WriteAttributeValue("", 788, i.Id, 788, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 793, "?redirect=", 793, 10, true);
#nullable restore
#line 32 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
WriteAttributeValue("", 803, Context.Request.Path, 803, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Remove</a>\r\n                    <a class=\"btn btn-info\"");
            BeginWriteAttribute("href", " href=\"", 881, "\"", 907, 2);
            WriteAttributeValue("", 888, "/product/edit/", 888, 14, true);
#nullable restore
#line 33 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
WriteAttributeValue("", 902, i.Id, 902, 5, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Edit</a>\r\n                </td>\r\n            </tr>\r\n");
#nullable restore
#line 36 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Products.cshtml"
        }

#line default
#line hidden
#nullable disable
            WriteLiteral("    </tbody>\r\n</table>\r\n<div class=\"container\">\r\n    <a class=\"btn btn-outline-success\" href=\"/product/edit/-10\">\r\n        New\r\n    </a>\r\n</div>\r\n");
        }
        #pragma warning restore 1998
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; } = default!;
        #nullable disable
        #nullable restore
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<OnlineStore.Models.ViewModel.AdminProducts> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591