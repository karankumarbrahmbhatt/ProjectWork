package com.example.dhura_mistry_project2;

import static android.content.ContentValues.TAG;

import static java.lang.Integer.parseInt;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.FirebaseFirestore;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;

public class DetailActivity extends AppCompatActivity  {

    ArrayList<CartItems> list = new ArrayList<>() ;
    int totalQuantity;
    int totalPrice;
    TextView itemName,itemPrice,quantity,itemDescription;
    ImageView itemImage,addItem,removeItem,btnDetailCart,btnDetailHome;
    Button btnCheckout,btnDetailAddToCart;
    String name,image,price,description;
    FirebaseFirestore firestore;
    FirebaseAuth auth;

    Products Products = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        firestore = FirebaseFirestore.getInstance();
        auth = FirebaseAuth.getInstance();

        name = getIntent().getStringExtra("Name");
        image = getIntent().getStringExtra("Image");
        price = getIntent().getStringExtra("Price");
        description = getIntent().getStringExtra("Description");
        totalQuantity = 1;

        Log.i(TAG, "onCreate: "+name+image+price);

        itemName = findViewById(R.id.nameDetailo);
        itemPrice = findViewById(R.id.priceDetail);
        itemImage = findViewById(R.id.imageDetail);
        itemDescription = findViewById(R.id.itemDescription);
        btnCheckout = findViewById(R.id.btnCheckout);
        btnDetailCart = findViewById(R.id.btnDetailCart);
        btnDetailHome = findViewById(R.id.btnDetailHome);
        btnDetailAddToCart = findViewById(R.id.btnDetailAddToCart);
        quantity = findViewById(R.id.Quantity);
        addItem = findViewById(R.id.addItem);
        removeItem = findViewById(R.id.removeItem);

        itemName.setText(name);
        itemPrice.setText("$"+price);
        itemDescription.setText(description);
        Picasso.get().load(image).into(itemImage);

        totalPrice = parseInt(price) * totalQuantity;

        btnDetailCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(DetailActivity.this,CartActivity.class);
                startActivity(intent);
            }
        });

        btnDetailHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(DetailActivity.this,ProductsActivity.class);
                startActivity(intent);
            }
        });

        btnDetailAddToCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            addedToCart();
            }
        });

        addItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
             if(totalQuantity <10){
                 totalQuantity++;
                 quantity.setText(String.valueOf(totalQuantity));
                 totalPrice = parseInt(price) * totalQuantity;
             }
            }
        });

        removeItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(totalQuantity <10){
                    totalQuantity--;
                    quantity.setText(String.valueOf(totalQuantity));
                    totalPrice = parseInt(price) * totalQuantity;
                }
            }
        });


        Intent i = new Intent(this,CheckoutActivity.class);

        btnCheckout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                startActivity(i);
//                    list.add(new CartItems(image,name,price));
            }
        });
//        itemImage.setImageResource(image);
    }

    private void addedToCart() {
        final HashMap<String,Object> cartMap = new HashMap<>();

        cartMap.put("itemName",name);
        cartMap.put("itemPrice",price);
        cartMap.put("itemImage",image);
        cartMap.put("quantity",totalQuantity);
        cartMap.put("totalPrice",totalPrice);

        firestore.collection("AddToCart").document(auth.getCurrentUser().getUid()).collection("CurrentUser").add(cartMap).addOnCompleteListener(new OnCompleteListener<DocumentReference>() {
            @Override
            public void onComplete(@NonNull Task<DocumentReference> task) {
                Toast.makeText(DetailActivity.this,"Added to a cart",Toast.LENGTH_SHORT).show();

            }
        });
    }
}