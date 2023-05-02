import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/screens/home/cart_view_screen.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

class CartBucketView extends StatelessWidget {
  const CartBucketView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
          return InkWell(
            onTap: (){
              Get.to(const CartViewScreen());
            },
            child: Padding(
              padding: EdgeInsets.all(cartController.cartCount != 0 ? 5 : 0),
              child: Stack(
                alignment: Alignment.topRight,
                children: [
                  Image.asset(
                    Images.cart,
                    width: 70,
                    color: Theme.of(context).cardColor,
                  ),
                  cartController.cartCount != 0
                      ? Container(
                          padding: const EdgeInsets.all(5),
                          decoration: const BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.red,
                          ),
                          child: Text(
                            "${cartController.cartCount}",
                            style: robotoMedium.copyWith(
                                color: Colors.white,
                                fontSize: Dimensions.FONT_SIZE_SMALL),
                          ),
                        )
                      : const SizedBox()
                ],
              ),
            ),
          );
        });
  }
}
