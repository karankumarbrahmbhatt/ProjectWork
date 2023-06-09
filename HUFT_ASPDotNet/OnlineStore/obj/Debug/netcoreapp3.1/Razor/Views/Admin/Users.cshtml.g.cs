#pragma checksum "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "fe4b1893879fcb10d7dd910c80e21d4e572bd3a6"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Admin_Users), @"mvc.1.0.view", @"/Views/Admin/Users.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"fe4b1893879fcb10d7dd910c80e21d4e572bd3a6", @"/Views/Admin/Users.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"a85bb3a1f5b42cee7936e01fe8aebb63edeff1ce", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_Admin_Users : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<OnlineStore.Models.ViewModel.AdminUsers>
    #nullable disable
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
#nullable restore
#line 2 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
  
    ViewData["Title"] = "Users";
    Layout = "~/Views/Admin/_AdminLayout.cshtml";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<h1>Users</h1>

<div class=""container"">
    <style>
        a{
            margin-left: 3px;
        }
    </style>
    <h3>Administrators</h3>
    <table class=""table"">
        <thead>
            <tr>
                <td>Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
");
#nullable restore
#line 24 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
             foreach (var i in Model.Admins)
            {

#line default
#line hidden
#nullable disable
            WriteLiteral("                <tr>\r\n                    <td>");
#nullable restore
#line 27 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                   Write(i.Surname);

#line default
#line hidden
#nullable disable
            WriteLiteral("  ");
#nullable restore
#line 27 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                               Write(i.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                    <td>\r\n                        <a class=\"btn btn-info\"");
            BeginWriteAttribute("href", " href=\"", 682, "\"", 757, 4);
            WriteAttributeValue("", 689, "/api/admin/user/", 689, 16, true);
#nullable restore
#line 29 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 705, i.Id, 705, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 710, "?role=simpleuser&redirect=", 710, 26, true);
#nullable restore
#line 29 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 736, Context.Request.Path, 736, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Simple user</a>\r\n                        <a class=\"btn btn-dark\"");
            BeginWriteAttribute("href", " href=\"", 823, "\"", 897, 4);
            WriteAttributeValue("", 830, "/api/admin/user/", 830, 16, true);
#nullable restore
#line 30 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 846, i.Id, 846, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 851, "?role=moderator&redirect=", 851, 25, true);
#nullable restore
#line 30 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 876, Context.Request.Path, 876, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Moderator</a>\r\n                    </td>\r\n                </tr>\r\n");
#nullable restore
#line 33 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
            }

#line default
#line hidden
#nullable disable
            WriteLiteral("        </tbody>\r\n    </table>\r\n    <hr />\r\n    <h3>Moderators</h3>\r\n    <table class=\"table\">\r\n        <thead>\r\n            <tr>\r\n                <td>Name</td>\r\n                <td>Action</td>\r\n            </tr>\r\n        </thead>\r\n        <tbody>\r\n");
#nullable restore
#line 46 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
             foreach (var i in Model.Moderators)
            {

#line default
#line hidden
#nullable disable
            WriteLiteral("                <tr>\r\n                    <td>");
#nullable restore
#line 49 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                   Write(i.Surname);

#line default
#line hidden
#nullable disable
            WriteLiteral("  ");
#nullable restore
#line 49 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                               Write(i.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                    <td>\r\n                        <a class=\"btn btn-info\"");
            BeginWriteAttribute("href", " href=\"", 1438, "\"", 1513, 4);
            WriteAttributeValue("", 1445, "/api/admin/user/", 1445, 16, true);
#nullable restore
#line 51 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 1461, i.Id, 1461, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 1466, "?role=simpleuser&redirect=", 1466, 26, true);
#nullable restore
#line 51 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 1492, Context.Request.Path, 1492, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Simple user</a>\r\n                        <a class=\"btn btn-dark\"");
            BeginWriteAttribute("href", " href=\"", 1579, "\"", 1649, 4);
            WriteAttributeValue("", 1586, "/api/admin/user/", 1586, 16, true);
#nullable restore
#line 52 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 1602, i.Id, 1602, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 1607, "?role=admin&redirect=", 1607, 21, true);
#nullable restore
#line 52 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 1628, Context.Request.Path, 1628, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Administrator</a>\r\n                    </td>\r\n                </tr>\r\n");
#nullable restore
#line 55 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
            }

#line default
#line hidden
#nullable disable
            WriteLiteral("        </tbody>\r\n    </table>\r\n    <hr />\r\n    <h3>Simple users</h3>\r\n    <table class=\"table\">\r\n        <thead>\r\n            <tr>\r\n                <td>Name</td>\r\n                <td>Action</td>\r\n            </tr>\r\n        </thead>\r\n        <tbody>\r\n");
#nullable restore
#line 68 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
             foreach (var i in Model.Users)
            {

#line default
#line hidden
#nullable disable
            WriteLiteral("                <tr>\r\n                    <td>");
#nullable restore
#line 71 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                   Write(i.Surname);

#line default
#line hidden
#nullable disable
            WriteLiteral("  ");
#nullable restore
#line 71 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
                               Write(i.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</td>\r\n                    <td>\r\n                        <a class=\"btn btn-info\"");
            BeginWriteAttribute("href", " href=\"", 2191, "\"", 2265, 4);
            WriteAttributeValue("", 2198, "/api/admin/user/", 2198, 16, true);
#nullable restore
#line 73 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 2214, i.Id, 2214, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 2219, "?role=moderator&redirect=", 2219, 25, true);
#nullable restore
#line 73 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 2244, Context.Request.Path, 2244, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Moderator</a>\r\n                        <a class=\"btn btn-dark\"");
            BeginWriteAttribute("href", " href=\"", 2329, "\"", 2399, 4);
            WriteAttributeValue("", 2336, "/api/admin/user/", 2336, 16, true);
#nullable restore
#line 74 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 2352, i.Id, 2352, 5, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 2357, "?role=admin&redirect=", 2357, 21, true);
#nullable restore
#line 74 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
WriteAttributeValue("", 2378, Context.Request.Path, 2378, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Administrator</a>\r\n                    </td>\r\n                </tr>\r\n");
#nullable restore
#line 77 "C:\Users\karan\Downloads\HUFT\OnlineStore\Views\Admin\Users.cshtml"
            }

#line default
#line hidden
#nullable disable
            WriteLiteral("        </tbody>\r\n    </table>\r\n\r\n</div>\r\n");
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<OnlineStore.Models.ViewModel.AdminUsers> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591
