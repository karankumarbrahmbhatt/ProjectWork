package com.example.Individual_Project2_ecommerce.Prevalent;



import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.Individual_Project2_ecommerce.Interface.ItemClickListner;
import com.example.Individual_Project2_ecommerce.R;

public class CartViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
    public TextView txtProductName,txtProductPrice,txtProductQuantity;
    private ItemClickListner itemClickListner;
    public ImageView imgProduct;

    public CartViewHolder(View itemView) {
        super(itemView);
        txtProductName = itemView.findViewById(R.id.product_name);
        txtProductPrice = itemView.findViewById(R.id.product_price);
        txtProductQuantity = itemView.findViewById(R.id.product_quantity);
    }

    @Override
    public void onClick(View view) {
        itemClickListner.onClick(view,getAdapterPosition(),false);
    }

    public void setItemClickListner(ItemClickListner itemClickListner) {
        this.itemClickListner = itemClickListner;
    }
}


