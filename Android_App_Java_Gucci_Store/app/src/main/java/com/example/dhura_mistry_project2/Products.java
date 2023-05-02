package com.example.dhura_mistry_project2;

public class Products {
    private String itemImage;
    private String itemName;
    private String itemPrice;
    private String itemType;
    private String itemDescription;


    public Products() {
    }

    public Products(String itemImage, String itemName, String itemPrice, String itemType, String itemDescription) {
        this.itemImage = itemImage;
        this.itemName = itemName;
        this.itemPrice = itemPrice;
        this.itemType = itemType;
        this.itemDescription = itemDescription;
    }

    public void setItemImage(String itemImage) {
        this.itemImage = itemImage;
    }

    public void setItemName(String itemName) {
        this.itemName = itemName;
    }

    public void setItemPrice(String itemPrice) {
        this.itemPrice = itemPrice;
    }

    public void setItemType(String itemType) {
        this.itemType = itemType;
    }
    public String getItemDescription() {
        return itemDescription;
    }

    public void setItemDescription(String itemDescription) {
        this.itemDescription = itemDescription;
    }


    public String getItemImage() {
        return itemImage;
    }

    public String getItemName() {
        return itemName;
    }

    public String getItemPrice() {
        return itemPrice;
    }

    public String getItemType() {
        return itemType;
    }


}
