package com.example.techmoresupplies;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;

public class DatabaseHandler extends SQLiteOpenHelper {

    private static final int database_version = 1;
    private static final String database_name = "db_techmore_supply";

    private static final String cart_table = "tbl_cart";
    private static final String column_id = "id";
    private static final String column_item_id = "item_id";
    private static final String column_item_name = "item_name";
    private static final String column_item_category = "item_category";
    private static final String column_item_quantity = "item_qty";
    private static final String column_item_price = "item_price";
    private static final String column_item_total = "item_total";
    private static final String column_item_image = "item_image";


    int rowCount;
    private SQLiteDatabase database;

    public DatabaseHandler(Context context) {
        super(context, database_name, null, database_version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        database = db;
        String query_cart = String.format("CREATE TABLE IF NOT EXISTS %s ( %s INTEGER PRIMARY KEY AUTOINCREMENT, %s TEXT, %s TEXT, %s TEXT, %s TEXT, %s TEXT, %s TEXT, %s TEXT)",
                cart_table, column_id, column_item_id, column_item_name, column_item_category, column_item_price, column_item_quantity, column_item_total, column_item_image);
        db.execSQL(query_cart);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS " + cart_table);
        onCreate(db);
    }

    public boolean save_into_cart(String item_id, String item_name, String item_category, String item_qty, String item_price, String item_total, String item_image) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(column_item_id, item_id);
        values.put(column_item_name, item_name);
        values.put(column_item_category, item_category);
        values.put(column_item_quantity, item_qty);
        values.put(column_item_price, item_price);
        values.put(column_item_total, item_total);
        values.put(column_item_image, item_image);
        int cursor = (int) db.insert(cart_table, null, values);
        db.close();

        if (cursor > 0)
            return true;
        else
            return false;
    }

    public String get_qty(String id) {
        database = this.getReadableDatabase();
        String selectQuery = "SELECT * FROM tbl_cart where item_id='" + id + "'";
        Cursor cursor = database.rawQuery(selectQuery, null);

        if (cursor != null && cursor.moveToFirst()) {
            @SuppressLint("Range") String name = cursor.getString(cursor.getColumnIndex("item_qty"));
            cursor.close();
            return name;
        }

        return "Empty";
    }


    public ArrayList<Cart> get_cart_items() {
        ArrayList<Cart> carts = new ArrayList<Cart>();
        database = this.getReadableDatabase();
        String selectQuery = "SELECT * FROM tbl_cart";
        Cursor cursor = database.rawQuery(selectQuery, null);

        if (cursor.moveToFirst()) {
            do {

                @SuppressLint("Range") Cart s = new Cart(cursor.getString(cursor.getColumnIndex("item_id")),
                        cursor.getString(cursor.getColumnIndex("item_name")),
                        cursor.getString(cursor.getColumnIndex("item_category")),
                        cursor.getString(cursor.getColumnIndex("item_qty")),
                        cursor.getString(cursor.getColumnIndex("item_price")),
                        cursor.getString(cursor.getColumnIndex("item_total")),
                        cursor.getString(cursor.getColumnIndex("item_image")));

                carts.add(s);


            } while (cursor.moveToNext());
        }
        return carts;
    }


    public boolean update_qty(String id, String qty, String total) {
        SQLiteDatabase mDb = this.getWritableDatabase();
        ContentValues args = new ContentValues();
        args.put(column_item_quantity, qty);
        args.put(column_item_total, total);
        return mDb.update(cart_table, args, "item_id = ?", new String[]{id}) > 0;
    }

    public void delete_cart() {
        SQLiteDatabase db = this.getWritableDatabase();
        db.execSQL("delete from tbl_cart");
    }


    @SuppressLint("Range")
    public String get_cart_total() {
        String selection = "Error";
        String selectQuery = "SELECT sum(item_total) as item_total FROM 'tbl_cart'";
        Cursor cursor = database.rawQuery(selectQuery, null);


        if (cursor.getCount() == 1) {
            cursor.moveToFirst();
            selection = cursor.getString(cursor.getColumnIndex("item_total"));
        }
        cursor.close();
        //  database.close();
        return selection;
    }

    public void deleteCartItem(String id) {
        SQLiteDatabase db = this.getWritableDatabase();
        db.delete("tbl_cart", "item_id = ? ", new String[]{id});
    }


}

