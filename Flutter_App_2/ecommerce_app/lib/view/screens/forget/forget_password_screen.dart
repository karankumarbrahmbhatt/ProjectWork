import 'package:ecommerce/controller/auth_controller.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/language/english.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/common_widgets/custom_app_bar.dart';
import 'package:ecommerce/view/common_widgets/custom_button.dart';
import 'package:ecommerce/view/common_widgets/custom_text_field.dart';
import 'package:ecommerce/view/screens/auth/sign_in_screen.dart';
import 'package:ecommerce/view/screens/auth/sign_up_screen.dart';
import 'package:ecommerce/view/screens/forget/new_passord_screen.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:provider/provider.dart';
import '../../common_widgets/custom_snackbar.dart';

class ForgetPasswordScreen extends StatelessWidget {
  final FocusNode _emailFocus = FocusNode();
  final TextEditingController _emailController = TextEditingController();

  ForgetPasswordScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return GetBuilder<AuthController>(
        init: AuthController(),
        builder: (authController) {
          return Scaffold(
            appBar: CustomAppBar(
              title: English.forgot_password,
              isBackButtonExist: true,
            ),
            body: SafeArea(
                child: Scrollbar(
              child: SingleChildScrollView(
                physics: const BouncingScrollPhysics(),
                padding: const EdgeInsets.all(Dimensions.PADDING_SIZE_SMALL),
                child: Container(
                    // color:Colors.red,
                    // width: 1170,
                    child: Column(children: [
                  Image.asset(Images.logo, width: 200,color: Theme.of(context).primaryColor,),
                  // SizedBox(height: Dimensions.PADDING_SIZE_SMALL),
                  // Center(child: Text(AppConstants.APP_NAME, style: robotoMedium.copyWith(fontSize: Dimensions.FONT_SIZE_LARGE))),
                  const SizedBox(height: Dimensions.PADDING_SIZE_EXTRA_LARGE),

                  Text(English.forgot_password,
                      style: robotoBlack.copyWith(fontSize: 30)),
                  const SizedBox(height: Dimensions.PADDING_SIZE_EXTRA_SMALL),

                  Text(
                    '',
                    textAlign: TextAlign.center,
                    style: robotoRegular.copyWith(
                        fontSize: Dimensions.FONT_SIZE_EXTRA_SMALL,
                        color: Theme.of(context).primaryColor),
                  ),
                  const SizedBox(height: 50),

                  Container(
                    decoration: BoxDecoration(
                      borderRadius:
                          BorderRadius.circular(Dimensions.RADIUS_SMALL),
                      color: Theme.of(context).cardColor,
                      boxShadow: [
                        BoxShadow(
                            color: Colors.grey[Get.isDarkMode ? 800 : 200]!,
                            spreadRadius: 1,
                            blurRadius: 5)
                      ],
                    ),
                    child: Column(children: [
                      CustomTextField(
                        hintText: English.email,
                        controller: _emailController,
                        focusNode: _emailFocus,
                        inputType: TextInputType.emailAddress,
                        prefixIcon: Images.mail,
                        divider: false,
                        inputAction: TextInputAction.done,
                      ),
                    ]),
                  ),
                  const SizedBox(height: 10),

                  Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        TextButton(
                          onPressed: () => Get.off(SignInScreen()),
                          child: Text('${English.sign_in}?'),
                        ),
                        TextButton(
                          onPressed: () => Get.off(SignUpScreen()),
                          child: Text('${English.sign_up}?'),
                        ),
                      ]),
                  const SizedBox(height: 50),

                  !authController.isLoading!
                      ? CustomButton(
                          buttonText: English.forgot_password,
                          onPressed: () => _forgot(authController),
                        )
                      : const Center(child: CircularProgressIndicator()),
                ])),
              ),
            )),
          );
        });
  }

  void _forgot(AuthController authController) async {
    String _email = _emailController.text.trim();

    if (_email.isEmpty) {
      showCustomSnackBar(English.enter_email_address);
    } else if (!GetUtils.isEmail(_email)) {
      showCustomSnackBar(English.enter_a_valid_email_address);
    } else {
      Get.to(NewPasswordScreen());
      // authController.login(_email, _password).then((status) async {
      //   if (status.isSuccess) {
      //   } else {
      //     showCustomSnackBar(status.message);
      //   }
      // });
    }
  }
}
