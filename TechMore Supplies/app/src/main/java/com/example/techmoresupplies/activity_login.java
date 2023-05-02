package com.example.techmoresupplies;


import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;


public class activity_login extends AppCompatActivity {

    private FirebaseAuth mAuth;
    private Button btn_login;
    private EditText txt_email, txt_password;
    private TextView txt_signup, forgotPassword;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        mAuth = FirebaseAuth.getInstance();

        if (Helper.GetData(activity_login.this, "user_id") != null) {
            SendUserToMainActivity();
        }
        btn_login = (Button) findViewById(R.id.btn_signin);
        txt_email = (EditText) findViewById(R.id.txt_email);
        txt_password = (EditText) findViewById(R.id.txt_password);
        txt_signup = (TextView) findViewById(R.id.txt_signup);
        forgotPassword = (TextView) findViewById(R.id.txt_forgotpassword);

        forgotPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent forgotPasswordIntent = new Intent(activity_login.this, activity_forgot_password.class);
                startActivity(forgotPasswordIntent);
            }
        });

        txt_signup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent registerIntent = new Intent(activity_login.this, activity_signup.class);
                startActivity(registerIntent);
            }
        });

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = txt_email.getText().toString();
                String password = txt_password.getText().toString();
                if (TextUtils.isEmpty(email)) {
                    Toast.makeText(activity_login.this, "Please enter email", Toast.LENGTH_SHORT).show();
                }
                if (TextUtils.isEmpty(password)) {
                    Toast.makeText(activity_login.this, "Please enter password", Toast.LENGTH_SHORT).show();
                } else {
                    Helper.showLoader(activity_login.this, "Please wait . . .");
                    mAuth.signInWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {
                            if (task.isSuccessful()) {

                                SendUserToMainActivity();
                                Helper.PutData(activity_login.this, "user_id", mAuth.getUid());
                                Toast.makeText(activity_login.this, "Logged in Successful...", Toast.LENGTH_SHORT).show();

                            } else {
                                Helper.stopLoader();
                                String message = task.getException().toString();
                                Toast.makeText(activity_login.this, "Error : Authentication Issue" + message, Toast.LENGTH_SHORT).show();
                            }
                        }
                    });
                }

            }
        });


    }


    protected void onStart() {
        super.onStart();
    }


    private void SendUserToMainActivity() {
        Intent mainIntent = new Intent(activity_login.this, MainActivity.class);
        mainIntent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
        startActivity(mainIntent);
        finish();
    }
}