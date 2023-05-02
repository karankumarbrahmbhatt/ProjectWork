package com.example.dhura_mistry_project2;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class PurchaseActivity extends AppCompatActivity {

    ImageView btnDetailHome,btnDetailCart;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_purchase);

        btnDetailCart = findViewById(R.id.btnDetailCart);
        btnDetailHome = findViewById(R.id.btnDetailHome);

        btnDetailHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(PurchaseActivity.this,ProductsActivity.class);

                startActivity(intent);
            }
        });

        btnDetailCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(PurchaseActivity.this,CartActivity.class);

                startActivity(intent);
            }
        });
    }
}