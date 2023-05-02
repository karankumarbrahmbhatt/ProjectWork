package com.example.dhura_mistry_project2;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.localbroadcastmanager.content.LocalBroadcastManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.FirebaseFirestore;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.MyViewHolder> {

//    private final ProductsDetailInterface productsDetailInterface;
    Context context;
    List<CartItems> list;
    int totalPrice = 0;
    FirebaseFirestore firestore;
    FirebaseAuth auth;

    public CartAdapter(Context context, List<CartItems> list) {
        this.context = context;
        this.list = list;
        firestore = FirebaseFirestore.getInstance();
        auth = FirebaseAuth.getInstance();
    }

    @NonNull
    @Override
    public CartAdapter.MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(context).inflate(R.layout.cart_cardview,parent,false);
        return new CartAdapter.MyViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull CartAdapter.MyViewHolder holder, @SuppressLint("RecyclerView") int position) {

        CartItems CarItems = list.get(position);
        holder.itemName.setText(CarItems.getItemName());
        holder.itemPrice.setText("$" +CarItems.getItemPrice());
        holder.itemQuantity.setText("Quantity: "+String.valueOf(CarItems.getQuantity()));
        Picasso.get().load(CarItems.getItemImage()).into(holder.itemImage);

        //pass total amount to cart
        totalPrice = totalPrice + CarItems.getTotalPrice();

        Intent intent = new Intent("MyTotalAmount");
        intent.putExtra("totalAmount",String.valueOf(totalPrice));
        LocalBroadcastManager.getInstance(context).sendBroadcast(intent);

        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                firestore.collection("AddToCart").document(auth.getCurrentUser().getUid()).collection("CurrentUser").document(list.get(position).getDocumentId()).delete().addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {

                        if(task.isSuccessful()){
                            list.remove(list.get(position));
                            notifyDataSetChanged();
                            Toast.makeText(context,"Item deleted",Toast.LENGTH_SHORT).show();
                        }else{
                            Toast.makeText(context,"Error"+task.getException(),Toast.LENGTH_SHORT).show();
                        }
                    }
                });

            }
        });

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public static class MyViewHolder extends RecyclerView.ViewHolder{
        TextView itemName, itemPrice, itemType,itemQuantity;
        ImageView itemImage;
        Button btnRemove;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);

            itemImage = itemView.findViewById(R.id.Checkout_image);
            itemName = itemView.findViewById(R.id.checkout_name);
            itemPrice = itemView.findViewById(R.id.checkout_price);
            itemQuantity = itemView.findViewById(R.id.checkout_quantity);
            btnRemove = itemView.findViewById(R.id.btnRemove);
//            itemType = itemView.findViewById(R.id.it)


        }
    }
}
