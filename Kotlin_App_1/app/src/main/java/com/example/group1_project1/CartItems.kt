package com.example.group1_project1

class CartItems {
    var itemImage: String? = null
    var itemName: String? = null
    var itemPrice: String? = null
    var quantity = 0
    var totalPrice = 0
    var documentId: String? = null

    constructor() {}
    constructor(
        itemImage: String?,
        itemName: String?,
        itemPrice: String?,
        quantity: Int,
        totalPrice: Int
    ) {
        this.itemImage = itemImage
        this.itemName = itemName
        this.itemPrice = itemPrice
        this.quantity = quantity
        this.totalPrice = totalPrice
    }
}
