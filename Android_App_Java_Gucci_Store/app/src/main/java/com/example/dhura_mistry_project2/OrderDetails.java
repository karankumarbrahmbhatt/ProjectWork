package com.example.dhura_mistry_project2;

import android.widget.TextView;

public class OrderDetails {
    String firstName,lastName,Address,City,Province,PostalCode;

    public OrderDetails() {
    }

    public OrderDetails(String firstName, String lastName, String address, String city, String province, String postalCode) {
        this.firstName = firstName;
        this.lastName = lastName;
        Address = address;
        City = city;
        Province = province;
        PostalCode = postalCode;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getAddress() {
        return Address;
    }

    public void setAddress(String address) {
        Address = address;
    }

    public String getCity() {
        return City;
    }

    public void setCity(String city) {
        City = city;
    }

    public String getProvince() {
        return Province;
    }

    public void setProvince(String province) {
        Province = province;
    }

    public String getPostalCode() {
        return PostalCode;
    }

    public void setPostalCode(String postalCode) {
        PostalCode = postalCode;
    }
}
