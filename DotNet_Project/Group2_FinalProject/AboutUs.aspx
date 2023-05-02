<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="AboutUs.aspx.cs" Inherits="Group2_FinalProject.AboutUs" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <!DOCTYPE html>
    <html>

    <head>
        <title>About us Page</title>
        <style>
        	* {
        		margin: 0;
        		padding: 0;
        	}

        	html {
        		scroll-behaviour: smooth;
        	}

        	:root {
        		--navbar-height: 59px;
        	}

        	.logo {
        		width: 20%;
        		display: flex;
        		justify-content: center;
        		align-items: center;
        	}

        		.logo img {
        			width: 33%;
        			border: 2px solid white;
        			border-radius: 50px;
        		}

        	.background {
        		background: #F2F2F2;
        		background-blend-mode: darken;
        		background-size: cover;
        	}

        	.firstsection {
        		height: 22rem;
        	}

        	.box-main {
        		display: flex;
        		justify-content: center;
        		align-items: center;
        		color: white;
        		max-width: 84%;
        		margin: auto;
        		height: 105%;
        	}


        	.firstHalf {
        		width: 75%;
        		display: flex;
        		flex-direction: column;
        		justify-content: center
        	}

        		.firstHalf img {
        			display: flex;
        			border-radius: 9050px;
        		}

        	.text-big {
        		font-weight: bold;
        		font-size: 41px;
        		text-align: center;
        	}

        	.text-small {
        		font-size: 18px;
        		text-align: center;
                color:black!important;
        	}

        	#service {
        		margin: 34px;
        		display: flex;
        	}

        		#service .box {
        			padding: 100px;
        			margin: 3px 6px;
        			border-radius: 28px;
        		}

        			#service .box img {
        				margin-top: 10px;
        				height: 150px;
        				margin: auto;
        				display: block;
        				border-radius: 200px;
        			}

        			#service .box p {
        				font-family: sans-serif;
        				text-align: center;
        			}

        	#services {
        		margin: 34px;
        		display: flex;
        	}

        		#services .box {
        			padding: 60px;
        			margin: 3px 6px;
        			border-radius: 28px;
        		}

        			#services .box img {
        				margin-top: 10px;
        				height: 150px;
        				margin: auto;
        				display: block;
        				border-radius: 100px;
        			}

        			#services .box p {
        				font-family: sans-serif;
        				text-align: center;
        			}

        	.btn {
        		padding: 8px 20px;
        		margin: 7px 0;
        		border: 2px solid white;
        		border-radius: 8px;
        		background: none;
        		color: white;
        		cursor: pointer;
        	}

        	.btn-sm {
        		padding: 6px 10px;
        		vertical-align: middle;
        	}

        	.center {
        		text-align: center;
        	}

        	@media screen and (max-width: 900px) {
        		.column {
        			width: 100%;
        			display: block;
        		}
        	}

        #title3 {
background-image: url(../images/aboutUs.jpg);
    background-size: cover;
    margin-top: -5%;
        }
        </style>
    </head>
    <body>
     <div class="container-fluid" id="title3">
        <div class="top-container">
            <div>
                <%-- <button class="top-button" PostBackUrl="~/Order.aspx">Shop now</button>--%>
            </div>
        </div>
    </div>

        <section class="background firstsection">
            <div class="box-main">
                <div class="firstHalf">
                    <p class="text-small">
                        Influential, innovative and progressive, NAZARA is reinventing a wholly modern approach to fashion.
                    The House has redefined luxury for the 21st century, further reinforcing its position as one of the world’s most desirable fashion houses.
                    Eclectic, contemporary, romantic—nazara products represent the pinnacle of Italian craftsmanship and are unsurpassed for their quality and attention to detail.
Nazara is part of the Kering Group. A global Luxury group, Kering manages the development of a series of renowned Houses in Fashion, Leather Goods, Jewellery and Watches.
                    </p>
                </div>
            </div>
        </section>
        <section class="service">
            <h1 class="h-primary center" style="margin-top: 30px; text-align: center;">Our Team
            </h1>
            <div id="services">
                <div class="box">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20201231132740/Capture.PNG"
                        alt="picture goes here">

                    <p class="center">
                        <a href="#xyz" style="text-decoration: none; color: black; font-weight: bold;">Dhwani Dedhia
                        </a>
                    </p>
                    <p style="font-family: sans-serif">CEO and the Founder</p>
                </div>
                <div class="box">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20201231132740/Capture.PNG"
                        alt="picture goes here">

                    <p class="center">
                        <a href="#abc" style="text-decoration: none; color: black; font-weight: bold;">Dhura Mistry
                        </a>
                    </p>

                    <p style="font-family: sans-serif">co-founder</p>
                </div>
                <div class="box">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20201231132740/Capture.PNG"
                        alt="picture goes here">
                    <br>
                    <p class="center">
                        <a href="#xyz" style="text-decoration: none; color: black; font-weight: bold;">Nishnat Guatam
                        </a>
                    </p>
                    <p style="font-family: sans-serif">Executive Director</p>

                </div>
                <div class="box">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20201231132740/Capture.PNG"
                        alt="picture goes here">

                    <p class="center">
                        <a href="#xyz" style="text-decoration: none; color: black; font-weight: bold;">Karankumar Bhrambhatt
                        </a>
                    </p>
                    <p style="font-family: sans-serif">Chief Network/Security Officer</p>
                </div>
                <div class="box">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20201231132740/Capture.PNG"
                        alt="picture goes here">

                    <p class="center">
                        <a href="#xyz" style="text-decoration: none; color: black; font-weight: bold;">Manjeet Ahuja
                        </a>
                    </p>
                    <p style="font-family: sans-serif">Director of Marketing</p>
                </div>
            </div>

        </section>

    </body>

    </html>
</asp:Content>
