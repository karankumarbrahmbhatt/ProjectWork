import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_app_bar.dart';
import 'package:ecommerce/view/common_widgets/custom_button.dart';
import 'package:ecommerce/view/screens/home/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/container.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:get/get.dart';

class OrderSuccessScreen extends StatelessWidget {
  const OrderSuccessScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.grey[200],
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Spacer(),
              Image.asset(
                Images.delivery_man,
                width: 200,
                color: Theme.of(context).primaryColor,
              ),
              // SizedBox(height: Dimensions.PADDING_SIZE_SMALL),
              // Center(child: Text(AppConstants.APP_NAME, style: robotoMedium.copyWith(fontSize: Dimensions.FONT_SIZE_LARGE))),
              const SizedBox(height: Dimensions.PADDING_SIZE_EXTRA_LARGE),

              Text("Your order has been placed successfully",
                  style: robotoBlack.copyWith(
                      fontSize: Dimensions.PADDING_SIZE_EXTRA_LARGE)),
              
              Spacer(),
              Padding(
               padding: const EdgeInsets.all(Dimensions.PADDING_SIZE_LARGE),
                child: CustomButton(
                            buttonText: "Go To Dashboard",
                            onPressed: () => Get.offAll(const DashBoard()),
                          ),
              ),
              const SizedBox(height: Dimensions.PADDING_SIZE_EXTRA_LARGE),
            ],
          ),
        ));
  }
}
