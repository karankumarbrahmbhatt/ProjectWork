package com.example.techmoresupplies;

import androidx.appcompat.app.AppCompatActivity;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class activity_products extends AppCompatActivity {

    DatabaseReference db_ref;
    ArrayList <Products> products_list = new ArrayList<>();
    ArrayList<Cart> list_cart = new ArrayList<>();
    RecyclerView recyclerView;
    products_viewholder adapter;
    public TextView textCartItemCount;
    public int mCartItemCount = 0;
    DatabaseHandler databaseHandler;
    private BroadcastReceiver mMessageReceiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {

            String message = intent.getStringExtra("message");
            if (message.equals("true")) {
                list_cart.clear();
                list_cart = databaseHandler.get_cart_items();
                try{
                    setupBadge(list_cart.size());
                }
                catch (Exception e){

                }


            }

        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_products);
        LocalBroadcastManager.getInstance(this).registerReceiver(mMessageReceiver, new IntentFilter("techmore"));
        databaseHandler = new DatabaseHandler(activity_products.this);
        db_ref = FirebaseDatabase.getInstance().getReference().child("Products");
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        Bundle extras = getIntent().getExtras();
        if (extras != null) {
            String category = extras.getString("category");
            fetch_products(category);
        }

        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new GridLayoutManager(activity_products.this, 2));
        db_ref = FirebaseDatabase.getInstance().getReference().child("Products");

    }

    public void fetch_products(String category) {
        Helper.showLoader(activity_products.this, "Please wait we are fetching products . . .");
        db_ref.child(category).addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                // parsing all data
                for (DataSnapshot postSnapshot : snapshot.getChildren()) {

                    products_list.add(new Products(postSnapshot.getKey(),
                            postSnapshot.child("item_name").getValue(String.class),
                            postSnapshot.child("item_price").getValue(String.class),
                            postSnapshot.child("item_category").getValue(String.class),
                            postSnapshot.child("item_image").getValue(String.class),
                            postSnapshot.child("item_description").getValue(String.class))); // adding data into list

                }
                if (products_list.size() > 0) {
                    Helper.stopLoader();
                    adapter = new products_viewholder(activity_products.this, products_list);
                    recyclerView.setAdapter(adapter);
                } else {
                    Helper.stopLoader();
                    Toast.makeText(activity_products.this, "Something went wrong", Toast.LENGTH_LONG).show();
                }


            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        super.onCreateOptionsMenu(menu);
        getMenuInflater().inflate(R.menu.cart_menu, menu);
        final MenuItem menuItem = menu.findItem(R.id.action_cart);
        View actionView = menuItem.getActionView();
        textCartItemCount = (TextView) actionView.findViewById(R.id.cart_badge);
        list_cart.clear();
        list_cart = databaseHandler.get_cart_items();
        setupBadge(list_cart.size());


        actionView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onOptionsItemSelected(menuItem);
            }
        });

        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle item selection
        switch (item.getItemId()) {

            case R.id.action_cart:

                startActivity(new Intent(activity_products.this, activity_cart.class));
                return true;


            default:
                return super.onOptionsItemSelected(item);
        }
    }


    public void setupBadge(int count) {
        mCartItemCount = count;
        textCartItemCount.setText(String.valueOf(count));



    }

    @Override
    protected void onDestroy() {
        LocalBroadcastManager.getInstance(this).unregisterReceiver(mMessageReceiver);
        super.onDestroy();
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }

    @Override
    protected void onStart() {
        super.onStart();

    }
}