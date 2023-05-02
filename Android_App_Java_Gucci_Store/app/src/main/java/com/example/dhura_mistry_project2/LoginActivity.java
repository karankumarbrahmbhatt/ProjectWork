package com.example.dhura_mistry_project2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class LoginActivity extends AppCompatActivity {

    private static final String TAG = "LoginActivity";


    EditText mEmail, mPassword;
    Button btnSignIn, btnSignOut, btnSignUp;
    FirebaseAuth auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        auth = FirebaseAuth.getInstance();

        //declare buttons and textfields
        mEmail = (EditText) findViewById(R.id.mLoginEmail);
        mPassword = (EditText) findViewById(R.id.mLoginPassword);
        btnSignIn = (Button) findViewById(R.id.btnSignIn);
        btnSignUp = (Button) findViewById(R.id.btnSignUp);

        btnSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               
                loginUser();
            }
        });


        btnSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(LoginActivity.this,RegisterActivity.class);
                startActivity(intent);
            }
        });

    }

    private void loginUser() {

        String userEmail = mEmail.getText().toString();
        String userPassword = mPassword.getText().toString();

        Intent i = new Intent(LoginActivity.this,CheckoutActivity.class);
        i.putExtra(userEmail,"Email");

        if(TextUtils.isEmpty(userEmail)){
            Toast.makeText(this, "Email is Empty!", Toast.LENGTH_SHORT).show();
            return;
        }

        if(TextUtils.isEmpty(userPassword)){
            Toast.makeText(this, "Password is Empty!", Toast.LENGTH_SHORT).show();
            return;
        }

        if(userPassword.length() < 6){
            Toast.makeText(this, "Password Length must be greater than 6 letters", Toast.LENGTH_SHORT).show();
        }

        //Login User
        auth.signInWithEmailAndPassword(userEmail,userPassword).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {

                if(task.isSuccessful()){
//                    Toast.makeText(LoginActivity.this,"Login succesful",Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(LoginActivity.this,ProductsActivity.class);
                    startActivity(intent);
                }
                else{
                    Toast.makeText(LoginActivity.this,"Error"+task.getException(),Toast.LENGTH_SHORT).show();
                }
            }
        });

    }


}