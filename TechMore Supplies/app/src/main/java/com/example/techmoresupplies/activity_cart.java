package com.example.techmoresupplies;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.util.Patterns;
import android.view.KeyEvent;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.ArrayList;
import java.util.HashMap;

public class activity_cart extends AppCompatActivity implements viewholder_cart.MyInterface {

    RecyclerView recyclerView;
    viewholder_cart adapter;
    DatabaseHandler databaseHandler;
    ArrayList<Cart> list = new ArrayList<>();
    Button btn_checkout;
    DatabaseReference databaseReference;
    String total = "0";
    private boolean flag = false;
    RadioButton radioButton_creditcard, radioButton_etransfer;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);
        databaseReference = FirebaseDatabase.getInstance().getReference().child("Orders");
        databaseHandler = new DatabaseHandler(activity_cart.this);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        btn_checkout = findViewById(R.id.btn_checkout);
        radioButton_creditcard = findViewById(R.id.radio_credit_card);
        radioButton_creditcard.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (compoundButton.isPressed()) {
                    radioButton_etransfer.setChecked(false);
                }
            }
        });
        radioButton_etransfer = findViewById(R.id.radio_etransfer);
        radioButton_etransfer.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (compoundButton.isPressed()) {
                    radioButton_creditcard.setChecked(false);
                }
            }
        });
        radioButton_creditcard.setChecked(true);
        btn_checkout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (total == null) {

                } else {

                    if (radioButton_creditcard.isChecked()) {
                        debitcard_popup();
                    } else {
                        etransfer_popup();
                    }

                }
            }
        });
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new GridLayoutManager(activity_cart.this, 1));
        list = databaseHandler.get_cart_items();
        adapter = new viewholder_cart(activity_cart.this, list, this);
        recyclerView.setAdapter(adapter);
        total = databaseHandler.get_cart_total();
        if (total != null) {
            btn_checkout.setText("Checkout ($" + total + ")");

        } else {
            btn_checkout.setText("Checkout ($0)");

        }

    }


    private void etransfer_popup() {
        LayoutInflater layoutInflaterAndroid = LayoutInflater.from(activity_cart.this);
        View mView = layoutInflaterAndroid.inflate(R.layout.etransfer_popup, null);
        EditText txt_name = mView.findViewById(R.id.name);
        EditText txt_email = mView.findViewById(R.id.email);
        EditText txt_acc_number = mView.findViewById(R.id.acc_number);


        AlertDialog.Builder alertDialogBuilderUserInput = new AlertDialog.Builder(activity_cart.this);
        alertDialogBuilderUserInput.setPositiveButton("Proceed", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {

                if (txt_name.getText().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter name", Toast.LENGTH_LONG).show();
                } else if (txt_email.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter email", Toast.LENGTH_LONG).show();
                } else if (txt_acc_number.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter account number", Toast.LENGTH_LONG).show();
                } else {
                    save_record_etransfer(txt_name.getText().toString(),
                            txt_email.getText().toString(),
                            txt_acc_number.getText().toString(), total);

                }

            }
        });
        alertDialogBuilderUserInput.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.dismiss();
            }
        });
        alertDialogBuilderUserInput.setView(mView);
        AlertDialog alertDialogAndroid = alertDialogBuilderUserInput.create();
        alertDialogAndroid.setCancelable(false);
        alertDialogAndroid.setOnKeyListener(new Dialog.OnKeyListener() {

            @Override
            public boolean onKey(DialogInterface dialogInterface, int keycode, KeyEvent keyEvent) {
                if (keycode == KeyEvent.KEYCODE_BACK) {
                    dialogInterface.dismiss();
                }

                return false;
            }
        });

        alertDialogAndroid.show();
    }

    private void debitcard_popup() {


        LayoutInflater layoutInflaterAndroid = LayoutInflater.from(activity_cart.this);
        View mView = layoutInflaterAndroid.inflate(R.layout.order_info_popup, null);
        EditText txt_name = mView.findViewById(R.id.name);
        EditText txt_email = mView.findViewById(R.id.email);
        EditText txt_address = mView.findViewById(R.id.address);
        EditText txt_city = mView.findViewById(R.id.city);
        EditText txt_province = mView.findViewById(R.id.province);
        EditText txt_country = mView.findViewById(R.id.country);
        EditText txt_creditcard = mView.findViewById(R.id.credit_card);
        EditText txt_cvv = mView.findViewById(R.id.cvv);
        EditText txt_expiry = mView.findViewById(R.id.expiry);

        AlertDialog.Builder alertDialogBuilderUserInput = new AlertDialog.Builder(activity_cart.this);
        alertDialogBuilderUserInput.setPositiveButton("Proceed", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {

                if (txt_name.getText().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter name", Toast.LENGTH_LONG).show();
                } else if (txt_email.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter email", Toast.LENGTH_LONG).show();
                } else if (txt_address.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter address", Toast.LENGTH_LONG).show();
                } else if (txt_city.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter city", Toast.LENGTH_LONG).show();
                } else if (txt_province.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter province", Toast.LENGTH_LONG).show();
                } else if (txt_country.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter country", Toast.LENGTH_LONG).show();
                } else if (txt_creditcard.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter credit card number", Toast.LENGTH_LONG).show();
                } else if (txt_cvv.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter cvv number", Toast.LENGTH_LONG).show();
                } else if (txt_expiry.getText().toString().equals("")) {
                    Toast.makeText(activity_cart.this, "Please enter expiry", Toast.LENGTH_LONG).show();
                } else {
                    save_record(txt_name.getText().toString(),
                            txt_email.getText().toString(),
                            txt_address.getText().toString(),
                            txt_city.getText().toString(),
                            txt_province.getText().toString(),
                            txt_country.getText().toString(),
                            txt_creditcard.getText().toString(),
                            txt_cvv.getText().toString(),
                            txt_expiry.getText().toString(), total);

                }


            }
        });
        alertDialogBuilderUserInput.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.dismiss();
            }
        });
        alertDialogBuilderUserInput.setView(mView);
        AlertDialog alertDialogAndroid = alertDialogBuilderUserInput.create();
        alertDialogAndroid.setCancelable(false);
        alertDialogAndroid.setOnKeyListener(new Dialog.OnKeyListener() {

            @Override
            public boolean onKey(DialogInterface dialogInterface, int keycode, KeyEvent keyEvent) {
                if (keycode == KeyEvent.KEYCODE_BACK) {
                    dialogInterface.dismiss();
                }

                return false;
            }
        });

        alertDialogAndroid.show();

    }

    private void save_record_etransfer(String name, String email, String acc_number, String total) {

        HashMap<String, String> hashMap = new HashMap<>();
        hashMap.put("name", name);
        hashMap.put("email", email);
        hashMap.put("acc_number", acc_number);
        hashMap.put("total", total);
        hashMap.put("payment_type", "e_transfer");

        Helper.showLoader(activity_cart.this, "Please wait . . .");

        databaseReference.child(Helper.GetData(activity_cart.this, "user_id")).child(databaseReference.push().getKey()).setValue(hashMap).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                if (task.isSuccessful()) {
                    databaseHandler.delete_cart();
                    recyclerView.setAdapter(null);
                    btn_checkout.setText("Checkout ($0)");
                    Helper.stopLoader();
                    Toast.makeText(activity_cart.this, "Order Placed Successfully", Toast.LENGTH_LONG).show();
                    flag = true;
                    SendUserToMainActivity();
                }
            }
        });
    }


    private void save_record(String name, String email, String address, String city, String province, String country, String credit_card, String cvv, String expiry, String total) {

        HashMap<String, String> hashMap = new HashMap<>();
        hashMap.put("name", name);
        hashMap.put("email", email);
        hashMap.put("address", address);
        hashMap.put("city", city);
        hashMap.put("province", province);
        hashMap.put("country", country);
        hashMap.put("credit_card", credit_card);
        hashMap.put("cvv", cvv);
        hashMap.put("expiry", expiry);
        hashMap.put("total", total);
        hashMap.put("payment_type", "credit_card");

        Helper.showLoader(activity_cart.this, "Please wait . . .");

        databaseReference.child(Helper.GetData(activity_cart.this, "user_id")).child(databaseReference.push().getKey()).setValue(hashMap).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                if (task.isSuccessful()) {
                    databaseHandler.delete_cart();
                    recyclerView.setAdapter(null);
                    btn_checkout.setText("Checkout ($0)");
                    Helper.stopLoader();
                    Toast.makeText(activity_cart.this, "Order Placed Successfully", Toast.LENGTH_LONG).show();
                    flag = true;
                    SendUserToMainActivity();
                }
            }
        });


    }

    private void SendUserToMainActivity() {
        Intent mainIntent = new Intent(activity_cart.this, MainActivity.class);
        mainIntent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
        startActivity(mainIntent);
        finish();
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        if (flag) {
            Intent mainIntent = new Intent(activity_cart.this, MainActivity.class);
            mainIntent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
            startActivity(mainIntent);
        } else {
            Intent intent = new Intent("techmore");
            intent.putExtra("message", "true");
            LocalBroadcastManager.getInstance(this).sendBroadcast(intent);
        }

    }

    @Override
    public void qty_changed() {
        total = databaseHandler.get_cart_total();
        if (total != null) {
            btn_checkout.setText("Checkout ($" + total + ")");

        } else {
            btn_checkout.setText("Checkout ($0)");

        }
    }
}