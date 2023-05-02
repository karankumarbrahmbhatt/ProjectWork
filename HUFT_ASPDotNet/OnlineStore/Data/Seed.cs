using System;
using OnlineStore.Models.Database;
using OnlineStore.Services;
using Microsoft.EntityFrameworkCore;

namespace OnlineStore.Data
{
    public class Seed
    {
        public void SeedData(ModelBuilder builder)
        {
            //CREATE USER ROLES
            var simpleRole = new UserRole() { Id = 1, Name = "SimpleUser" };
            var adminRole = new UserRole() { Id = 2, Name = "Administrator" };
            var moderRole = new UserRole() { Id = 3, Name = "Moderator" };

            //CREATE CATEGORIES
            var hoodie = new Category() { Id = 1, Name = "hoodie" };
            var sweater = new Category() { Id = 2, Name = "sweater" };
            var boots = new Category() { Id = 3, Name = "boots" };
            var suit = new Category() { Id = 4, Name = "suit" };
            var socks = new Category() { Id = 5, Name = "socks" };
            var parka = new Category() { Id = 6, Name = "parka" };


            //CREATE IMAGES
            var hoodie1 = new Image() { Id = 1, Path = "hoodie1.jpg" };
            var sweater1 = new Image() { Id = 2, Path = "sweater1.jpg" };
            var boots1 = new Image() { Id = 3, Path = "boots1.jpg" };
            var suit1 = new Image() { Id = 4, Path = "suit1.jpg" };
            var socks1 = new Image() { Id = 5, Path = "socks1.jpg" };
            var parka1 = new Category() { Id = 6, Name = "parka1.jpg" };

            // CREATE USERS
            // password for the user = admin
            // role - administrator
            var user1 = new User()
            {
                Id = 1,
                CreationTime = DateTime.Now,
                Name = "admin",
                Surname = "admin",
                Email = "admin@gmail.com",
                PasswordHash = PasswordConverter.Hash("admin"),
                RoleId = 2,
                Address = "Toronto Office"
            };

            // password for the user = Moderator
            // role - moderator
            var user2 = new User()
            {
                Id = 2,
                CreationTime = DateTime.Now,
                Name = "moderator",
                Surname = "moderator",
                Email = "moderator@gmail.com",
                PasswordHash = PasswordConverter.Hash("moderator"),
                RoleId = 3,
                Address = ""
            };

            // password for the user = User123
            // role - simple user
            var user3 = new User()
            {
                Id = 3,
                CreationTime = DateTime.Now,
                Name = "Diya",
                Surname = "Brahmbhatt",
                Email = "diya@gmail.com",
                PasswordHash = PasswordConverter.Hash("12345"),
                RoleId = 1,
                Address = ""
            };


            //CREATE PRODUCTS
            var product1 = new Product()
            {
                Id = 1,
                CreatorUserId = 1,
                CategoryId = 1,
                Producer = "HUFT",
                Model = "Cotton Hoodie",
                Price = 79.0M,
                Description = "Hoodie Description",
                ImageId = 1,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product2 = new Product()
            {
                Id = 2,
                CreatorUserId = 2,
                CategoryId = 2,
                Producer = "HUFT",
                Model = "Woolen Sweater",
                Price = 79.00M,
                Description = "Sweater Description.",
                ImageId = 2,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product3 = new Product()
            {
                Id = 3,
                CreatorUserId = 1,
                CategoryId = 3,
                Producer = "HUFT",
                Model = "Soft Shield Boots",
                Price = 79.00M,
                Description = "Boots Description.",
                ImageId = 3,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product4 = new Product()
            {
                Id = 4,
                CreatorUserId = 1,
                CategoryId = 4,
                Producer = "HUFT",
                Model = "Thermal Suit",
                Price = 79.00M,
                Description = "Suit Description.",
                ImageId = 4,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product5 = new Product()
            {
                Id = 5,
                CreatorUserId = 1,
                CategoryId = 5,
                Producer = "HUFT",
                Model = "Woolen Socks",
                Price = 79.00M,
                Description = "Socks Description",
                ImageId = 5,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };

            var product6 = new Product()
            {
                Id = 6,
                CreatorUserId = 1,
                CategoryId = 6,
                Producer = "HUFT",
                Model = "Thermal Parka",
                Price = 79.00M,
                Description = "Parka Description",
                ImageId = 6,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };

            builder.Entity<UserRole>().HasData(adminRole, moderRole, simpleRole);
            builder.Entity<Image>().HasData(hoodie1, sweater1, boots1, suit1, socks1, parka1);
            builder.Entity<Category>().HasData(hoodie, sweater, boots, suit, socks, parka);
            builder.Entity<User>().HasData(user1, user2, user3);
            builder.Entity<Product>().HasData(product1, product2, product3, product4, product5, product6);

        }
    }

}
