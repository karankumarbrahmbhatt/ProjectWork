import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/data/model/product_model.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_app_bar.dart';
import 'package:ecommerce/view/common_widgets/custom_button.dart';
import 'package:ecommerce/view/common_widgets/custom_snackbar.dart';
import 'package:ecommerce/view/screens/home/Widgets/cart_bucket_view.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

class ProductDescriptionScreen extends StatefulWidget {
  const ProductDescriptionScreen({Key? key, required this.itemDescription})
      : super(key: key);
  final ProductModel? itemDescription;

  @override
  State<ProductDescriptionScreen> createState() =>
      _ProductDescriptionScreenState();
}

class _ProductDescriptionScreenState extends State<ProductDescriptionScreen> {
  @override
  void initState() {
    callCartUpdate();
    super.initState();
  }
callCartUpdate(){
  Get.find<CartController>().setproductCount(1);
}
  @override
  Widget build(BuildContext context) {
    return GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
          // cartController.setproductCount(1);
          return Scaffold(
            backgroundColor: Colors.white,
            appBar: CustomAppBar(
              title: widget.itemDescription!.title,
              isBackButtonExist: true,
              menuWidget: const CartBucketView(),
            ),
            body: ListView(
              padding: EdgeInsets.all(0),
              children: [
                Container(
                  height: MediaQuery.of(context).size.height * .45,
                  decoration: BoxDecoration(
                      // color: Colors.red,
                      image: DecorationImage(
                          image:
                              AssetImage("${widget.itemDescription!.icon}"))),
                ),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    InkWell(
                      onTap: () {
                        if (cartController.productCount! > 1) {
                          cartController.setproductCount(
                              cartController.productCount! - 1);
                        }
                      },
                      child: Container(
                        height: 50,
                        width: 60,
                        alignment: Alignment.center,
                        decoration: BoxDecoration(
                          color: Theme.of(context).primaryColor,
                          borderRadius:
                              BorderRadius.circular(Dimensions.RADIUS_SMALL),
                        ),
                        child: Text("-",
                            style: robotoBold.copyWith(
                                color: Colors.white,
                                fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
                      ),
                    ),
                    SizedBox(
                      width: 20,
                    ),
                    Text("${cartController.productCount}",
                        style: robotoBold.copyWith(
                            decoration: TextDecoration.underline)),
                    SizedBox(
                      width: 20,
                    ),
                    InkWell(
                      onTap: () {
                        cartController
                            .setproductCount(cartController.productCount! + 1);
                      },
                      child: Container(
                        height: 50,
                        width: 60,
                        alignment: Alignment.center,
                        decoration: BoxDecoration(
                          color: Theme.of(context).primaryColor,
                          borderRadius:
                              BorderRadius.circular(Dimensions.RADIUS_SMALL),
                        ),
                        child: Text("+",
                            style: robotoBold.copyWith(
                                color: Colors.white,
                                fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
                      ),
                    )
                  ],
                ),
                SizedBox(
                  height: 30,
                ),
                Column(
                  children: [
                    Text("${widget.itemDescription!.title}",
                        style: robotoBold.copyWith(
                          fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE,
                        )),
                    SizedBox(
                      height: 30,
                    ),
                    Text("\$ ${widget.itemDescription!.price}",
                        style: robotoBold.copyWith(
                          fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE,
                        )),
                    SizedBox(
                      height: 20,
                    ),
                    Padding(
                      padding: const EdgeInsets.all(12.0),
                      child: Text("${widget.itemDescription!.description}",
                          style: robotoBold.copyWith(
                            fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE,
                          )),
                    ),
                    SizedBox(
                      height: 30,
                    ),
                    Padding(
                      padding: const EdgeInsets.all(12.0),
                      child: CustomButton(
                        buttonText: English.add_item,
                        onPressed: () => addToCart(cartController),
                      ),
                    )
                  ],
                )
              ],
            ),
          );
        });
  }

  addToCart(CartController cartController) {
    // var itemFound = cartController.cartList!
    //     .where((element) => element.id == itemDescription!.id!);
    // print("123: " + itemFound.toString());
    // if (itemFound.isEmpty) {

    //   cartController.setCartCount(
    //       cartController.cartCount! + cartController.productCount!);
    // }

    // var val= cartController.cart.containsKey(itemDescription!.id);

    // print("---------------------------");
    print("current id: " + widget.itemDescription!.id.toString());
    // print("---------------------------");
    var result = false;
    var index = -1;
    for (int i = 0; i < cartController.cart.length; i++) {
      // print("$i: "+cartController.cart[i].keys.toString());

      result = cartController.cart[i].keys.first == widget.itemDescription!.id;

      // print("$i: "+result.toString());

      if (cartController.cart[i].keys.first == widget.itemDescription!.id) {
        index = i;
      }
    }
    // debugPrint("--------------------------------");
    // debugPrint(result.toString());
    // debugPrint(index.toString());
    // debugPrint("--------------------------------");
    if (result) {
      // debugPrint("--------------------------------");
      // debugPrint("if");
      // debugPrint("--------------------------------");
      cartController.cart[index]['count'] += cartController.productCount;
      cartController.cart[index]['price'] +=
          (int.parse(widget.itemDescription!.price.toString()) *
              cartController.productCount!);
    } else {
      // debugPrint("--------------------------------");
      // debugPrint("else");
      // debugPrint("--------------------------------");
      cartController.cart.add({
        widget.itemDescription!.id!: widget.itemDescription,
        "count": cartController.productCount,
        "price": int.parse(widget.itemDescription!.price.toString()) *
            cartController.productCount!
      });
      cartController.setCartCount(cartController.cartCount! + 1);
    }

    cartController.settotalPrice(
      cartController.totalPrice! 
      +
      (int.parse(widget.itemDescription!.price.toString()) 
      *
      cartController.productCount!));
    showCustomSnackBar(English.product_added_successfully,isError: false);
    debugPrint("--------------------------------");
    debugPrint(result.toString());
    debugPrint(index.toString());
    debugPrint("--------------------------------");
    // cartController.cart.add({
    //   itemDescription!.id!: itemDescription,
    //   "count": cartController.productCount
    // });
    debugPrint(cartController.cart.toString());
    // debugPrint(cartController.cart[0].entries.toString());
    // setState(() {});
  }
}
