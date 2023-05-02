package com.example.techmoresupplies;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class activity_signup extends AppCompatActivity {

    private Button CreateAccountButton;
    private EditText UserEmail, UserPassword, UserCPassword;
    private TextView AlreadyHaveAccountLink;
    private FirebaseAuth mAuth;
    private DatabaseReference RootRef;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        mAuth = FirebaseAuth.getInstance();
        RootRef = FirebaseDatabase.getInstance().getReference();

        CreateAccountButton = (Button) findViewById(R.id.btn_signup);
        UserEmail = (EditText) findViewById(R.id.txt_email);
        UserPassword = (EditText) findViewById(R.id.txt_password);
        UserCPassword = (EditText) findViewById(R.id.txt_cpassword);


        CreateAccountButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                CreateNewAccount();
            }
        });

    }


    private void CreateNewAccount() {
        String email = UserEmail.getText().toString();
        String password = UserPassword.getText().toString();
        String cpassword = UserCPassword.getText().toString();

        if (TextUtils.isEmpty(email)) {
            Toast.makeText(this, "Please enter Email", Toast.LENGTH_SHORT).show();
            ;
        }
        if (TextUtils.isEmpty(password)) {
            Toast.makeText(this, "Please Enter Password", Toast.LENGTH_SHORT).show();
        }
        if (!password.equals(cpassword)) {
            Toast.makeText(this, "Password and confirm password didn't match", Toast.LENGTH_SHORT).show();
        } else {
            Helper.showLoader(activity_signup.this, "Please wait . . .");
            mAuth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (task.isSuccessful()) {
                        Helper.stopLoader();
                        finish();
                        Toast.makeText(activity_signup.this, "Account Created Successfully...", Toast.LENGTH_SHORT).show();
                    } else {
                        Helper.stopLoader();
                        String message = task.getException().toString();
                        Toast.makeText(activity_signup.this, "Error : Authentication Issue" + message, Toast.LENGTH_SHORT).show();
                    }
                }
            });
        }
    }


}
