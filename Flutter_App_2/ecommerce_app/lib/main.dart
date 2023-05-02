import 'package:ecommerce/controller/auth_controller.dart';
import 'package:ecommerce/theme/dark_theme.dart';
import 'package:ecommerce/theme/light_theme.dart';
import 'package:ecommerce/util/app_constants.dart';
import 'package:flutter/material.dart';
import 'package:get/get_state_manager/src/simple/get_state.dart';
import 'package:get/route_manager.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import 'controller/theme_controller.dart';
import 'view/screens/splash/splash_screen.dart';
import 'helper/get_di.dart' as di;

Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();
  SharedPreferences? sharedPreferences = await SharedPreferences.getInstance();
  runApp( MyApp(sharedPreferences:sharedPreferences));
}

class MyApp extends StatelessWidget {
  const MyApp({super.key,required this.sharedPreferences});
  final SharedPreferences sharedPreferences;
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return GetBuilder<ThemeController>(
      init: ThemeController(sharedPreferences: sharedPreferences),
      builder: (themeController,) {
      return GetMaterialApp(
        title: AppConstants.APP_NAME,
        debugShowCheckedModeBanner: false,
        theme: themeController.darkTheme ? dark : light,
        home: const SplashScreen(),
        defaultTransition: Transition.topLevel,
        transitionDuration: const Duration(milliseconds: 500),
        // key: Get.key,
      );
    });
  }
}
