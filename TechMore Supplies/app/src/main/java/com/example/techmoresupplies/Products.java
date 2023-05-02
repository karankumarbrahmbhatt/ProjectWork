package com.example.techmoresupplies;

public class Products {

    String item_id, item_name, item_price, item_category, item_image, item_description;

    public Products() {
    }

    public Products(String item_id, String item_name, String item_price, String item_category, String item_image, String description) {
        this.item_id = item_id;
        this.item_name = item_name;
        this.item_price = item_price;
        this.item_category = item_category;
        this.item_image = item_image;
        this.item_description = description;
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

    public String getItem_price() {
        return item_price;
    }

    public void setItem_price(String item_price) {
        this.item_price = item_price;
    }

    public String getItem_category() {
        return item_category;
    }

    public void setItem_category(String item_category) {
        this.item_category = item_category;
    }

    public String getItem_image() {
        return item_image;
    }

    public void setItem_image(String item_image) {
        this.item_image = item_image;
    }

    public String getItem_description() {
        return item_description;
    }

    public void setItem_description(String item_description) {
        this.item_description = item_description;
    }
}
