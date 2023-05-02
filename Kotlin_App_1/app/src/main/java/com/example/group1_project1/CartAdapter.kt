package com.example.group1_project1

import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import androidx.localbroadcastmanager.content.LocalBroadcastManager
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference


var totalPrice = 0;
var auth: FirebaseAuth? = null
class CartAdapter(private val cartList: ArrayList<CartItems>) : RecyclerView.Adapter<CartAdapter.MyViewHolder>() {

    private lateinit var mDatabase: DatabaseReference

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MyViewHolder {

        val itemView = LayoutInflater.from(parent.context).inflate(R.layout.cart_cardview,parent,false)
        return MyViewHolder(itemView)
    }

    override fun onBindViewHolder(holder: MyViewHolder, position: Int) {

        val currentItem = cartList[position]
        holder.itemName.text = currentItem.itemName;
        holder.itemPrice.text = "$" + currentItem.itemPrice;
        holder.itemQuantity.text = "Quantity: " + currentItem.quantity;
        val storRef: StorageReference = FirebaseStorage.getInstance().getReferenceFromUrl(currentItem.itemImage.toString())
        Glide.with(holder.itemImage.context).load(storRef).into(holder.itemImage)

        //pass total amount to cart
        totalPrice += currentItem.totalPrice

        val intent = Intent("MyTotalAmount")
        intent.putExtra("totalAmount", totalPrice.toString())
//        LocalBroadcastManager.getInstance(context).sendBroadcast(intent)
//        final DatabaseReference itemRef = getRef(position);
//        final String myKey = itemRef.getKey();
//
//        holder.btnRemove.setOnClickListener(View.OnClickListener {
//            mDatabase.child(myKey).removeValue()
//        })
        holder.btnRemove.setOnClickListener {
            deleteItem(position)
//            val ref = FirebaseDatabase.getInstance().reference
//            val applesQuery = ref.child("Cart").orderByChild(auth!!.currentUser!!.uid).orderByChild("itemName")
//
//            applesQuery.addListenerForSingleValueEvent(object : ValueEventListener {
//                override fun onDataChange(dataSnapshot: DataSnapshot) {
//                    for (appleSnapshot in dataSnapshot.children) {
//                        appleSnapshot.ref.removeValue()
//                    }
//                }
//
//                override fun onCancelled(databaseError: DatabaseError) {
//                    Log.e(TAG, "onCancelled", databaseError.toException())
//                }
//            })


        }


    }

    override fun getItemCount(): Int {
        return cartList.size
    }

    fun deleteItem(index:Int){
        cartList.removeAt(index)
        notifyDataSetChanged()
 }

//    fun deleteItem(index:Int){
//        val key = cartList[index]
//        //cartList.removeAt(index)
//        //notifyDataSetChanged()
//
//        val mPostReference = FirebaseDatabase.getInstance().getReference("Cart").child(auth!!.currentUser!!.uid).child(key.toString());
//        mPostReference.removeValue();
//
//    }

    class MyViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView){

        val itemImage : ImageView = itemView.findViewById(R.id.Checkout_image);
        val itemName : TextView = itemView.findViewById(R.id.checkout_name);
        val itemPrice : TextView = itemView.findViewById(R.id.checkout_price);
        val itemQuantity : TextView = itemView.findViewById(R.id.checkout_quantity);
        val btnRemove : Button = itemView.findViewById(R.id.btnRemove);


    }
}
