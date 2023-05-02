import 'dart:async';

import 'package:ecommerce/controller/sharedPrefController.dart';
import 'package:ecommerce/util/app_constants.dart';
import 'package:ecommerce/util/dimensions.dart';
import 'package:ecommerce/util/images.dart';
import 'package:ecommerce/util/styles.dart';
import 'package:ecommerce/view/screens/auth/sign_in_screen.dart';
import 'package:ecommerce/view/screens/home/dashboard.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class SplashScreen extends StatefulWidget {
  const SplashScreen({Key? key}) : super(key: key);

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen> {
  LocalStorageClass? localStorageClass=LocalStorageClass();
  @override
  void initState() {
    getUserData();
    super.initState();
  }

  getUserData() async {
    String? token =
        await localStorageClass!.getData(localStorageClass!.tokenKey);
    if (token != null) {
      startTime(true);
    }
    else{
       startTime(false);
    }
  }

  startTime(bool? isSignIn) async {
    await Future.delayed(const Duration(seconds: 2), () {
      Navigator.pushReplacement(
          context,
          MaterialPageRoute(
              builder: (contetx) =>
                  isSignIn! ? const DashBoard() : SignInScreen()));
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Padding(
          padding: const EdgeInsets.all(Dimensions.PADDING_SIZE_LARGE),
          child: Column(mainAxisSize: MainAxisSize.min, children: [
            Image.asset(Images.logo,
                width: 200, color: Theme.of(context).primaryColor),
            // SizedBox(height: Dimensions.PADDING_SIZE_LARGE),
            //Text(AppConstants.APP_NAME, style: robotoMedium.copyWith(fontSize: 25), textAlign: TextAlign.center),
            const SizedBox(height: Dimensions.PADDING_SIZE_SMALL),
            Text(AppConstants.APP_NAME,
                style: robotoBold.copyWith(
                    fontSize: Dimensions.FONT_SIZE_EXTRA_LARGE),
                textAlign: TextAlign.center),
          ]),
        ),
      ),
    );
  }
}
