// SELECT ELEMENTS
const cartItemsEl = document.querySelector(".cart-items");
const subtotalEl = document.querySelector(".subtotal");
const totalpriceEl = document.querySelector(".total-price");
const totalItemsInCartEl = document.querySelector(".total-items-in-cart");
const proceedCheckoutEl = document.querySelector(".proceed-checkout");

// cart array
let cart = JSON.parse(localStorage.getItem("CART")) || [];
updateCart();


// update cart
function updateCart() {
  renderCartItems();
  renderSubtotal();

  // save cart to local storage
  localStorage.setItem("CART", JSON.stringify(cart));
}

// calculate and render subtotal
function renderSubtotal() {
  let totalPrice = 0,
    totalItems = 0;

  cart.forEach((item) => {
    totalPrice += item.price * item.numberOfUnits;
    totalItems += parseInt(item.numberOfUnits);
	
  });

  subtotalEl.innerHTML = `<b>$${totalPrice.toFixed(2)}</b>`;
  totalItemsInCartEl.innerHTML = totalItems;
}

// render cart items
function renderCartItems() {
	cartItemsEl.innerHTML = ""; // clear cart element
  
    if (typeof cart !== 'undefined' && cart.length > 0) {
		cartItemsEl.innerHTML = `<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
				    </tr>`; // clear cart element
	  
		cart.forEach((item) => {
		cartItemsEl.innerHTML += 
            `<tr>
			<td>
				<div class="cart-info">
					<img src="${item.imgSrc}" alt="${item.name}">
					<div>
						<p><b>${item.name}</b></p>
						
						<small><b>Size:</b> ${item.size} </small>
						<br>
						<small><b>Color:</b> ${item.color} </small>
						<br>
						<a href="#" onclick="removeItemFromCart(${item.id})"><b>Remove</b></a>
					</div>
				</div>
			</td>
			<td><div class="units">
					<div class="btnplusminus minus" onclick="changeNumberOfUnits('minus', ${item.id})">-</div>
					<span class="number">${item.numberOfUnits}</span>
					<div class="btnplusminus plus" onclick="changeNumberOfUnits('plus', ${item.id})">+</div>           
				</div></td>
			<td><b>$${item.price}</b></td>
			<td><b>$${item.price * item.numberOfUnits}</b></td>
        </tr>`;
		});
	}else{

		cartItemsEl.innerHTML = "<h2>Your cart is empty.</h2>";
		totalpriceEl.style.display = 'none';
		proceedCheckoutEl.style.display = 'none';
	}
}

// remove item from cart
function removeItemFromCart(id) {
  cart = cart.filter((item) => item.id !== id);

  updateCart();
}

// change number of units for an item
function changeNumberOfUnits(action, id) {
  cart = cart.map((item) => {
    let numberOfUnits = item.numberOfUnits;

    if (item.id === id) {
      if (action === "minus" && numberOfUnits > 1) {
        numberOfUnits--;
      } else if (action === "plus") {
        numberOfUnits++;
      }
    }

    return {
      ...item,
      numberOfUnits,
    };
  });

  updateCart();
}
