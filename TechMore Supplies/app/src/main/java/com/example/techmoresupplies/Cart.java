package com.example.techmoresupplies;

public class Cart {

    String item_id, item_name, item_category, item_qty,item_price, total, image;

    public Cart(String item_id, String item_name, String item_category, String item_qty,String item_price, String total, String image) {
        this.item_id = item_id;
        this.item_name = item_name;
        this.item_category = item_category;
        this.item_qty = item_qty;
        this.item_price=item_price;
        this.total = total;
        this.image = image;
    }

    public String getItem_id() {
        return item_id;
    }

    public void setItem_id(String item_id) {
        this.item_id = item_id;
    }

    public String getItem_name() {
        return item_name;
    }

    public void setItem_name(String item_name) {
        this.item_name = item_name;
    }

    public String getItem_category() {
        return item_category;
    }

    public void setItem_category(String item_category) {
        this.item_category = item_category;
    }

    public String getItem_qty() {
        return item_qty;
    }

    public void setItem_qty(String item_qty) {
        this.item_qty = item_qty;
    }


    public String getTotal() {
        return total;
    }

    public void setTotal(String total) {
        this.total = total;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getItem_price() {
        return item_price;
    }

    public void setItem_price(String item_price) {
        this.item_price = item_price;
    }
}
