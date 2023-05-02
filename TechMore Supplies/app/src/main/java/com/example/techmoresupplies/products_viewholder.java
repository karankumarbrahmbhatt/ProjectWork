package com.example.techmoresupplies;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.AsyncTask;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Filter;
import android.widget.Filterable;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.cardview.widget.CardView;
import androidx.core.app.ActivityCompat;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.Locale;
import java.util.Timer;
import java.util.TimerTask;


public class products_viewholder extends RecyclerView.Adapter<products_viewholder.grocery> {

    Context context;
    View _view;
    ArrayList <Products> products_list;

    public products_viewholder(Context c, ArrayList<Products> list) {
        context = c;
        products_list = list;
    }

    @NonNull
    @Override
    public grocery onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        _view = LayoutInflater.from(context).inflate(R.layout.items_list_layout, parent, false);
        return new grocery(_view);
    }

    @Override
    public void onBindViewHolder(@NonNull final grocery holder, @SuppressLint("RecyclerView") final int position) {
        holder.Name.setText(products_list.get(position).getItem_name());
        holder.Price.setText("$" + products_list.get(position).getItem_price());
        Picasso.get().load(products_list.get(position).getItem_image()).into(holder.ProductImage);

        holder.cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(context, activity_add_to_cart.class);
                intent.putExtra("item_id", products_list.get(position).getItem_category() + products_list.get(position).getItem_id());
                intent.putExtra("item_name", products_list.get(position).getItem_name());
                intent.putExtra("item_price", products_list.get(position).getItem_price());
                intent.putExtra("item_image", products_list.get(position).getItem_image());
                intent.putExtra("item_description", products_list.get(position).getItem_description());
                context.startActivity(intent);
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
        return products_list.size();
    }

    class grocery extends RecyclerView.ViewHolder {
        TextView Name, Price;
        ImageView ProductImage;
        CardView cardView;

        public grocery(View itemView) {
            super(itemView);

            Name = (TextView) itemView.findViewById(R.id.item_name);
            Price = (TextView) itemView.findViewById(R.id.item_price);
            ProductImage = (ImageView) itemView.findViewById(R.id.item_image);
            cardView = (CardView) itemView.findViewById(R.id.cardview);
        }
    }


}

