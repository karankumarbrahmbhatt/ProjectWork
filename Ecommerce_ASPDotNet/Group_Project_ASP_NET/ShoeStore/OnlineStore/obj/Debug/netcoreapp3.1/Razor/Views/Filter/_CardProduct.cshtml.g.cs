#pragma checksum "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "de1985a4c1b540d38acaa966acc51578e614517a"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Filter__CardProduct), @"mvc.1.0.view", @"/Views/Filter/_CardProduct.cshtml")]
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
#line 1 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\_ViewImports.cshtml"
using OnlineStore;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\_ViewImports.cshtml"
using OnlineStore.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"de1985a4c1b540d38acaa966acc51578e614517a", @"/Views/Filter/_CardProduct.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"a85bb3a1f5b42cee7936e01fe8aebb63edeff1ce", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_Filter__CardProduct : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<OnlineStore.Models.Database.Product>
    #nullable disable
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n<div class=\"card\" style=\"width: 18rem;\">\r\n    <img");
            BeginWriteAttribute("src", " src=\"", 96, "\"", 152, 2);
            WriteAttributeValue("", 102, "/image/", 102, 7, true);
#nullable restore
#line 4 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml"
WriteAttributeValue("", 109, Html.DisplayFor(model => model.Image.Path), 109, 43, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"card-img-top\" alt=\"Model picture\"/>\r\n    <div class=\"card-body\">\r\n        <h5 class=\"card-title card-link\"><a");
            BeginWriteAttribute("href", " href=\"", 270, "\"", 321, 2);
            WriteAttributeValue("", 277, "/product/", 277, 9, true);
#nullable restore
#line 6 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml"
WriteAttributeValue("", 286, Html.DisplayFor(model => model.Id), 286, 35, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">");
#nullable restore
#line 6 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml"
                                                                                           Write(Html.DisplayFor(model => model.Name));

#line default
#line hidden
#nullable disable
            WriteLiteral("</a></h5>\r\n        <p class=\"card-text\">");
#nullable restore
#line 7 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml"
                        Write(Html.DisplayFor(model => model.Description));

#line default
#line hidden
#nullable disable
            WriteLiteral("</p>\r\n        <p class=\"card-text text-info\">Price: ");
#nullable restore
#line 8 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Filter\_CardProduct.cshtml"
                                         Write(Html.DisplayFor(model => model.Price));

#line default
#line hidden
#nullable disable
            WriteLiteral("</p>\r\n    </div>\r\n</div>");
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<OnlineStore.Models.Database.Product> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591
