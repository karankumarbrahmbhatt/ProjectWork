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
import 'package:ecommerce/view/screens/forget/forget_password_screen.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:provider/provider.dart';
import '../../common_widgets/custom_snackbar.dart';

class NewPasswordScreen extends StatelessWidget {
  final FocusNode _passwordFocus = FocusNode();
  final FocusNode _confirmPasswordFocus = FocusNode();
  final TextEditingController _passwordController = TextEditingController();
  final TextEditingController _confirmPasswordController =
      TextEditingController();

  NewPasswordScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return GetBuilder<AuthController>(
        init: AuthController(),
        builder: (authController) {
          return Scaffold(
             appBar: CustomAppBar(
              title: English.new_password,
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

                  Text(English.new_password,
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
                        hintText: English.new_password,
                        controller: _passwordController,
                        focusNode: _passwordFocus,
                        inputAction: TextInputAction.done,
                        inputType: TextInputType.visiblePassword,
                        prefixIcon: Images.lock,
                        isPassword: true,
                        nextFocus: _confirmPasswordFocus,
                        divider: true,
                      ),
                      CustomTextField(
                        hintText: English.confirm_password,
                        controller: _confirmPasswordController,
                        focusNode: _confirmPasswordFocus,
                        inputAction: TextInputAction.done,
                        inputType: TextInputType.visiblePassword,
                        prefixIcon: Images.lock,
                        isPassword: true,
                      ),
                    ]),
                  ),
                  const SizedBox(height: 10),

                  Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        TextButton(
                          onPressed: () => Get.to(ForgetPasswordScreen()),
                          child: Text('${English.forgot_password}?'),
                        ),
                        TextButton(
                          onPressed: () => Get.to(SignUpScreen()),
                          child: Text('${English.sign_up}?'),
                        ),
                      ]),
                  const SizedBox(height: 50),

                  !authController.isLoading!
                      ? CustomButton(
                          buttonText: English.sign_in,
                          onPressed: () => _login(authController),
                        )
                      : const Center(child: CircularProgressIndicator()),
                ])),
              ),
            )),
          );
        });
  }

  void _login(AuthController authController) async {
    String _password = _passwordController.text.trim();
    String _confirmPassword = _confirmPasswordController.text.trim();
    if (_password.isEmpty) {
      showCustomSnackBar(English.enter_password);
    } else if (_password.length < 6) {
      showCustomSnackBar(English.password_should_be);
    } else if (_confirmPassword.isEmpty) {
      showCustomSnackBar(English.enter_password);
    } else if (_confirmPassword.length < 6) {
      showCustomSnackBar(English.password_should_be);
    } else if (_password != _confirmPassword) {
      showCustomSnackBar(English.password_does_not_matched);
    } else {
      Get.off(SignInScreen());
    }

    /*print('------------1');
    final _imageData = await Http.get(Uri.parse('https://cdn.dribbble.com/users/1622791/screenshots/11174104/flutter_intro.png'));
    print('------------2');
    String _stringImage = base64Encode(_imageData.bodyBytes);
    print('------------3 {$_stringImage}');
    SharedPreferences _sp = await SharedPreferences.getInstance();
    _sp.setString('image', _stringImage);
    print('------------4');
    Uint8List _uintImage = base64Decode(_sp.getString('image'));
    authController.setImage(_uintImage);
    //await _thetaImage.writeAsBytes(_imageData.bodyBytes);
    print('------------5');*/
  }
}
