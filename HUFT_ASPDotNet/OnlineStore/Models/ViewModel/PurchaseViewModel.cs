using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using OnlineStore.Models.Database;
using Microsoft.AspNetCore.Mvc.Rendering;


namespace OnlineStore.Models.ViewModel
{
    public class PurchaseViewModel
    {
        public List<ShoppingCart> Cart { get; set; }

       
        public string Name { get; set; }
        [Required]
        public string Surname{ get; set; }
        public decimal TotalCost { get; set; }
        [Required]
        public string City { get; set; }
        [Required]
        public string Street { get; set; }
        [Required]
        public string House { get; set; }
        [Required]
        public string Apartment { get; set; }
       
       

    }
}
