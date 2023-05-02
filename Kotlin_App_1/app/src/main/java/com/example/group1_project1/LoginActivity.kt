package com.example.group1_project1

import android.content.Intent
import android.os.Bundle
import android.text.TextUtils
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.google.firebase.auth.FirebaseAuth

class LoginActivity : AppCompatActivity() {

    var mEmail: EditText? = null
    var mPassword:EditText? = null
    var btnSignIn: Button? = null
    var btnSignOut:android.widget.Button? = null
    var btnSignUp:android.widget.Button? = null
    var auth: FirebaseAuth? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        auth = FirebaseAuth.getInstance()

        //declare buttons and textfields

        //declare buttons and textfields
        mEmail = findViewById<View>(R.id.mLoginEmail) as EditText
        mPassword = findViewById<View>(R.id.mLoginPassword) as EditText
        btnSignIn = findViewById<View>(R.id.btnSignIn) as Button
        btnSignUp = findViewById<View>(R.id.btnSignUp) as Button

        btnSignIn!!.setOnClickListener { loginUser() }


        btnSignUp!!.setOnClickListener {
            val intent = Intent(this@LoginActivity, RegisterActivity::class.java)
            startActivity(intent)
        }
    }

    private fun loginUser() {
        val userEmail = mEmail!!.text.toString()
        val userPassword = mPassword!!.text.toString()
        val i = Intent(this@LoginActivity, CheckoutActivity::class.java)
        i.putExtra(userEmail, "Email")
        if (TextUtils.isEmpty(userEmail)) {
            Toast.makeText(this, "Email is Empty!", Toast.LENGTH_SHORT).show()
            return
        }
        if (TextUtils.isEmpty(userPassword)) {
            Toast.makeText(this, "Password is Empty!", Toast.LENGTH_SHORT).show()
            return
        }

        //Login User
        auth!!.signInWithEmailAndPassword(userEmail, userPassword).addOnCompleteListener { task ->
            if (task.isSuccessful) {
//                    Toast.makeText(LoginActivity.this,"Login succesful",Toast.LENGTH_SHORT).show();
                val intent = Intent(this@LoginActivity, ProductActivity::class.java)
                startActivity(intent)
            } else {
                Toast.makeText(this@LoginActivity, "Error" + task.exception, Toast.LENGTH_SHORT)
                    .show()
            }
        }
    }
}