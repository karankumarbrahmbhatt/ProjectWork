package com.example.dhura_mistry_project2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.List;

public class CheckoutActivity extends AppCompatActivity {

    Button btnPurchase;
    List<UserModel> list;
    String usermail;
    TextView loginMail;
    TextView firstName,lastName,Address,City,Province,PostalCode;
    FirebaseFirestore firestore;
    FirebaseAuth auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_checkout);
//
        firestore = FirebaseFirestore.getInstance();
        auth = FirebaseAuth.getInstance();

        firstName = findViewById(R.id.firstName);
        lastName = findViewById(R.id.lastName);
        Address = findViewById(R.id.Address);
        City = findViewById(R.id.City);
        Province = findViewById(R.id.Province);
        PostalCode = findViewById(R.id.PostalCode);

        btnPurchase = findViewById(R.id.btnPurchase);
        loginMail = findViewById(R.id.loginMail);



        usermail = getIntent().getStringExtra("Email");
        loginMail.setText(usermail);
        Toast.makeText(this, "Email is Empty!"+usermail, Toast.LENGTH_SHORT).show();



        btnPurchase.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                orderplaced();

            }
        });

    }

    private void orderplaced() {
        final HashMap<String,Object> OrderDetails = new HashMap<>();

        OrderDetails.put("firstName",firstName.getText().toString());
        OrderDetails.put("lastName",lastName.getText().toString());
        OrderDetails.put("Address",Address.getText().toString());
        OrderDetails.put("City",City.getText().toString());
        OrderDetails.put("Province",Province.getText().toString());
        OrderDetails.put("PostalCode",PostalCode.getText().toString());

        firestore.collection("OrderPlaced").document(auth.getCurrentUser().getUid()).collection("CurrentUser").add(OrderDetails).addOnCompleteListener(new OnCompleteListener<DocumentReference>() {
            @Override
            public void onComplete(@NonNull Task<DocumentReference> task) {
                Intent intent = new Intent(CheckoutActivity.this,PurchaseActivity.class);
                startActivity(intent);
            }
        });
    }
}