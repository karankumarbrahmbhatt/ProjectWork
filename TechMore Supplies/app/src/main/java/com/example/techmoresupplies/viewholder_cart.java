package com.example.techmoresupplies;


import android.annotation.SuppressLint;
import android.content.Context;
import android.support.annotation.NonNull;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class viewholder_cart extends RecyclerView.Adapter <viewholder_cart.grocery> {

    Context context;
    View _view;
    ArrayList <Cart> cart_list;
    DatabaseHandler databaseHandler;
    MyInterface myInterface;

    public interface MyInterface {
        void qty_changed();
    }

    public viewholder_cart(Context c, ArrayList<Cart> list, MyInterface myInterface) {
        context = c;
        cart_list = list;
        databaseHandler = new DatabaseHandler(context);
        this.myInterface = myInterface;
    }

    @NonNull
    @Override
    public grocery onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        _view = LayoutInflater.from(context).inflate(R.layout.list_layout_cart, parent, false);
        return new grocery(_view);
    }

    @Override
    public void onBindViewHolder(@NonNull final grocery holder, @SuppressLint("RecyclerView") final int position) {
        holder.Name.setText(cart_list.get(position).getItem_name());
        holder.Qty.setText(cart_list.get(position).getItem_qty());
        holder.txt_qty.setText(cart_list.get(position).getItem_qty());
        holder.Price.setText("$" + Integer.parseInt(cart_list.get(position).getItem_price()) * Integer.parseInt(cart_list.get(position).getItem_qty()));
        Picasso.get().load(cart_list.get(position).getImage()).into(holder.Image);
        holder.Remove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                databaseHandler.deleteCartItem(cart_list.get(position).getItem_id());
                cart_list.remove(position);
                notifyDataSetChanged();
                myInterface.qty_changed();
            }
        });

        holder.btn_minus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                int count = Integer.parseInt(holder.Qty.getText().toString());
                if (count > 0) {
                    if (count == 1) {

                    } else {
                        count = count - 1;
                        holder.Qty.setText(String.valueOf(count));
                        holder.txt_qty.setText(String.valueOf(count));
                        holder.Price.setText("$" + String.valueOf(Double.parseDouble(cart_list.get(position).getItem_price()) * count));
                        databaseHandler.update_qty(cart_list.get(position).getItem_id(), String.valueOf(count), String.valueOf(Double.parseDouble(cart_list.get(position).getItem_price()) * count));
                        myInterface.qty_changed();
                    }


                }

            }
        });
        holder.btn_add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int count = Integer.parseInt(holder.Qty.getText().toString());
                count = count + 1;
                holder.txt_qty.setText(String.valueOf(count));
                holder.Qty.setText(String.valueOf(count));
                holder.Price.setText(" $" + String.valueOf(Double.parseDouble(cart_list.get(position).getItem_price()) * count));
                databaseHandler.update_qty(cart_list.get(position).getItem_id(), String.valueOf(count), String.valueOf(Double.parseDouble(cart_list.get(position).getItem_price()) * count));
                myInterface.qty_changed();


            }
        });
    }

    @Override
    public long getItemId(int position) {
        return super.getItemId(position);
    }

    @Override
    public int getItemViewType(int position) {

        return position;
    }

    @Override
    public int getItemCount() {
        return cart_list.size();
    }

    class grocery extends RecyclerView.ViewHolder {
        TextView Name, Price, Qty;
        ImageView Image, Remove;
        CardView cardView;
        Button btn_add, btn_minus;
        EditText txt_qty;

        public grocery(View itemView) {
            super(itemView);

            Name = (TextView) itemView.findViewById(R.id.item_name);
            Price = (TextView) itemView.findViewById(R.id.item_price);
            Qty = (TextView) itemView.findViewById(R.id.item_qty);
            txt_qty = (EditText) itemView.findViewById(R.id.qty);
            btn_minus = (Button) itemView.findViewById(R.id.minus);
            btn_add = (Button) itemView.findViewById(R.id.plus);
            Image = (ImageView) itemView.findViewById(R.id.item_image);
            Remove = (ImageView) itemView.findViewById(R.id.btn_remove);
            cardView = (CardView) itemView.findViewById(R.id.cardview);
        }
    }


}

