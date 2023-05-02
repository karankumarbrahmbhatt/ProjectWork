import 'dart:developer';

import 'package:ecommerce/util/app_constants.dart';
import 'package:flutter/foundation.dart';
import 'package:get/get.dart';
import 'package:shared_preferences/shared_preferences.dart';
class ThemeController extends GetxController {
  final SharedPreferences? sharedPreferences;
  ThemeController({@required this.sharedPreferences}) {
    _loadCurrentTheme();
  }

  bool _darkTheme = false;
  bool get darkTheme => _darkTheme;

  void toggleTheme() async{
    _darkTheme = !_darkTheme;
  await sharedPreferences!.setBool(AppConstants.THEME, _darkTheme);
    update();
  }

  void _loadCurrentTheme() async {
    _darkTheme = sharedPreferences!.getBool(AppConstants.THEME) ?? false;
    log(_darkTheme.toString());
    update();
  }
}
