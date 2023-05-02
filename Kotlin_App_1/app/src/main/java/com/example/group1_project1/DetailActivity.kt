package com.example.group1_project1


import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.bumptech.glide.Glide
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.firestore.FirebaseFirestore
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference
import java.lang.Integer.parseInt


class DetailActivity : AppCompatActivity() {

    var auth: FirebaseAuth? = null
    var totalQuantity: Int = 0
    var totalPrice: Int = 0

    var Name: String = ""
    var Price: String = ""
    var Image: String = ""
    var Desc: String = ""
    private lateinit var database: DatabaseReference


    override fun onCreate(savedInstanceState: Bundle?) {
        
        auth = FirebaseAuth.getInstance();

        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail)

        val itemName: TextView = findViewById(R.id.nameDetailo);
        val itemPrice: TextView = findViewById(R.id.priceDetail);
        val itemImage : ImageView = findViewById(R.id.imageDetail);
        val itemDesc : TextView =  findViewById(R.id.itemDescription);
        val btnCheckout : Button = findViewById(R.id.btnCheckout);
        val btnAddToCart : Button = findViewById(R.id.btnDetailAddToCart);
        val btnDetailCart: ImageView = findViewById<ImageView>(R.id.btnDetailCart)
        val btnDetailHome: ImageView = findViewById<ImageView>(R.id.btnDetailHome)
        val btnDetailAddToCart : Button = findViewById<Button>(R.id.btnDetailAddToCart)
        val quantity: TextView = findViewById<TextView>(R.id.Quantity)
        val addItem: ImageView = findViewById<ImageView>(R.id.addItem)
        val removeItem :ImageView = findViewById<ImageView>(R.id.removeItem)


        val bundle : Bundle?= intent.extras
        Name = bundle!!.getString("name").toString()
        Price = bundle.getString("price").toString()
        Desc = bundle.getString("desc").toString()
        Image = bundle.getString("image").toString()
        totalQuantity = 1;


        itemName.text = Name;
        itemDesc.text = Desc;
        itemPrice.text = "$" + Price;
        val storRef: StorageReference = FirebaseStorage.getInstance().getReferenceFromUrl(Image.toString())
        Glide.with(itemImage.context).load(storRef).into(itemImage)
        totalPrice = parseInt(Price) * totalQuantity;

        btnDetailCart.setOnClickListener {
            val intent = Intent(this@DetailActivity, CartActivity::class.java)
            startActivity(intent)
        }

        btnDetailHome.setOnClickListener {
            val intent = Intent(this@DetailActivity, ProductActivity::class.java)
            startActivity(intent)
        }

        addItem.setOnClickListener {
            if (totalQuantity < 10) {
                totalQuantity++
                quantity.text = totalQuantity.toString()
                totalPrice = Price.toInt() * totalQuantity
            }
        }

        removeItem.setOnClickListener {
            if (totalQuantity < 10) {
                totalQuantity--
                quantity.text = totalQuantity.toString()
                totalPrice = Price.toInt() * totalQuantity
            }
        }

        btnCheckout.setOnClickListener {
            val intent = Intent(this@DetailActivity, CheckoutActivity::class.java);
            startActivity(intent)
        }

        btnAddToCart.setOnClickListener {
            addedToCart()
        }

    }

    private fun addedToCart() {
//        val cartMap: HashMap<String, Any> = HashMap()
//        cartMap["itemName"] = Name
//        cartMap["itemPrice"] = Price
//        cartMap["itemImage"] = Image
//        cartMap["quantity"] = totalQuantity
//        cartMap["totalPrice"] = totalPrice

        database = FirebaseDatabase.getInstance().getReference("Cart")
        val Cart = CartItems(Image,Name,Price,totalQuantity,totalPrice)
        database.child(auth!!.currentUser!!.uid).push().setValue(Cart).addOnSuccessListener {

            Toast.makeText(this@DetailActivity, "Added to a cart", Toast.LENGTH_SHORT).show()

        }.addOnFailureListener{
            Toast.makeText(this@DetailActivity, "Error could not add to a cart", Toast.LENGTH_SHORT).show()
        };


//        firestore!!.collection("AddToCart").document(auth!!.currentUser!!.uid)
//            .collection("CurrentUser").add(cartMap).addOnCompleteListener {
//                Toast.makeText(
//                    this@DetailActivity,
//                    "Added to a cart",
//                    Toast.LENGTH_SHORT
//                ).show()
//            }
    }


}