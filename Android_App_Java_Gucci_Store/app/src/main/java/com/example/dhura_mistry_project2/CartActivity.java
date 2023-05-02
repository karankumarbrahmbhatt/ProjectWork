package com.example.dhura_mistry_project2;

import static android.content.ContentValues.TAG;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QuerySnapshot;

import java.util.ArrayList;
import java.util.List;

public class CartActivity extends AppCompatActivity {


    RecyclerView recyclerView;
    CartAdapter myAdapter;
    RecyclerView.LayoutManager layoutManager;
    List<CartItems> list;
    FirebaseFirestore db;
    FirebaseAuth auth;
    ImageButton btnHome;
    TextView overTotalAmount;
    Button btnCartCheckout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        btnHome = findViewById(R.id.btnDetailHome);
        db = FirebaseFirestore.getInstance();
        auth = FirebaseAuth.getInstance();
        recyclerView = findViewById(R.id.CartList);
        layoutManager = new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);

        overTotalAmount = findViewById(R.id.cartTotal);
        btnCartCheckout = findViewById(R.id.btnCartCheckout);

        LocalBroadcastManager.getInstance(this).registerReceiver(mMessageReceiver, new IntentFilter("MyTotalAmount"));

        list =  new ArrayList<>();
        myAdapter = new CartAdapter(this,list);
        recyclerView.setAdapter(myAdapter);

        db.collection("AddToCart").document(auth.getCurrentUser().getUid()).collection("CurrentUser").get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
               if(task.isSuccessful()) {
                   for(DocumentSnapshot documentSnapshot: task.getResult().getDocuments()){

                       String documentId = documentSnapshot.getId();

                       CartItems cartItems = documentSnapshot.toObject(CartItems.class);

                       cartItems.setDocumentId(documentId);
                       list.add(cartItems);
                   }
                   myAdapter.notifyDataSetChanged();
               }
            }
        });

        btnHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(CartActivity.this,ProductsActivity.class);

                startActivity(intent);
            }
        });

        btnCartCheckout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(CartActivity.this,CheckoutActivity.class);

                startActivity(intent);
            }
        });
    }

    public BroadcastReceiver mMessageReceiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {
            String TotalAmount = intent.getStringExtra("totalAmount");
            overTotalAmount.setText("Your total: $"+TotalAmount);
        }
    };

}