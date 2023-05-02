import 'package:ecommerce/data/model/product_model.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/screens/home/category_item.dart';
import 'package:ecommerce/view/screens/home/product_description_scree.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/container.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:get/get.dart';

class DashBoardBodyWidget extends StatelessWidget {
  final List<ProductModel>? category;
  final bool? isDashboard;
  const DashBoardBodyWidget({super.key, this.category, this.isDashboard});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.all(10),
      child: GridView.builder(
        gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
            crossAxisCount: 2,
            childAspectRatio: (1 / 1.2),
            mainAxisSpacing: 8,
            crossAxisSpacing: 8),
        itemCount: category!.length,
        shrinkWrap: true,
        itemBuilder: (context, index) {
          return InkWell(
            onTap: () {
              Get.to(isDashboard!
                  ? CategoryItemScreen(
                      category: categoriesList[index],
                    )
                  : ProductDescriptionScreen(
                      itemDescription: remoteProduct[index]));
            },
            child: Container(
              // padding: EdgeInsets.only(bottom:12,),
              decoration: BoxDecoration(
                  // boxShadow: [
                  //   BoxShadow(
                  //     offset: Offset(3, 3),
                  //     color:
                  //   )
                  // ],
                  color: Colors.white,
                  borderRadius:
                      BorderRadius.circular(Dimensions.RADIUS_DEFAULT)),
              child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      height: MediaQuery.of(context).size.height * .14,
                      decoration: BoxDecoration(
                          // color: Colors.red,
                          image: DecorationImage(
                              image: AssetImage("${category![index].icon}"))),
                    ),
                    Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Text("${category![index].title}",
                          style: robotoBold.copyWith(
                            fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE,
                          )),
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.end,
                      children: [
                        Padding(
                          padding: const EdgeInsets.all(8.0),
                          child: Text("\$ ${category![index].price}",
                              style: robotoBold.copyWith(
                                fontSize: Dimensions.FONT_SIZE_SMALL,
                              )),
                        ),
                      ],
                    )
                  ]),
            ),
          );
        },
      ),
    );
  }
}
