package com.example.dhura_mistry_project2;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;
import java.util.ArrayList;


public class ProductsAdapter extends RecyclerView.Adapter<ProductsAdapter.MyViewHolder> {

    private final ProductsDetailInterface productsDetailInterface;
    Context context;
    ArrayList<Products> list;

    public ProductsAdapter(Context context, ArrayList<Products> list, ProductsDetailInterface productsDetailInterface) {
        this.context = context;
        this.list = list;
        this.productsDetailInterface = productsDetailInterface;
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(context).inflate(R.layout.products_cardview,parent,false);
        return new MyViewHolder(v, productsDetailInterface);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder holder, int position) {

        Products Products = list.get(position);
        holder.itemName.setText(Products.getItemName());
        holder.itemPrice.setText("$"+Products.getItemPrice());
        Picasso.get().load(Products.getItemImage()).into(holder.itemImage);

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public static class MyViewHolder extends RecyclerView.ViewHolder{
        TextView itemName, itemPrice, itemType;
        ImageView itemImage;
        Button AddToCart;

        public MyViewHolder(@NonNull View itemView, ProductsDetailInterface productsDetailInterface) {
            super(itemView);

            itemImage = itemView.findViewById(R.id.itemImage);
            itemName = itemView.findViewById(R.id.itemName);
            itemPrice = itemView.findViewById(R.id.itemPrice);
//            AddToCart = itemView.findViewById(R.id.btnAddToCart);
//            itemType = itemView.findViewById(R.id.it)

            itemView.findViewById(R.id.itemImage).setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if(productsDetailInterface != null){
                        int pos = getAdapterPosition();

                        if(pos != RecyclerView.NO_POSITION){
                            productsDetailInterface.onItemClick(pos);
                        }

                    }
                }
            });

//            itemView.findViewById(R.id.btnAddToCart).setOnClickListener(new View.OnClickListener() {
//                @Override
//                public void onClick(View v) {
//                    Toast.makeText(v.getContext(), "Item Added to Cart", Toast.LENGTH_SHORT).show();
//                }
//            });

        }
    }

}
