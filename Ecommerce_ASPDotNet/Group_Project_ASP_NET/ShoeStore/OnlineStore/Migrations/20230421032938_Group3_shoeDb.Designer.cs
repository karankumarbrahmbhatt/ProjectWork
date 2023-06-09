﻿// <auto-generated />
using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;
using OnlineStore.Data;

namespace OnlineStore.Migrations
{
    [DbContext(typeof(OnlineStoreDbContext))]
    [Migration("20230421032938_Group3_shoeDb")]
    partial class Group3_shoeDb
    {
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "3.1.0")
                .HasAnnotation("Relational:MaxIdentifierLength", 128)
                .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

            modelBuilder.Entity("OnlineStore.Models.Database.Category", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Description")
                        .HasColumnType("nvarchar(128)")
                        .HasMaxLength(128)
                        .IsUnicode(true);

                    b.Property<string>("Name")
                        .HasColumnType("nvarchar(32)")
                        .HasMaxLength(32)
                        .IsUnicode(true);

                    b.HasKey("Id");

                    b.ToTable("Categories");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            Name = "Men's Shoes"
                        },
                        new
                        {
                            Id = 2,
                            Name = "Women's Shoes"
                        },
                        new
                        {
                            Id = 3,
                            Name = "Kid's Shoes"
                        });
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Comment", b =>
                {
                    b.Property<int>("ProductId")
                        .HasColumnType("int");

                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.Property<string>("Text")
                        .HasColumnType("ntext");

                    b.HasKey("ProductId", "UserId");

                    b.HasIndex("UserId");

                    b.ToTable("Comments");
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Image", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Path")
                        .HasColumnType("nvarchar(max)");

                    b.HasKey("Id");

                    b.ToTable("Images");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            Path = "mensShoes1.jpeg"
                        },
                        new
                        {
                            Id = 2,
                            Path = "mensShoes2.jpg"
                        },
                        new
                        {
                            Id = 3,
                            Path = "womensShoes1.jpg"
                        },
                        new
                        {
                            Id = 4,
                            Path = "kidsShoes1.jpg"
                        },
                        new
                        {
                            Id = 5,
                            Path = "kidsShoes2.jpg"
                        });
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Product", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<int>("CategoryId")
                        .HasColumnType("int");

                    b.Property<bool?>("CommentsEnabled")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("bit")
                        .HasDefaultValue(true);

                    b.Property<DateTime>("CreationTime")
                        .HasColumnType("datetime2");

                    b.Property<int>("CreatorUserId")
                        .HasColumnType("int");

                    b.Property<string>("Description")
                        .HasColumnType("ntext")
                        .IsUnicode(true);

                    b.Property<int>("ImageId")
                        .HasColumnType("int");

                    b.Property<string>("Model")
                        .HasColumnType("nvarchar(64)")
                        .HasMaxLength(64);

                    b.Property<decimal>("Price")
                        .HasColumnType("decimal(7,2)");

                    b.Property<string>("Producer")
                        .HasColumnType("nvarchar(64)")
                        .HasMaxLength(64);

                    b.HasKey("Id");

                    b.HasIndex("CategoryId");

                    b.HasIndex("CreatorUserId");

                    b.HasIndex("ImageId");

                    b.ToTable("Products");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            CategoryId = 1,
                            CommentsEnabled = true,
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(5678),
                            CreatorUserId = 3,
                            Description = "Men's running shoes with a modern design.",
                            ImageId = 1,
                            Model = "Air Max 270",
                            Price = 150.0m,
                            Producer = "Nike"
                        },
                        new
                        {
                            Id = 2,
                            CategoryId = 1,
                            CommentsEnabled = true,
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6283),
                            CreatorUserId = 3,
                            Description = "Men's running shoes with responsive cushioning and a comfortable fit.",
                            ImageId = 2,
                            Model = "Ultraboost 21",
                            Price = 180.00m,
                            Producer = "Adidas"
                        },
                        new
                        {
                            Id = 3,
                            CategoryId = 2,
                            CommentsEnabled = true,
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6310),
                            CreatorUserId = 3,
                            Description = "Women's dress sandals with a simple yet elegant design.",
                            ImageId = 3,
                            Model = "Carrson",
                            Price = 80.00m,
                            Producer = "Steve Madden"
                        },
                        new
                        {
                            Id = 4,
                            CategoryId = 2,
                            CommentsEnabled = true,
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6315),
                            CreatorUserId = 3,
                            Description = "Women's classic high heels with a pointed toe.",
                            ImageId = 4,
                            Model = "Flax",
                            Price = 60.00m,
                            Producer = "Nine West"
                        },
                        new
                        {
                            Id = 5,
                            CategoryId = 3,
                            CommentsEnabled = true,
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(6320),
                            CreatorUserId = 3,
                            Description = "Kid's sneaker sandals that are perfect for playtime.",
                            ImageId = 5,
                            Model = "Made 2 Play Phibian Sneaker Sandal",
                            Price = 35.00m,
                            Producer = "Stride Rite"
                        });
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Purchase", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Address")
                        .HasColumnType("nvarchar(128)")
                        .HasMaxLength(128);

                    b.Property<DateTime>("CreationTime")
                        .HasColumnType("datetime2");

                    b.Property<decimal>("FullPrice")
                        .HasColumnType("decimal(8, 2)");

                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.HasKey("Id");

                    b.HasIndex("UserId");

                    b.ToTable("Purchases");
                });

            modelBuilder.Entity("OnlineStore.Models.Database.PurchaseProduct", b =>
                {
                    b.Property<int>("PurchaseId")
                        .HasColumnType("int");

                    b.Property<int>("ProductId")
                        .HasColumnType("int");

                    b.Property<int>("Count")
                        .HasColumnType("int");

                    b.HasKey("PurchaseId", "ProductId");

                    b.HasIndex("ProductId");

                    b.ToTable("PurchaseProducts");
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Rate", b =>
                {
                    b.Property<int>("ProductId")
                        .HasColumnType("int");

                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.Property<int>("Score")
                        .HasColumnType("int");

                    b.HasKey("ProductId", "UserId");

                    b.HasIndex("UserId");

                    b.ToTable("Rates");
                });

            modelBuilder.Entity("OnlineStore.Models.Database.ShoppingCart", b =>
                {
                    b.Property<int>("UserId")
                        .HasColumnType("int");

                    b.Property<int>("ProductId")
                        .HasColumnType("int");

                    b.Property<int>("Count")
                        .HasColumnType("int");

                    b.HasKey("UserId", "ProductId");

                    b.HasIndex("ProductId");

                    b.ToTable("ShoppingCarts");
                });

            modelBuilder.Entity("OnlineStore.Models.Database.User", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Address")
                        .HasColumnType("nvarchar(256)")
                        .HasMaxLength(256)
                        .IsUnicode(true);

                    b.Property<string>("AuthValue")
                        .HasColumnType("nvarchar(64)")
                        .HasMaxLength(64);

                    b.Property<DateTime>("CreationTime")
                        .HasColumnType("datetime2");

                    b.Property<string>("Email")
                        .HasColumnType("nvarchar(128)")
                        .HasMaxLength(128)
                        .IsUnicode(true);

                    b.Property<DateTime>("LastLogin")
                        .HasColumnType("datetime2");

                    b.Property<string>("Name")
                        .HasColumnType("nvarchar(32)")
                        .HasMaxLength(32);

                    b.Property<string>("PasswordHash")
                        .HasColumnType("nvarchar(64)")
                        .HasMaxLength(64);

                    b.Property<int>("RoleId")
                        .HasColumnType("int");

                    b.Property<string>("Surname")
                        .HasColumnType("nvarchar(32)")
                        .HasMaxLength(32);

                    b.HasKey("Id");

                    b.HasIndex("RoleId");

                    b.ToTable("Users");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            Address = "Toronto Office",
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 819, DateTimeKind.Local).AddTicks(6176),
                            Email = "admin@gmail.com",
                            LastLogin = new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified),
                            Name = "admin",
                            PasswordHash = "!#/)zW��C�JJ��",
                            RoleId = 2,
                            Surname = "admin"
                        },
                        new
                        {
                            Id = 2,
                            Address = "",
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(3046),
                            Email = "moderator@gmail.com",
                            LastLogin = new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified),
                            Name = "moderator",
                            PasswordHash = "�ɗ�	�;�:KǷ0",
                            RoleId = 3,
                            Surname = "moderator"
                        },
                        new
                        {
                            Id = 3,
                            Address = "",
                            CreationTime = new DateTime(2023, 4, 20, 23, 29, 37, 828, DateTimeKind.Local).AddTicks(3509),
                            Email = "harsh@gmail.com",
                            LastLogin = new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified),
                            Name = "Harsh",
                            PasswordHash = "�|��plL4�h��N{",
                            RoleId = 1,
                            Surname = "Patel"
                        });
                });

            modelBuilder.Entity("OnlineStore.Models.Database.UserRole", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int")
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Name")
                        .HasColumnType("nvarchar(32)")
                        .HasMaxLength(32);

                    b.HasKey("Id");

                    b.ToTable("UserRoles");

                    b.HasData(
                        new
                        {
                            Id = 2,
                            Name = "Administrator"
                        },
                        new
                        {
                            Id = 3,
                            Name = "Moderator"
                        },
                        new
                        {
                            Id = 1,
                            Name = "SimpleUser"
                        });
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Comment", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.Product", "Product")
                        .WithMany("Comments")
                        .HasForeignKey("ProductId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.User", "User")
                        .WithMany("Comments")
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.NoAction)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Product", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.Category", "Category")
                        .WithMany("Products")
                        .HasForeignKey("CategoryId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.User", "CreatorUser")
                        .WithMany("Products")
                        .HasForeignKey("CreatorUserId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.Image", "Image")
                        .WithMany("Products")
                        .HasForeignKey("ImageId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Purchase", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.User", "User")
                        .WithMany("Purchases")
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.PurchaseProduct", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.Product", "Product")
                        .WithMany("PurchaseProducts")
                        .HasForeignKey("ProductId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.Purchase", "Purchase")
                        .WithMany("PurchaseProducts")
                        .HasForeignKey("PurchaseId")
                        .OnDelete(DeleteBehavior.NoAction)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.Rate", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.Product", "Product")
                        .WithMany("Rates")
                        .HasForeignKey("ProductId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.User", "User")
                        .WithMany("Rates")
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.NoAction)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.ShoppingCart", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.Product", "Product")
                        .WithMany("ShoppingCarts")
                        .HasForeignKey("ProductId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("OnlineStore.Models.Database.User", "User")
                        .WithMany("ShoppingCart")
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.NoAction)
                        .IsRequired();
                });

            modelBuilder.Entity("OnlineStore.Models.Database.User", b =>
                {
                    b.HasOne("OnlineStore.Models.Database.UserRole", "Role")
                        .WithMany("Users")
                        .HasForeignKey("RoleId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();
                });
#pragma warning restore 612, 618
        }
    }
}
