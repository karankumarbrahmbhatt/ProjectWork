#pragma checksum "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Home\Index.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "c1fa94817c5f24320e044a4f5eddc8580a2481e5"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Home_Index), @"mvc.1.0.view", @"/Views/Home/Index.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"c1fa94817c5f24320e044a4f5eddc8580a2481e5", @"/Views/Home/Index.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"a85bb3a1f5b42cee7936e01fe8aebb63edeff1ce", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_Home_Index : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<IEnumerable<OnlineStore.Models.Database.Product>>
    #nullable disable
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
#nullable restore
#line 2 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Home\Index.cshtml"
  
    ViewData["Title"] = "Home Page";

#line default
#line hidden
#nullable disable
            WriteLiteral("<br />\r\n<!--<div class=\"container\">\r\n    <a href=\"/filter\">Filtered search</a>\r\n</div>\r\n    -->\r\n<br />\r\n<div class=\"card-columns\">\r\n");
#nullable restore
#line 12 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Home\Index.cshtml"
     foreach (var i in Model)
    {
        

#line default
#line hidden
#nullable disable
#nullable restore
#line 14 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Home\Index.cshtml"
   Write(await Html.PartialAsync("_CardProduct", i));

#line default
#line hidden
#nullable disable
#nullable restore
#line 14 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\Home\Index.cshtml"
                                                   ;
    }

#line default
#line hidden
#nullable disable
            WriteLiteral("</div>\r\n\r\n");
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<IEnumerable<OnlineStore.Models.Database.Product>> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591
