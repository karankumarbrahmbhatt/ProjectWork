import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_snackbar.dart';
import 'package:ecommerce/view/common_widgets/custom_text_field.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

class ETransferFiledDialogue extends StatelessWidget {
  final FocusNode _emailFocus = FocusNode();
  final FocusNode _nameFocus = FocusNode();
  final FocusNode _creditCardNoFocus = FocusNode();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _creditCardNoController = TextEditingController();
  ETransferFiledDialogue({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return  GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
        return Dialog(
          shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(Dimensions.RADIUS_SMALL)),
          insetPadding: const EdgeInsets.all(30),
          clipBehavior: Clip.antiAliasWithSaveLayer,
          child: SizedBox(
            height: MediaQuery.of(context).size.height * .4,
            child: ListView(
              children: [
                Container(
                  padding: EdgeInsets.all(12.0),
                  height: MediaQuery.of(context).size.height * .05,
                  width: MediaQuery.of(context).size.width,
                  color: Theme.of(context).primaryColor,
                  child: Text("Fill Info To Complete Purchase with Etransfer",
                      style: robotoBold.copyWith(
                          // color: Colors.white,
                          fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
                ),
                Container(
                  padding: EdgeInsets.all(12.0),
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(Dimensions.RADIUS_SMALL),
                    color: Theme.of(context).cardColor,
                    boxShadow: [
                      BoxShadow(
                          color: Colors.grey[Get.isDarkMode ? 800 : 200]!,
                          spreadRadius: 1,
                          blurRadius: 5)
                    ],
                  ),
                  child: Column(children: [
                    SizedBox(
                      height: 12,
                    ),
                    CustomTextField(
                      hintText: English.enter_your_name,
                      controller: _nameController,
                      focusNode: _nameFocus,
                      nextFocus: _emailFocus,
                      inputType: TextInputType.text,
                      // prefixIcon: Images.english,
                      divider: true,
                    ),
                    SizedBox(
                      height: 12,
                    ),
                    CustomTextField(
                      hintText: English.email,
                      controller: _emailController,
                      focusNode: _emailFocus,
                      nextFocus: _creditCardNoFocus,
                      inputType: TextInputType.emailAddress,
                      // prefixIcon: Images.mail,
                      divider: true,
                    ),
                    SizedBox(
                      height: 12,
                    ),
                    CustomTextField(
                      hintText: English.credit_card_no,
                      controller: _creditCardNoController,
                      focusNode: _creditCardNoFocus,
                      inputType: TextInputType.number,
                      inputAction: TextInputAction.done,
                      // prefixIcon: Images.credit_card,
                      divider: true,
                    ),
                    // const SizedBox(height: 15),
                  ]),
                ),
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.end,
                    children: [
                      // Spacer(),
                      InkWell(
                        onTap: () {
                          Get.back();
                        },
                        child: Text("CANCEL",
                            style: robotoBold.copyWith(
                                color: Colors.red,
                                fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
                      ),
                      const SizedBox(width: 50),
    
                      InkWell(
                        onTap: () {
                          if (_nameController.text.isEmpty) {
                            showCustomSnackBar(English.enter_your_name);
                          } else if (_emailController.text.isEmpty) {
                            showCustomSnackBar(English.enter_email_address);
                          } else if (!GetUtils.isEmail(_emailController.text)) {
                            showCustomSnackBar(English.enter_a_valid_email_address);
                          } else if (_creditCardNoController.text.length < 16 ||
                              _creditCardNoController.text.length > 16) {
                            showCustomSnackBar(English.credit_card_no);
                          } else {
                            cartController.setFormValue("etrans");
                            Get.back();
                            
                          }
                        },
                        child: Text("PROCEED",
                            style: robotoBold.copyWith(
                                color: Theme.of(context).primaryColor,
                                fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
                      ),
                    ],
                  ),
                )
              ],
            ),
          ),
        );
      }
    );
  }
}
