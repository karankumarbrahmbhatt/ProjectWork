package com.example.techmoresupplies;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    DatabaseReference db_ref;
    ArrayList <Categories> category_list = new ArrayList<>();
    RecyclerView recyclerView;
    categories_viewholder adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new GridLayoutManager(MainActivity.this, 2));
        db_ref = FirebaseDatabase.getInstance().getReference().child("Products");
        fetch_categories();
    }


    public void fetch_categories() {
        Helper.showLoader(MainActivity.this, "Please wait we are fetching categories . . .");
        db_ref.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                category_list.clear();
                for (DataSnapshot postSnapshot : snapshot.getChildren()) {

                    if (!postSnapshot.getKey().equals("Orders")) {
                        category_list.add(new Categories(postSnapshot.getKey(), postSnapshot.child("1").child("item_image").getValue(String.class))); // adding data into list
                    }

                }
                if (category_list.size() > 0) {
                    Helper.stopLoader();
                    adapter = new categories_viewholder(MainActivity.this, category_list);
                    recyclerView.setAdapter(adapter);
                } else {
                    Helper.stopLoader();
                    Toast.makeText(MainActivity.this, "Something went wrong", Toast.LENGTH_LONG).show();
                }


            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {

            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle item selection
        switch (item.getItemId()) {
            case R.id.action_logout:
                finish();
                startActivity(new Intent(MainActivity.this, activity_login.class));
                Helper.PutData(MainActivity.this, "user_id", null);
                return true;

            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }
}