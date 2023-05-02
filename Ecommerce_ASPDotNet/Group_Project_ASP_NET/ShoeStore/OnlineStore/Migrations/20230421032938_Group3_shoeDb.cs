using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace OnlineStore.Migrations
{
    public partial class Group3_shoeDb : Migration
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
                    { 1, null, "Men's Shoes" },
                    { 2, null, "Women's Shoes" },
                    { 3, null, "Kid's Shoes" }
                });

            migrationBuilder.InsertData(
                table: "Images",
                columns: new[] { "Id", "Path" },
                values: new object[,]
                {
                    { 1, "mensShoes1.jpeg" },
                    { 2, "mensShoes2.jpg" },
                    { 3, "womensShoes1.jpg" },
                    { 4, "kidsShoes1.jpg" },
                    { 5, "kidsShoes2.jpg" }
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
                values: new object[] { 1, "Toronto Office", null, new DateTime(2023, 4, 20, 23, 29, 37, 819, DateTimeKind.Local).AddTicks(6176), "admin@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "admin", "!#/)zW��C�JJ��", 2, "admin" });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Address", "AuthValue", "CreationTime", "Email", "LastLogin", "Name", "PasswordHash", "RoleId", "Surname" },
                values: new object[] { 2, "", null, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(3046), "moderator@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "moderator", "�ɗ�	�;�:KǷ0", 3, "moderator" });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Address", "AuthValue", "CreationTime", "Email", "LastLogin", "Name", "PasswordHash", "RoleId", "Surname" },
                values: new object[] { 3, "", null, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(3509), "harsh@gmail.com", new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), "Harsh", "�|��plL4�h��N{", 1, "Patel" });

            migrationBuilder.InsertData(
                table: "Products",
                columns: new[] { "Id", "CategoryId", "CommentsEnabled", "CreationTime", "CreatorUserId", "Description", "ImageId", "Model", "Price", "Producer" },
                values: new object[,]
                {
                    { 1, 1, true, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(5678), 3, "Men's running shoes with a modern design.", 1, "Air Max 270", 150.0m, "Nike" },
                    { 2, 1, true, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6283), 3, "Men's running shoes with responsive cushioning and a comfortable fit.", 2, "Ultraboost 21", 180.00m, "Adidas" },
                    { 3, 2, true, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6310), 3, "Women's dress sandals with a simple yet elegant design.", 3, "Carrson", 80.00m, "Steve Madden" },
                    { 4, 2, true, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6315), 3, "Women's classic high heels with a pointed toe.", 4, "Flax", 60.00m, "Nine West" },
                    { 5, 3, true, new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6320), 3, "Kid's sneaker sandals that are perfect for playtime.", 5, "Made 2 Play Phibian Sneaker Sandal", 35.00m, "Stride Rite" }
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
