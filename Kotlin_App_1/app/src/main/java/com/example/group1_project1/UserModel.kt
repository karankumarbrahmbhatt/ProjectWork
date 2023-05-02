package com.example.group1_project1

class UserModel {
    var name: String? = null
    var email: String? = null
    var password: String? = null

    constructor() {}
    constructor(name: String?, email: String?, password: String?) {
        this.name = name
        this.email = email
        this.password = password
    }
}