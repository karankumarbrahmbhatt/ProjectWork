package com.example.group1_project1

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.appcompat.view.menu.MenuView
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference

class ProductAdapter(private val productList: ArrayList<Product>) : RecyclerView.Adapter<ProductAdapter.MyViewHolder>() {

    private  lateinit var mListener: onItemClickListener

    interface onItemClickListener{

        fun onItemClick(position: Int)

    }

    fun setOnItemClickListener(listener: onItemClickListener){

        mListener = listener

    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MyViewHolder {

        val itemView = LayoutInflater.from(parent.context).inflate(R.layout.product_cardview,parent,false)
        return MyViewHolder(itemView,mListener)
    }

    override fun onBindViewHolder(holder: MyViewHolder, position: Int) {

        val currentItem = productList[position]
        holder.itemName.text = currentItem.itemName;
        holder.itemPrice.text = "$"+currentItem.itemPrice;
        val storRef: StorageReference = FirebaseStorage.getInstance().getReferenceFromUrl(currentItem.itemImage.toString())
        Glide.with(holder.itemImage.context).load(storRef).into(holder.itemImage)
    }

    override fun getItemCount(): Int {
        return productList.size
    }


    class MyViewHolder(itemView: View, listener: onItemClickListener) : RecyclerView.ViewHolder(itemView){

        val itemName : TextView = itemView.findViewById(R.id.itemName);
        val itemPrice : TextView = itemView.findViewById(R.id.itemPrice);
        val itemImage : ImageView = itemView.findViewById(R.id.itemImage);

        init{

            itemView.setOnClickListener {

                listener.onItemClick(absoluteAdapterPosition)

            }


        }

    }
}