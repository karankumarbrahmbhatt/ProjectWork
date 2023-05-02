package com.example.dhura_mistry_project2;


import static android.content.ContentValues.TAG;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageButton;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;

import java.util.ArrayList;


public class ProductsActivity extends AppCompatActivity implements ProductsDetailInterface {

   RecyclerView recyclerView;
//   DatabaseReference database;
    FirebaseFirestore db;
   ProductsAdapter myAdapter;
   ArrayList<Products> list;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_products);

        db = FirebaseFirestore.getInstance();
        recyclerView =  findViewById(R.id.ProductList);
        recyclerView.setHasFixedSize(true);
        GridLayoutManager gridLayoutManager = new GridLayoutManager(this,2,GridLayoutManager.VERTICAL,false);
        recyclerView.setLayoutManager(gridLayoutManager);
//        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        list = new ArrayList<>();
        myAdapter = new ProductsAdapter(this,list,this);
        recyclerView.setAdapter(myAdapter);

        db.collection("Products")
                .get()
                .addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<QuerySnapshot> task) {
                        if (task.isSuccessful()) {
                            for (QueryDocumentSnapshot document : task.getResult()) {
                                Products Products = document.toObject(Products.class);
                                list.add(Products);
                            }
                            Log.i(TAG, "products=" + list);
                            myAdapter.notifyDataSetChanged();
                        } else {
                         // Toast.makeText(getActivity,"Registration Succesful!",Toast.LENGTH_SHORT).show();
                        }
                    }
                });


        ImageButton btnCart = findViewById(R.id.btnDetailCart);

        Intent i = new Intent(this,CartActivity.class);

        btnCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(i);
            }
        });



    }

    @Override
    public void onItemClick(int position) {
      Intent intent = new Intent(ProductsActivity.this,DetailActivity.class);

      intent.putExtra("Name",list.get(position).getItemName());
      intent.putExtra("Image",list.get(position).getItemImage());
      intent.putExtra("Price",list.get(position).getItemPrice());
        intent.putExtra("Description",list.get(position).getItemDescription());
      startActivity(intent);
    }




}