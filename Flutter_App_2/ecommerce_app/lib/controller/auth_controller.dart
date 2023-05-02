import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';

class AuthController extends GetxController {
  String _email = 'demo@gmail.com';
  String _password = '123456789';

  String get email => _email;
  String get password => _password;

  setEmail(String email) {
    _email = email;
    update();
  }

  setPassword(String password) {
    _password = password;
    update();
  }

  bool? _isLoading = false;

  bool? get isLoading => _isLoading;

  setLoading(bool? value) {
    _isLoading = value;
    update();
  }

  // login(String? email,String? password)async{
  //   notifyListeners();
  //   return null;

  // }
}
