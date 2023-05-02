package com.example.techmoresupplies;

import androidx.appcompat.app.AppCompatActivity;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.text.TextPaint;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class activity_add_to_cart extends AppCompatActivity {
    TextView Name, Price, txt_description;
    ImageView ProductImage;
    String item_id, item_image;
    Button btn_add;
    DatabaseHandler databaseHandler;
    public TextView textCartItemCount;
    public int mCartItemCount = 0;
    ArrayList<Cart> list_cart = new ArrayList<>();
    EditText txt_qty;
    Button plus, minus;
    int count = 1;
    private BroadcastReceiver mMessageReceiver = new BroadcastReceiver() {
        @Override
        public void onReceive(Context context, Intent intent) {

            String message = intent.getStringExtra("message");

            if (message.equals("true")) {
                list_cart.clear();
                list_cart = databaseHandler.get_cart_items();
                try {
                    setupBadge(list_cart.size());
                } catch (Exception e) {

                }

            }

        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_to_cart);
        LocalBroadcastManager.getInstance(this).registerReceiver(mMessageReceiver, new IntentFilter("techmore"));
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        databaseHandler = new DatabaseHandler(activity_add_to_cart.this);
        plus = findViewById(R.id.plus);
        minus = findViewById(R.id.minus);
        txt_qty = findViewById(R.id.qty);
        minus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                count = Integer.parseInt(txt_qty.getText().toString());
                if (count > 0) {
                    if (count == 1) {

                    } else {
                        count = count - 1;
                        txt_qty.setText(String.valueOf(count));
                    }

                }

            }
        });
        plus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                count = Integer.parseInt(txt_qty.getText().toString());
                count = count + 1;
                txt_qty.setText(String.valueOf(count));

            }
        });
        Name = (TextView) findViewById(R.id.item_name);
        Price = (TextView) findViewById(R.id.item_price);
        ProductImage = (ImageView) findViewById(R.id.item_image);
        txt_description = (TextView) findViewById(R.id.item_description);
        btn_add = findViewById(R.id.btn_add_to_cart);
        btn_add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String qty = databaseHandler.get_qty(item_id);

                // adds multiple quantity to cart for a product
                if (qty.equals("Empty")) {
                    databaseHandler.save_into_cart(
                            item_id, Name.getText().toString(), "", String.valueOf(count), Price.getText().toString().replace("$", ""), String.valueOf(Integer.parseInt(Price.getText().toString().replace("$", "")) * Integer.parseInt(txt_qty.getText().toString())), item_image);
                    Toast.makeText(activity_add_to_cart.this, "Item Added to cart Successfully", Toast.LENGTH_LONG).show();
                    list_cart.clear();
                    list_cart = databaseHandler.get_cart_items();
                    setupBadge(list_cart.size());
                } else {
                    int new_qty = Integer.parseInt(qty) + count;
                    if (databaseHandler.update_qty(item_id, String.valueOf(new_qty), String.valueOf(new_qty * Integer.parseInt(Price.getText().toString().replace("$", ""))))) {
                        Toast.makeText(activity_add_to_cart.this, "Item Added to cart Successfully", Toast.LENGTH_LONG).show();
                    }
                }
            }
        });
        Bundle extras = getIntent().getExtras();
        if (extras != null) {
            item_id = extras.getString("item_id");
            String item_name = extras.getString("item_name");
            String item_price = extras.getString("item_price");
            item_image = extras.getString("item_image");
            String item_description = extras.getString("item_description");
            Name.setText(item_name);
            Price.setText("$" + item_price);
            txt_description.setText(item_description);
            Picasso.get().load(item_image).into(ProductImage);


        }

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        Intent intent = new Intent("techmore");
        intent.putExtra("message", "true");
        LocalBroadcastManager.getInstance(this).sendBroadcast(intent);

    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
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

                startActivity(new Intent(activity_add_to_cart.this, activity_cart.class));
                return true;


            default:
                return super.onOptionsItemSelected(item);
        }
    }

    public void setupBadge(int count) {
        mCartItemCount = count;
        textCartItemCount.setText(String.valueOf(count));
    }

}