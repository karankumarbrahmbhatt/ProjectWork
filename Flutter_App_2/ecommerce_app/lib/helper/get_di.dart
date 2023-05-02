import 'package:ecommerce/controller/theme_controller.dart';
import 'package:get/get.dart';
import 'package:shared_preferences/shared_preferences.dart';

// Future<Map<String, Map<String, String>>>
init() async {
  final sharedPreferences = await SharedPreferences.getInstance();
  Get.put(sharedPreferences);
  Get.put(() => ThemeController(sharedPreferences: Get.find()));
}
