// Group3
// harsh patel - 8806124
// mihir sata - 8771700
// deep pomal - 8783268
// rahi patel - 8776174

using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.IO;
using Microsoft.AspNetCore.Mvc;
using OnlineStore.Data;

namespace OnlineStore.Controllers
{
    public class ImageController : Controller
    {
        UnitOfWork unit = new UnitOfWork();
        
        [Route("image/{name}")]
        public IActionResult Get(string name)
        {
            var image = unit.ImageRepository.Get(x => x.Path == name).FirstOrDefault();
            if(image != null)
            {
                var fullpath = Path.Combine(Directory.GetCurrentDirectory(), "StaticFiles", image.Path);
                
                FileStream img = System.IO.File.OpenRead(fullpath);
                
                return File(img, "image/*");
            }
            return View();
        }
    }
}