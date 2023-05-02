using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace OnlineStore.Migrations
{
    public partial class init : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Categories",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Name = table.Column<string>(maxLength: 32, nullable: true),
                    Description = table.Column<string>(maxLength: 128, nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Categories", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Images",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Path = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Images", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "UserRoles",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Name = table.Column<string>(maxLength: 32, nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_UserRoles", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Users",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Name = table.Column<string>(maxLength: 32, nullable: true),
                    Surname = table.Column<string>(maxLength: 32, nullable: true),
                    Email = table.Column<string>(maxLength: 128, nullable: true),
                    PasswordHash = table.Column<string>(maxLength: 64, nullable: true),
                    Address = table.Column<string>(maxLength: 256, nullable: true),
                    AuthValue = table.Column<string>(maxLength: 64, nullable: true),
                    CreationTime = table.Column<DateTime>(nullable: false),
                    LastLogin = table.Column<DateTime>(nullable: false),
                    RoleId = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Users", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Users_UserRoles_RoleId",
                        column: x => x.RoleId,
                        principalTable: "UserRoles",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Products",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Producer = table.Column<string>(maxLength: 64, nullable: true),
                    Model = table.Column<string>(maxLength: 64, nullable: true),
                    Price = table.Column<decimal>(type: "decimal(7,2)", nullable: false),
                    Description = table.Column<string>(type: "ntext", nullable: true),
                    CreationTime = table.Column<DateTime>(nullable: false),
                    CommentsEnabled = table.Column<bool>(nullable: true, defaultValue: true),
                    CategoryId = table.Column<int>(nullable: false),
                    CreatorUserId = table.Column<int>(nullable: false),
                    ImageId = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Products", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Products_Categories_CategoryId",
                        column: x => x.CategoryId,
                        principalTable: "Categories",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_Products_Users_CreatorUserId",
                        column: x => x.CreatorUserId,
                        principalTable: "Users",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_Products_Images_ImageId",
                        column: x => x.ImageId,
                        principalTable: "Images",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Purchases",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Address = table.Column<string>(maxLength: 128, nullable: true),
                    FullPrice = table.Column<decimal>(type: "decimal(8, 2)", nullable: false),
                    CreationTime = table.Column<DateTime>(nullable: false),
                    UserId = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Purchases", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Purchases_Users_UserId",
                        column: x => x.UserId,
                        principalTable: "Users",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Comments",
                columns: table => new
                {
                    UserId = table.Column<int>(nullable: false),
                    ProductId = table.Column<int>(nullable: false),
                    Text = table.Column<string>(type: "ntext", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Comments", x => new { x.ProductId, x.UserId });
                    table.ForeignKey(
                        name: "FK_Comments_Products_ProductId",
                        column: x => x.ProductId,
                        principalTable: "Products",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_Comments_Users_UserId",
                        column: x => x.UserId,
                        principalTable: "Users",
                        principalColumn: "Id");
                });

            migrationBuilder.CreateTable(
                name: "Rates",
                columns: table => new
                {
                    UserId = table.Column<int>(nullable: false),
                    ProductId = table.Column<int>(nullable: false),
                    Score = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Rates", x => new { x.ProductId, x.UserId });
                    table.ForeignKey(
                        name: "FK_Rates_Products_ProductId",
                        column: x => x.ProductId,
                        principalTable: "Products",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_Rates_Users_UserId",
                        column: x => x.UserId,
                        principalTable: "Users",
                        principalColumn: "Id");
                });

            migrationBuilder.CreateTable(
                name: "ShoppingCarts",
                columns: table => new
                {
                    UserId = table.Column<int>(nullable: false),
                    ProductId = table.Column<int>(nullable: false),
                    Count = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_ShoppingCarts", x => new { x.UserId, x.ProductId });
                    table.ForeignKey(
                        name: "FK_ShoppingCarts_Products_ProductId",
                        column: x => x.ProductId,
                        principalTable: "Products",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_ShoppingCarts_Users_UserId",
                        column: x => x.UserId,
                        principalTable: "Users",
                        principalColumn: "Id");
                });

            migrationBuilder.CreateTable(
                name: "PurchaseProducts",
                columns: table => new
                {
                    PurchaseId = table.Column<int>(nullable: false),
                    ProductId = table.Column<int>(nullable: false),
                    Count = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_PurchaseProducts", x => new { x.PurchaseId, x.ProductId });
                    table.ForeignKey(
                        name: "FK_PurchaseProducts_Products_ProductId",
                        column: x => x.ProductId,
                        principalTable: "Products",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_PurchaseProducts_Purchases_PurchaseId",
                        column: x => x.PurchaseId,
                        principalTable: "Purchases",
                        principalColumn: "Id");
                });

            migrationBuilder.InsertData(
                table: "Categories",
                columns: new[] { "Id", "Description", "Name" },
                values: new object[,]
                {
                    { 1, null, "hoodie" },
                    { 2, null, "sweater" },
                    { 3, null, "boots" },
                    { 4, null, "suit" },
                    { 5, null, "socks" },
                    { 6, null, "parka" }
                });

            migrationBuilder.InsertData(
                table: "Images",
                columns: new[] { "Id", "Path" },
                values: new object[,]
                {
                    { 1, "hoodie1.jpg" },
                    { 2, "sweater1.jpg" },
                    { 3, "boots1.jpg" },
                    { 4, "suit1.jpg" },
                    { 5, "socks1.jpg" },
                    { 6, null }
                });

            migrationBuilder.InsertData(
                table: "UserRoles",
                columns: new[] { "Id", "Name" },
                values: new object[,]
                {
                    { 2, "Administrator" },
                    { 3, "Moderator" },
                    { 1, "SimpleUser" }
                });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Address", "AuthValue", "CreationTime", "Email", "LastLogin", "Name", "PasswordHash", "RoleId", "Surname" },
                values: new object[] { 1, "Toronto Office", null, new DateTime(2023, 4, 20, 16, 25, 56, 528, DateTimeKind.Local).AddTicks(2098), "admin@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "admin", "!#/)zW��C�JJ��", 2, "admin" });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Address", "AuthValue", "CreationTime", "Email", "LastLogin", "Name", "PasswordHash", "RoleId", "Surname" },
                values: new object[] { 2, "", null, new DateTime(2023, 4, 20, 16, 25, 56, 534, DateTimeKind.Local).AddTicks(6865), "moderator@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "moderator", "�ɗ�	�;�:KǷ0", 3, "moderator" });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Address", "AuthValue", "CreationTime", "Email", "LastLogin", "Name", "PasswordHash", "RoleId", "Surname" },
                values: new object[] { 3, "", null, new DateTime(2023, 4, 20, 16, 25, 56, 534, DateTimeKind.Local).AddTicks(7375), "diya@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "Diya", "�|��plL4�h��N{", 1, "Brahmbhatt" });

            migrationBuilder.InsertData(
                table: "Products",
                columns: new[] { "Id", "CategoryId", "CommentsEnabled", "CreationTime", "CreatorUserId", "Description", "ImageId", "Model", "Price", "Producer" },
                values: new object[,]
                {
                    { 1, 1, true, new DateTime(2023, 4, 20, 16, 25, 56, 534, DateTimeKind.Local).AddTicks(9569), 1, "Hoodie Description", 1, "Cotton Hoodie", 79.0m, "HUFT" },
                    { 3, 3, true, new DateTime(2023, 4, 20, 16, 25, 56, 535, DateTimeKind.Local).AddTicks(207), 1, "Boots Description.", 3, "Soft Shield Boots", 79.00m, "HUFT" },
                    { 4, 4, true, new DateTime(2023, 4, 20, 16, 25, 56, 535, DateTimeKind.Local).AddTicks(210), 1, "Suit Description.", 4, "Thermal Suit", 79.00m, "HUFT" },
                    { 5, 5, true, new DateTime(2023, 4, 20, 16, 25, 56, 535, DateTimeKind.Local).AddTicks(214), 1, "Socks Description", 5, "Woolen Socks", 79.00m, "HUFT" },
                    { 6, 6, true, new DateTime(2023, 4, 20, 16, 25, 56, 535, DateTimeKind.Local).AddTicks(218), 1, "Parka Description", 6, "Thermal Parka", 79.00m, "HUFT" },
                    { 2, 2, true, new DateTime(2023, 4, 20, 16, 25, 56, 535, DateTimeKind.Local).AddTicks(178), 2, "Sweater Description.", 2, "Woolen Sweater", 79.00m, "HUFT" }
                });

            migrationBuilder.CreateIndex(
                name: "IX_Comments_UserId",
                table: "Comments",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_Products_CategoryId",
                table: "Products",
                column: "CategoryId");

            migrationBuilder.CreateIndex(
                name: "IX_Products_CreatorUserId",
                table: "Products",
                column: "CreatorUserId");

            migrationBuilder.CreateIndex(
                name: "IX_Products_ImageId",
                table: "Products",
                column: "ImageId");

            migrationBuilder.CreateIndex(
                name: "IX_PurchaseProducts_ProductId",
                table: "PurchaseProducts",
                column: "ProductId");

            migrationBuilder.CreateIndex(
                name: "IX_Purchases_UserId",
                table: "Purchases",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_Rates_UserId",
                table: "Rates",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_ShoppingCarts_ProductId",
                table: "ShoppingCarts",
                column: "ProductId");

            migrationBuilder.CreateIndex(
                name: "IX_Users_RoleId",
                table: "Users",
                column: "RoleId");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Comments");

            migrationBuilder.DropTable(
                name: "PurchaseProducts");

            migrationBuilder.DropTable(
                name: "Rates");

            migrationBuilder.DropTable(
                name: "ShoppingCarts");

            migrationBuilder.DropTable(
                name: "Purchases");

            migrationBuilder.DropTable(
                name: "Products");

            migrationBuilder.DropTable(
                name: "Categories");

            migrationBuilder.DropTable(
                name: "Users");

            migrationBuilder.DropTable(
                name: "Images");

            migrationBuilder.DropTable(
                name: "UserRoles");
        }
    }
}
