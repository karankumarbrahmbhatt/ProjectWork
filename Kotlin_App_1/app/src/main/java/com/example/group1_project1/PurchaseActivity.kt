package com.example.group1_project1

import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.ImageView
import androidx.appcompat.app.AppCompatActivity

class PurchaseActivity : AppCompatActivity() {

    lateinit var btnDetailHome: ImageView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_purchase)

        btnDetailHome = findViewById<ImageView>(R.id.btnDetailHome)

        btnDetailHome.setOnClickListener(View.OnClickListener {
            val intent = Intent(this@PurchaseActivity, ProductActivity::class.java)
            startActivity(intent)
        })
    }
}