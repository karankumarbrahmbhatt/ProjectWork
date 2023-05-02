package com.example.dhura_mistry_project2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.FirebaseDatabase;

public class RegisterActivity extends AppCompatActivity {

    TextView mRegisterName,mRegisterEmail,mRegisterPassword;
    Button mBtnCreateAccount;
    FirebaseAuth auth;
    FirebaseDatabase database;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        auth = FirebaseAuth.getInstance();
        database = FirebaseDatabase.getInstance();
        mRegisterName = findViewById(R.id.mRegisterName);
        mRegisterEmail = findViewById(R.id.mRegisterEmail);
        mRegisterPassword = findViewById(R.id.mRegisterPassword);
        mBtnCreateAccount = findViewById(R.id.mBtnCreateAccount);

        mBtnCreateAccount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                createUser();

            }
        });
    }

    private void createUser() {

        String username = mRegisterName.getText().toString();
        String userEmail = mRegisterEmail.getText().toString();
        String userPassword = mRegisterPassword.getText().toString();

        if(TextUtils.isEmpty(username)){
            Toast.makeText(this, "Name is Empty!", Toast.LENGTH_SHORT).show();
            return;
        }

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

        //Create User
        auth.createUserWithEmailAndPassword(userEmail,userPassword).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                if(task.isSuccessful()){

                    UserModel userModel = new UserModel(username,userEmail,userPassword);
                    String id = task.getResult().getUser().getUid();
                    database.getReference().child("Users").child(id).setValue(userModel);

                    Toast.makeText(RegisterActivity.this,"Registration Succesful!",Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(RegisterActivity.this,LoginActivity.class);
                    startActivity(intent);
                }
                else{
                    Toast.makeText(RegisterActivity.this,"Error"+task.getException(),Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
}