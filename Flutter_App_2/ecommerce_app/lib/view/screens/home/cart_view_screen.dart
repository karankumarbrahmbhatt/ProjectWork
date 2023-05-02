import 'dart:developer';

import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/data/model/product_model.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/credit_card_fileds_dialogue.dart';
import 'package:ecommerce/view/common_widgets/custom_app_bar.dart';
import 'package:ecommerce/view/common_widgets/custom_button.dart';
import 'package:ecommerce/view/common_widgets/custom_snackbar.dart';
import 'package:ecommerce/view/common_widgets/etransfer_dialogue.dart';
import 'package:ecommerce/view/screens/home/dashboard.dart';
import 'package:ecommerce/view/screens/home/order_success_screen.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_state_manager/get_state_manager.dart';

class CartViewScreen extends StatefulWidget {
  const CartViewScreen({Key? key}) : super(key: key);

  @override
  State<CartViewScreen> createState() => _CartViewScreenState();
}

class _CartViewScreenState extends State<CartViewScreen> {
  @override
  Widget build(BuildContext context) {
    return GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
          return Scaffold(
            backgroundColor: Colors.grey[200],
            appBar: CustomAppBar(
              title: English.cart,
              isBackButtonExist: true,
            ),
            body: cartController.cart.isNotEmpty
                ? Stack(
                    alignment: Alignment.bottomCenter,
                    children: [
                      SizedBox(
                          // height: MediaQuery.of(context).size.height * .8,
                          child: ListView.builder(
                        itemCount: cartController.cart.length,
                        itemBuilder: (context, index) {
                          ProductModel productModel =
                              cartController.cart[index].values.first;

                          return Container(
                              margin: const EdgeInsets.all(12),
                              height: MediaQuery.of(context).size.height * .2,
                              decoration: BoxDecoration(
                                  color: Colors.white,
                                  boxShadow: const [
                                    BoxShadow(
                                        offset: Offset(3, 3),
                                        color: Colors.black12,
                                        spreadRadius: 1,
                                        blurRadius: 5)
                                  ],
                                  borderRadius: BorderRadius.circular(
                                      Dimensions.RADIUS_EXTRA_LARGE)),
                              child: Row(
                                children: [
                                  const SizedBox(
                                    width: 10,
                                  ),
                                  Column(
                                    children: [
                                      Container(
                                        // margin: EdgeInsets.all(6),
                                        height:
                                            MediaQuery.of(context).size.height *
                                                .2,
                                        width:
                                            MediaQuery.of(context).size.width *
                                                .3,
                                        decoration: BoxDecoration(
                                            // color: Colors.red,
                                            image: DecorationImage(
                                                image: AssetImage(
                                                    "${productModel.icon}"))),
                                      ),
                                    ],
                                  ),
                                  const SizedBox(
                                    width: 20,
                                  ),
                                  Column(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text("${productModel.title}",
                                          style: robotoBold.copyWith(
                                              // color: Colors.white,
                                              fontSize: Dimensions
                                                  .FONT_SIZE_EXTRA_LARGE)),
                                      const SizedBox(
                                        height: 20,
                                      ),
                                      Text(
                                          "\$ ${cartController.cart[index]['price']}",
                                          style: robotoBold.copyWith(
                                              // color: Colors.white,
                                              fontSize: Dimensions
                                                  .FONT_SIZE_EXTRA_LARGE)),
                                      const SizedBox(
                                        height: 20,
                                      ),
                                      Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.center,
                                        children: [
                                          InkWell(
                                            onTap: () {
                                              if (cartController.cart[index]
                                                      ['count'] >
                                                  1) {
                                                cartController.cart[index]
                                                    ['count'] = cartController
                                                        .cart[index]['count'] -
                                                    1;
                                                cartController.cart[index]
                                                        ['price'] -=
                                                    int.parse(productModel.price
                                                        .toString());

                                                cartController.settotalPrice(
                                                    cartController.totalPrice! -
                                                        int.parse(productModel
                                                            .price
                                                            .toString()));
                                              } else {
                                                if(cartController.cart.length ==1 && cartController.cart[index]['count']==1){
                                                  // print("last itme");
                                                  cartController.settotalPrice(0);
                                                  cartController.setCartCount(0);
                                                }
                                                // print("00000");
                                                // 
                                                cartController
                                                    .removeFromCart(index);
                                                cartController.setCartCount(
                                                    cartController.cartCount! -
                                                        1);
                                              }

                                              setState(() {});
                                            },
                                            child: Container(
                                              height: 30,
                                              width: 40,
                                              alignment: Alignment.center,
                                              decoration: BoxDecoration(
                                                color: Theme.of(context)
                                                    .primaryColor,
                                                borderRadius:
                                                    BorderRadius.circular(
                                                        Dimensions
                                                            .RADIUS_SMALL),
                                              ),
                                              child: Text("-",
                                                  style: robotoBold.copyWith(
                                                      color: Colors.white,
                                                      fontSize: Dimensions
                                                          .FONT_SIZE_EXTRA_LARGE)),
                                            ),
                                          ),
                                          const SizedBox(
                                            width: 20,
                                          ),
                                          Text(
                                              "${cartController.cart[index]['count']}",
                                              style: robotoBold.copyWith(
                                                  decoration: TextDecoration
                                                      .underline)),
                                          const SizedBox(
                                            width: 20,
                                          ),
                                          InkWell(
                                            onTap: () {
                                              cartController.cart[index]
                                                  ['count'] = cartController
                                                      .cart[index]['count'] +
                                                  1;
                                              cartController.cart[index]
                                                      ['price'] +=
                                                  int.parse(productModel.price
                                                      .toString());

                                              cartController.settotalPrice(
                                                  cartController.totalPrice! +
                                                      int.parse(productModel
                                                          .price
                                                          .toString()));
                                              setState(() {});
                                              // cartController.setproductCount(
                                              //     cartController.productCount! + 1);
                                            },
                                            child: Container(
                                              height: 30,
                                              width: 40,
                                              alignment: Alignment.center,
                                              decoration: BoxDecoration(
                                                color: Theme.of(context)
                                                    .primaryColor,
                                                borderRadius:
                                                    BorderRadius.circular(
                                                        Dimensions
                                                            .RADIUS_SMALL),
                                              ),
                                              child: Text("+",
                                                  style: robotoBold.copyWith(
                                                      color: Colors.white,
                                                      fontSize: Dimensions
                                                          .FONT_SIZE_EXTRA_LARGE)),
                                            ),
                                          )
                                        ],
                                      ),
                                    ],
                                  ),
                                  const Spacer(),
                                  Padding(
                                    padding: const EdgeInsets.all(8.0),
                                    child: Column(
                                      children: [
                                        InkWell(
                                          onTap: () {
                                            cartController.settotalPrice(
                                                cartController.totalPrice! -
                                                    int.parse(cartController
                                                        .cart[index]['price']
                                                        .toString()));
                                            cartController
                                                .removeFromCart(index);
                                            cartController.setCartCount(
                                                cartController.cartCount! - 1);
                                          },
                                          child: const Icon(Icons.delete,
                                              size: 40, color: Colors.red),
                                        )
                                      ],
                                    ),
                                  )
                                ],
                              ));
                        },
                      )),
                      Container(
                        padding: EdgeInsets.all(15),
                        height: 250,
                        width: MediaQuery.of(context).size.width,
                        decoration: const BoxDecoration(
                            color: Colors.white,
                            boxShadow: [
                              BoxShadow(
                                  offset: Offset(3, 3),
                                  color: Colors.black12,
                                  spreadRadius: 1,
                                  blurRadius: 5)
                            ],
                            borderRadius: BorderRadius.only(
                                topLeft: Radius.circular(
                                    Dimensions.RADIUS_EXTRA_LARGE),
                                topRight: Radius.circular(
                                    Dimensions.RADIUS_EXTRA_LARGE))),
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                          children: [
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text("Sub Total",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                                Text("\$${cartController.totalPrice}",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                              ],
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text("HST",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                                Text("13%",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                              ],
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text("Total Price",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                                Text(
                                    "\$${cartController.totalPrice! + (0.13 * cartController.totalPrice!)}",
                                    style: robotoBold.copyWith(
                                        // color: Colors.white,
                                        fontSize:
                                            Dimensions.FONT_SIZE_EXTRA_LARGE)),
                              ],
                            ),
                            const SizedBox(width: 50),
                            Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: [
                                  Row(
                                    children: [
                                      Text("Credit Card",
                                          style: robotoBold.copyWith(
                                              color: cartController.creditCard!
                                                  ? Theme.of(context)
                                                      .primaryColor
                                                  : Colors.black,
                                              fontSize: Dimensions
                                                  .FONT_SIZE_EXTRA_LARGE)),
                                      Checkbox(
                                        shape: CircleBorder(),
                                        activeColor:
                                            Theme.of(context).primaryColor,
                                        checkColor: Theme.of(context).cardColor,
                                        value: cartController.creditCard,
                                        onChanged: (bool? value) {
                                          cartController
                                              .toggleCreditCard(value);
                                        },
                                      ),
                                    ],
                                  ),
                                  const SizedBox(width: 30),
                                  Row(children: [
                                    Text("E-transfer",
                                        style: robotoBold.copyWith(
                                            color: cartController.eTransfer!
                                                ? Theme.of(context).primaryColor
                                                : Colors.black,
                                            fontSize: Dimensions
                                                .FONT_SIZE_EXTRA_LARGE)),
                                    Checkbox(
                                      shape: CircleBorder(),
                                      activeColor:
                                          Theme.of(context).primaryColor,
                                      checkColor: Theme.of(context).cardColor,
                                      value: cartController.eTransfer,
                                      onChanged: (bool? value) {
                                        cartController.toggleETransfer(value);
                                      },
                                    ),
                                  ]),
                                ]),
                            Padding(
                              padding: const EdgeInsets.all(20.0),
                              child: CustomButton(
                                buttonText:
                                    "${English.checkout} ( \$${cartController.totalPrice!} )",
                                onPressed: () =>
                                    proceedToCheckOut(cartController),
                              ),
                            )
                          ],
                        ),
                      )
                    ],
                  )
                : const Center(child: Text("Cart is Empty")),
          );
        });
  }

  proceedToCheckOut(CartController cartController) async {
    if (cartController.creditCard!) {
      Get.dialog(CreditCardFiledDialogue());
      if (cartController.formValue == "credit") {
        cartController.cart.clear();
        cartController.setCartCount(0);
        cartController.settotalPrice(0);
        showCustomSnackBar("Data Saved", isError: false);
        Get.off(const OrderSuccessScreen());
      }
    } else {
      Get.dialog(ETransferFiledDialogue());
      if (cartController.formValue == "etrans") {
        cartController.setCartCount(0);
        cartController.cart.clear();
        cartController.settotalPrice(0);
        showCustomSnackBar("Order Placed Successfully", isError: false);
        Get.off(const OrderSuccessScreen());
      }
    }
  }
}
