import 'package:ecommerce/controller/cart_controller.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_snackbar.dart';
import 'package:ecommerce/view/common_widgets/custom_text_field.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

class CreditCardFiledDialogue extends StatelessWidget {
  final FocusNode _emailFocus = FocusNode();
  final FocusNode _nameFocus = FocusNode();
  final FocusNode _addressFocus = FocusNode();
  final FocusNode _cityFocus = FocusNode();
  final FocusNode _provinceFocus = FocusNode();
  final FocusNode _countryFocus = FocusNode();
  final FocusNode _creditCardNoFocus = FocusNode();
  final FocusNode _cvcFocus = FocusNode();
  final FocusNode _expiryFocus = FocusNode();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _addressController = TextEditingController();
  final TextEditingController _cityController = TextEditingController();
  final TextEditingController _provinceController = TextEditingController();
  final TextEditingController _countryController = TextEditingController();
  final TextEditingController _creditCardNoController = TextEditingController();
  final TextEditingController _cvcController = TextEditingController();
  final TextEditingController _expiryController = TextEditingController();
  
  CreditCardFiledDialogue({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GetBuilder<CartController>(
        init: CartController(),
        builder: (cartController) {
        return Dialog(
          shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(Dimensions.RADIUS_SMALL)),
          insetPadding: const EdgeInsets.all(30),
          clipBehavior: Clip.antiAliasWithSaveLayer,
          child: ListView(
            children: [
              Container(
                padding: const EdgeInsets.all(12.0),
                height: MediaQuery.of(context).size.height * .05,
                width: MediaQuery.of(context).size.width,
                color: Theme.of(context).primaryColor,
                child: Text("Fill Info To Complete Purchase with Credit Card",
                    style: robotoBold.copyWith(
                        // color: Colors.white,
                        fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE)),
              ),
              Container(
                padding: const EdgeInsets.all(12.0),
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
                  const SizedBox(
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
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.email,
                    controller: _emailController,
                    focusNode: _emailFocus,
                    nextFocus: _addressFocus,
                    inputType: TextInputType.emailAddress,
                    // prefixIcon: Images.mail,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.address,
                    controller: _addressController,
                    focusNode: _addressFocus,
                    nextFocus: _cityFocus,
                    inputType: TextInputType.text,
                    // prefixIcon: Images.arabic,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.city,
                    controller: _cityController,
                    focusNode: _cityFocus,
                    nextFocus: _provinceFocus,
                    inputType: TextInputType.text,
                    // prefixIcon: Images.english,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.province,
                    controller: _provinceController,
                    focusNode: _provinceFocus,
                    nextFocus: _countryFocus,
                    inputType: TextInputType.text,
                    // prefixIcon: Images.english,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.country,
                    controller: _countryController,
                    focusNode: _countryFocus,
                    nextFocus: _creditCardNoFocus,
                    inputType: TextInputType.text,
                    // prefixIcon: Images.english,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.credit_card_no,
                    controller: _creditCardNoController,
                    focusNode: _creditCardNoFocus,
                    nextFocus: _cvcFocus,
                    inputType: TextInputType.number,
                    // prefixIcon: Images.credit_card,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.cvc,
                    controller: _cvcController,
                    focusNode: _cvcFocus,
                    nextFocus: _expiryFocus,
                    inputType: TextInputType.number,
                    // prefixIcon: Images.credit_card,
                    divider: true,
                  ),
                  const SizedBox(
                    height: 12,
                  ),
                  CustomTextField(
                    hintText: English.expiry_date,
                    controller: _expiryController,
                    focusNode: _expiryFocus,
                    // nextFocus: _passwordFocus,
                    inputType: TextInputType.number,
                    // prefixIcon: Images.credit_card,
                    divider: true,
                    inputAction: TextInputAction.done,
                  ),
                  // const SizedBox(height: 15),
                ]),
              ),
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
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
                        } else if (_addressController.text.isEmpty) {
                          showCustomSnackBar(English.address);
                        } else if (_cityController.text.isEmpty) {
                          showCustomSnackBar(English.address);
                        } else if (_countryController.text.isEmpty) {
                          showCustomSnackBar(English.address);
                        } else if (_creditCardNoController.text.length < 16 ||
                            _creditCardNoController.text.length > 16) {
                          showCustomSnackBar(English.credit_card_no);
                        } else if (_cvcController.text.length > 4 ||_cvcController.text.length < 3) {
                          showCustomSnackBar(English.cvc);
                        } else if (_expiryController.text.isEmpty) {
                          showCustomSnackBar(English.expiry_date);
                        } else {
                           cartController.setFormValue("credit");
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
        );
      }
    );
  }
}
