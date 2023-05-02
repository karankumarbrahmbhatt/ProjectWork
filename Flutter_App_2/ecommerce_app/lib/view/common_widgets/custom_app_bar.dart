import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

class CustomAppBar extends StatelessWidget implements PreferredSizeWidget {
  final String? title;
  final bool? isBackButtonExist;
  final Widget? menuWidget;
  const CustomAppBar(
      {super.key, @required this.title, this.isBackButtonExist = true, this.menuWidget});

  @override
  Widget build(BuildContext context) {
    return AppBar(
      
      title: Text(title!,
          style: robotoBold.copyWith(
              fontSize: Dimensions.FONT_SIZE_LARGE,
              color: Theme.of(context).cardColor)),
      centerTitle: true,
      leading: isBackButtonExist!
          ? IconButton(
              icon: const Icon(Icons.arrow_back_ios),
              color: Theme.of(context).cardColor,
              onPressed: () => Get.back(),
            )
          : const SizedBox(),
      backgroundColor: Theme.of(context).primaryColor,
      elevation: 0,
      actions: menuWidget != null ? [menuWidget!] : null,
    );
  }

  @override
  Size get preferredSize => Size(1170, GetPlatform.isDesktop ? 70 : 50);
}
