#pragma checksum "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "3615fd8a2cd1dd47246a7f01b9f8437f4ff1cd65"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_ShoppingCart_Index), @"mvc.1.0.view", @"/Views/ShoppingCart/Index.cshtml")]
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
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"3615fd8a2cd1dd47246a7f01b9f8437f4ff1cd65", @"/Views/ShoppingCart/Index.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"a85bb3a1f5b42cee7936e01fe8aebb63edeff1ce", @"/Views/_ViewImports.cshtml")]
    #nullable restore
    public class Views_ShoppingCart_Index : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<OnlineStore.Models.ViewModel.ShoppingCartModel>
    #nullable disable
    {
        private static readonly global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute __tagHelperAttribute_0 = new global::Microsoft.AspNetCore.Razor.TagHelpers.TagHelperAttribute("src", new global::Microsoft.AspNetCore.Html.HtmlString("~/lib/jquery/dist/jquery.js"), global::Microsoft.AspNetCore.Razor.TagHelpers.HtmlAttributeValueStyle.DoubleQuotes);
        #line hidden
        #pragma warning disable 0649
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperExecutionContext __tagHelperExecutionContext;
        #pragma warning restore 0649
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperRunner __tagHelperRunner = new global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperRunner();
        #pragma warning disable 0169
        private string __tagHelperStringValueBuffer;
        #pragma warning restore 0169
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager __backed__tagHelperScopeManager = null;
        private global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager __tagHelperScopeManager
        {
            get
            {
                if (__backed__tagHelperScopeManager == null)
                {
                    __backed__tagHelperScopeManager = new global::Microsoft.AspNetCore.Razor.Runtime.TagHelpers.TagHelperScopeManager(StartTagHelperWritingScope, EndTagHelperWritingScope);
                }
                return __backed__tagHelperScopeManager;
            }
        }
        private global::Microsoft.AspNetCore.Mvc.Razor.TagHelpers.UrlResolutionTagHelper __Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper;
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n");
#nullable restore
#line 3 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
  
    ViewData["Title"] = "Index";
    Layout = "~/Views/Shared/_Layout.cshtml";

#line default
#line hidden
#nullable disable
            WriteLiteral(@"
<h1>Here are all your products</h1>
<hr />
<style>
    .count-form {
        margin: 4px;
    }
</style>
<div class=""container"">
    <table class=""table"">
        <thead>
            <tr>
                <td>Name</td>
                <td>Count</td>
                <td>Price</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
");
#nullable restore
#line 26 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
             foreach (var i in Model.ShoppingCarts)
            {

#line default
#line hidden
#nullable disable
            WriteLiteral("                <tr>\r\n                    <td><a");
            BeginWriteAttribute("href", " href=\"", 644, "\"", 672, 2);
            WriteAttributeValue("", 651, "/product/", 651, 9, true);
#nullable restore
#line 29 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 660, i.ProductId, 660, 12, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">");
#nullable restore
#line 29 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
                                                   Write(i.Product.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</a></td>\r\n                    <td>\r\n                        <input class=\"count-form\" max=\"999\" min=\"1\" type=\"number\" data-id=\"");
#nullable restore
#line 31 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
                                                                                      Write(i.ProductId);

#line default
#line hidden
#nullable disable
            WriteLiteral("\"");
            BeginWriteAttribute("value", " value=\"", 830, "\"", 846, 1);
#nullable restore
#line 31 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 838, i.Count, 838, 8, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" />\r\n                        <a class=\"btn btn-outline-dark count\"");
            BeginWriteAttribute("href", " href=\"", 913, "\"", 985, 4);
            WriteAttributeValue("", 920, "/api/cart/add/", 920, 14, true);
#nullable restore
#line 32 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 934, i.ProductId, 934, 12, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 946, "?count=#&redirect=", 946, 18, true);
#nullable restore
#line 32 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 964, Context.Request.Path, 964, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Save</a>\r\n                    </td>\r\n                    <td>\r\n                        $");
#nullable restore
#line 35 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
                     Write(i.Product.Price * i.Count);

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n                    </td>\r\n                    <td>\r\n                        <a");
            BeginWriteAttribute("href", " href=\"", 1184, "\"", 1252, 4);
            WriteAttributeValue("", 1191, "/api/cart/remove/", 1191, 17, true);
#nullable restore
#line 38 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 1208, i.ProductId, 1208, 12, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 1220, "?&redirect=", 1220, 11, true);
#nullable restore
#line 38 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
WriteAttributeValue("", 1231, Context.Request.Path, 1231, 21, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(">Remove</a>\r\n                    </td>\r\n                </tr>\r\n");
#nullable restore
#line 41 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
            }

#line default
#line hidden
#nullable disable
            WriteLiteral("        </tbody>\r\n    </table>\r\n");
#nullable restore
#line 44 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
     if (Model.TotalPrice != 0.0M)
    {

#line default
#line hidden
#nullable disable
            WriteLiteral("        <hr />\r\n        <div class=\"container\">\r\n            <h3 class=\"align-content-lg-end\">\r\n                Price: $");
#nullable restore
#line 49 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
                   Write(Model.TotalPrice);

#line default
#line hidden
#nullable disable
            WriteLiteral("\r\n            </h3>\r\n        </div>\r\n        <div class=\"container\">\r\n            <a class=\"btn btn-lg btn-success\" href=\"/purchase\">Place Order</a>\r\n        </div>\r\n");
#nullable restore
#line 55 "C:\Users\karan\Downloads\Group_Project_ASP_NET\Group_Project_ASP_NET\ShoeStore\OnlineStore\Views\ShoppingCart\Index.cshtml"
    }

#line default
#line hidden
#nullable disable
            WriteLiteral("</div>\r\n\r\n");
            __tagHelperExecutionContext = __tagHelperScopeManager.Begin("script", global::Microsoft.AspNetCore.Razor.TagHelpers.TagMode.StartTagAndEndTag, "3615fd8a2cd1dd47246a7f01b9f8437f4ff1cd6510111", async() => {
            }
            );
            __Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper = CreateTagHelper<global::Microsoft.AspNetCore.Mvc.Razor.TagHelpers.UrlResolutionTagHelper>();
            __tagHelperExecutionContext.Add(__Microsoft_AspNetCore_Mvc_Razor_TagHelpers_UrlResolutionTagHelper);
            __tagHelperExecutionContext.AddHtmlAttribute(__tagHelperAttribute_0);
            await __tagHelperRunner.RunAsync(__tagHelperExecutionContext);
            if (!__tagHelperExecutionContext.Output.IsContentModified)
            {
                await __tagHelperExecutionContext.SetOutputContentAsync();
            }
            Write(__tagHelperExecutionContext.Output);
            __tagHelperExecutionContext = __tagHelperScopeManager.End();
            WriteLiteral(@"
<script>
    $("".count"").click(function () {
        let input = this.previousElementSibling;
        let count = input.value;
        if (Math.sign(count) === 1) {
            this.href = this.href.replace(""#"", count);
        }
        else {
            this.stopPropagation();
        }
    });

</script>
");
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
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<OnlineStore.Models.ViewModel.ShoppingCartModel> Html { get; private set; } = default!;
        #nullable disable
    }
}
#pragma warning restore 1591
