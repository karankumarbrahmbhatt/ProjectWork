package com.example.group1_project1

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import android.widget.Toast
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.firebase.database.*

class ProductActivity : AppCompatActivity() {

    private lateinit var dbref: DatabaseReference
    private lateinit var userRecyclerView: RecyclerView
    private lateinit var ProductArrList: ArrayList<Product>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_product)

        userRecyclerView = findViewById(R.id.ProductList)
        userRecyclerView.setHasFixedSize(true)
        val gridLayoutManager = GridLayoutManager(this, 2, GridLayoutManager.VERTICAL, false)
        userRecyclerView.setLayoutManager(gridLayoutManager)

        ProductArrList = arrayListOf<Product>()
        getProductData()

        val btnDetailCart: ImageView = findViewById<ImageView>(R.id.btnDetailCart)
        val btnDetailHome: ImageView = findViewById<ImageView>(R.id.btnDetailHome)

        btnDetailCart.setOnClickListener {
            val intent = Intent(this@ProductActivity, CartActivity::class.java)
            startActivity(intent)
        }

        btnDetailHome.setOnClickListener {
            val intent = Intent(this@ProductActivity, ProductActivity::class.java)
            startActivity(intent)
        }

    }

        private fun getProductData(){

            dbref = FirebaseDatabase.getInstance().getReference("Products")

            dbref.addValueEventListener(object : ValueEventListener{
                override fun onDataChange(snapshot: DataSnapshot) {

                    if(snapshot.exists()){
                        for(productsSnapshot in snapshot.children){
                            val product = productsSnapshot.getValue(Product::class.java)
                            ProductArrList.add(product!!)
                        }

                        var adapter = ProductAdapter(ProductArrList)
                        userRecyclerView.adapter = adapter
                        adapter.setOnItemClickListener(object : ProductAdapter.onItemClickListener{
                            override fun onItemClick(position: Int) {

                               // Toast.makeText(this@ProductActivity,"item position $position",Toast.LENGTH_SHORT).show();
                                val intent = Intent(this@ProductActivity,DetailActivity::class.java)
                                intent.putExtra("name",ProductArrList[position].itemName);
                                intent.putExtra("image",ProductArrList[position].itemImage);
                                intent.putExtra("desc",ProductArrList[position].itemDesc);
                                intent.putExtra("price",ProductArrList[position].itemPrice);
                                startActivity(intent);

                            }
                        })
                    }
                }

                override fun onCancelled(error: DatabaseError) {
                    TODO("Not yet implemented")
                }

            })

        }


}