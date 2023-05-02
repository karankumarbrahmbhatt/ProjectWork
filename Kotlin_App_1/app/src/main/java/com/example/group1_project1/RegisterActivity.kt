package com.example.group1_project1

import android.content.Intent
import android.os.Bundle
import android.text.TextUtils
import android.view.View
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.FirebaseDatabase

class RegisterActivity : AppCompatActivity() {
    var mRegisterName: TextView? = null
    var mRegisterEmail:TextView? = null
    var mRegisterPassword:TextView? = null
    lateinit var mBtnCreateAccount: Button
    var auth: FirebaseAuth? = null
    var database: FirebaseDatabase? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        auth = FirebaseAuth.getInstance()
        database = FirebaseDatabase.getInstance()
        mRegisterName = findViewById(R.id.mRegisterName)
        mRegisterEmail = findViewById(R.id.mRegisterEmail)
        mRegisterPassword = findViewById(R.id.mRegisterPassword)
        mBtnCreateAccount = findViewById(R.id.mBtnCreateAccount)

        mBtnCreateAccount.setOnClickListener(View.OnClickListener { createUser() })
    }

    private fun createUser() {
        val username = mRegisterName!!.text.toString()
        val userEmail = mRegisterEmail!!.text.toString()
        val userPassword = mRegisterPassword!!.text.toString()
        if (TextUtils.isEmpty(username)) {
            Toast.makeText(this, "Name is Empty!", Toast.LENGTH_SHORT).show()
            return
        }
        if (TextUtils.isEmpty(userEmail)) {
            Toast.makeText(this, "Email is Empty!", Toast.LENGTH_SHORT).show()
            return
        }
        if (TextUtils.isEmpty(userPassword)) {
            Toast.makeText(this, "Password is Empty!", Toast.LENGTH_SHORT).show()
            return
        }
        if (userPassword.length < 6) {
            Toast.makeText(
                this,
                "Password Length must be greater than 6 letters",
                Toast.LENGTH_SHORT
            ).show()
        }

        //Create User
        auth!!.createUserWithEmailAndPassword(userEmail, userPassword)
            .addOnCompleteListener { task ->
                if (task.isSuccessful) {
                    val userModel = UserModel(username, userEmail, userPassword)
                    val id = task.result.user!!.uid
                    database!!.reference.child("Users").child(id).setValue(userModel)
                    Toast.makeText(
                        this@RegisterActivity,
                        "Registration Succesful!",
                        Toast.LENGTH_SHORT
                    )
                        .show()
                    val intent = Intent(this@RegisterActivity, LoginActivity::class.java)
                    startActivity(intent)
                } else {
                    Toast.makeText(
                        this@RegisterActivity,
                        "Error" + task.exception,
                        Toast.LENGTH_SHORT
                    )
                        .show()
                }
            }
    }

}