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
            var menShoes = new Category() { Id = 1, Name = "Men's Shoes" };
            var womenShoes = new Category() { Id = 2, Name = "Women's Shoes" };
            var kidsShoes = new Category() { Id = 3, Name = "Kid's Shoes" };

            //CREATE IMAGES
            var mensShoes1 = new Image() { Id = 1, Path = "mensShoes1.jpeg" };
            var mensShoes2 = new Image() { Id = 2, Path = "mensShoes2.jpg" };
            var womensShoes1 = new Image() { Id = 3, Path = "womensShoes1.jpg" };
            var kidsShoes1 = new Image() { Id = 4, Path = "kidsShoes1.jpg" };
            var kidsShoes2 = new Image() { Id = 5, Path = "kidsShoes2.jpg" };

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
                Name = "Harsh",
                Surname = "Patel",
                Email = "harsh@gmail.com",
                PasswordHash = PasswordConverter.Hash("12345"),
                RoleId = 1,
                Address = ""
            };


            //CREATE PRODUCTS
            var product1 = new Product()
            {
                Id = 1,
                CreatorUserId = 3,
                CategoryId = 1,
                Producer = "Nike",
                Model = "Air Max 270",
                Price = 150.0M,
                Description = "Men's running shoes with a modern design.",
                ImageId = 1,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product2 = new Product()
            {
                Id = 2,
                CreatorUserId = 3,
                CategoryId = 1,
                Producer = "Adidas",
                Model = "Ultraboost 21",
                Price = 180.00M,
                Description = "Men's running shoes with responsive cushioning and a comfortable fit.",
                ImageId = 2,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product3 = new Product()
            {
                Id = 3,
                CreatorUserId = 3,
                CategoryId = 2,
                Producer = "Steve Madden",
                Model = "Carrson",
                Price = 80.00M,
                Description = "Women's dress sandals with a simple yet elegant design.",
                ImageId = 3,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product4 = new Product()
            {
                Id = 4,
                CreatorUserId = 3,
                CategoryId = 2,
                Producer = "Nine West",
                Model = "Flax",
                Price = 60.00M,
                Description = "Women's classic high heels with a pointed toe.",
                ImageId = 4,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };
            var product5 = new Product()
            {
                Id = 5,
                CreatorUserId = 3,
                CategoryId = 3,
                Producer = "Stride Rite",
                Model = "Made 2 Play Phibian Sneaker Sandal",
                Price = 35.00M,
                Description = "Kid's sneaker sandals that are perfect for playtime.",
                ImageId = 5,
                CreationTime = DateTime.Now,
                CommentsEnabled = true
            };

            builder.Entity<UserRole>().HasData(adminRole, moderRole, simpleRole);
            builder.Entity<Image>().HasData(mensShoes1, mensShoes2, womensShoes1, kidsShoes1, kidsShoes2);
            builder.Entity<Category>().HasData(menShoes, womenShoes, kidsShoes);
            builder.Entity<User>().HasData(user1, user2, user3);
            builder.Entity<Product>().HasData(product1, product2, product3, product4, product5);

        }
    }

}
