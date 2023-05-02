package com.example.group1_project1

import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.google.android.gms.tasks.OnCompleteListener

class CheckoutActivity : AppCompatActivity() {

    lateinit var btnPurchase: Button
    var usermail: String? = null
    var firstName: TextView? = null
    var lastName:TextView? = null
    var Address:TextView? = null
    var City:TextView? = null
    var Province:TextView? = null
    var PostalCode:TextView? = null
    var TotalAmount: String? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_checkout)


        firstName = findViewById(R.id.firstName)
        lastName = findViewById(R.id.lastName)
        Address = findViewById(R.id.Address)
        City = findViewById(R.id.City)
        Province = findViewById(R.id.Province)
        PostalCode = findViewById(R.id.PostalCode)

        btnPurchase = findViewById(R.id.btnPurchase)

        btnPurchase.setOnClickListener(View.OnClickListener { orderplaced() })

    }

    private fun orderplaced() {
//        val OrderDetails = HashMap<String, Any>()
//        OrderDetails["firstName"] = firstName!!.text.toString()
//        OrderDetails["lastName"] = lastName!!.text.toString()
//        OrderDetails["Address"] = Address!!.text.toString()
//        OrderDetails["City"] = City!!.text.toString()
//        OrderDetails["Province"] = Province!!.text.toString()
//        OrderDetails["PostalCode"] = PostalCode!!.text.toString()
//        OrderDetails["TotalAmount"] = TotalAmount!!
//        db.collection("OrderPlaced").document(auth.getCurrentUser().getUid())
//            .collection("CurrentUser").add(OrderDetails).addOnCompleteListener(
//                OnCompleteListener<Any?> {
                    val intent = Intent(this@CheckoutActivity, PurchaseActivity::class.java)
                    startActivity(intent)
//                })
    }
}