import 'package:ecommerce/data/model/product_model.dart';
import 'package:flutter/src/widgets/container.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_app_bar.dart';
import 'package:ecommerce/view/screens/home/Widgets/body_widgets.dart';
import 'package:ecommerce/view/screens/home/Widgets/cart_bucket_view.dart';
import 'package:flutter/material.dart';
import 'package:get/get_state_manager/get_state_manager.dart';

class CategoryItemScreen extends StatelessWidget {
  final List<ProductModel>? category;
  const CategoryItemScreen({super.key, this.category});

  @override
  Widget build(BuildContext context) {
    return GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
          return Scaffold(
            backgroundColor: Colors.grey[200],
            appBar: CustomAppBar(
                title: English.categories,
                isBackButtonExist: true,
                menuWidget: const CartBucketView()),
            body: DashBoardBodyWidget(
              category: category,isDashboard: false,
            ),
          );
        });
  }
}
