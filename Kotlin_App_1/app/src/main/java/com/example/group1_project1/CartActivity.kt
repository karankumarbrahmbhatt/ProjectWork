package com.example.group1_project1

import android.content.ContentValues.TAG
import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.ImageButton
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*


class CartActivity : AppCompatActivity() {

    private lateinit var dbref: DatabaseReference
    var auth: FirebaseAuth? = null
    private lateinit var userRecyclerView: RecyclerView
    private lateinit var CartArrList: ArrayList<CartItems>
    private lateinit var btnHome: ImageButton
    private lateinit var overTotalAmount: TextView
    private lateinit var btnCartCheckout: Button


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_cart)

        auth = FirebaseAuth.getInstance()

        userRecyclerView = findViewById(R.id.CartList)
        userRecyclerView.setHasFixedSize(true)
        val layoutManager = LinearLayoutManager(this)
        userRecyclerView.setLayoutManager(layoutManager)

        overTotalAmount = findViewById(R.id.cartTotal)
        btnHome = findViewById(R.id.btnDetailHome)
        btnCartCheckout = findViewById(R.id.btnCartCheckout)

        CartArrList = arrayListOf<CartItems>()
        getProductData()

        val TotalAmount = intent.getStringExtra("totalAmount")
        overTotalAmount.setText("Your total: $"+ "7200");

        btnHome.setOnClickListener {
            val intent = Intent(this@CartActivity, ProductActivity::class.java)
            startActivity(intent)
        }

        btnCartCheckout.setOnClickListener(View.OnClickListener {
            val intent = Intent(this@CartActivity, CheckoutActivity::class.java)
            startActivity(intent)
        })
    }

    private fun getProductData(){

        dbref = FirebaseDatabase.getInstance().getReference("Cart").child(auth!!.currentUser!!.uid)

        dbref.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(snapshot: DataSnapshot) {

                if(snapshot.exists()){
                    for(productsSnapshot in snapshot.children){
                        val cart = productsSnapshot.getValue(CartItems::class.java)
                        CartArrList.add(cart!!)
                    }

                    Log.i(TAG, "onDataChange: "+CartArrList);
                    var adapter = CartAdapter(CartArrList)
                    userRecyclerView.adapter = adapter
                }
            }

            override fun onCancelled(error: DatabaseError) {
                TODO("Not yet implemented")
            }

        })

    }

}