import 'package:ecommerce/data/model/product_model.dart';
import 'package:get/get.dart';

class CartController extends GetxController {
  List<Map<String, dynamic>> cart = [];

  String? _formValue;
  String? get formValue => _formValue;
  setFormValue(value) {
    _formValue = value;
    update();
  }

  int? _cartCount = 0;
  int? get cartCount => _cartCount;

  int? _productCount = 1;
  int? get productCount => _productCount;

  int? _totalPrice = 0;
  int? get totalPrice => _totalPrice;

  bool? _creditCard = true;
  bool? get creditCard => _creditCard;

  bool? _eTransfer = false;
  bool? get eTransfer => _eTransfer;

  toggleCreditCard(bool? value) async {
    _creditCard = value;
    _eTransfer = false;
    update();
  }

  toggleETransfer(bool? value) async {
    _eTransfer = value;
    _creditCard = false;
    update();
  }

  settotalPrice(int? price) async {
    _totalPrice = price;
    update();
  }

  setproductCount(int? count) async {
    _productCount = count;
    update();
  }

  setCartCount(int? count) async {
    if (count! >= 0) {
      _cartCount = count;
      update();
    }
    else{
      _cartCount = 0;
      update();
    }
  }

  removeFromCart(int index) async {
    cart.removeAt(index);
    update();
  }
}
