const populateCart = cartImg => {
  let id = cartImg.parentElement.parentElement.parentElement
      .querySelector("[data-product-id]")
      .getAttribute("data-product-id"),
    cart = JSON.parse(localStorage.getItem("assuranceCart")) || new Array();

  cart =
    typeof cart !== "object" ? "" : cart.includes(id) ? cart : [...cart, id];

  if (sessionID !== "") {
    //send to db
  } else {
    localStorage.setItem("assuranceCart", JSON.stringify(cart));
  }
  //   url = `${actionsRoot}/populate.action.php?PRODUCT_CATEGORY=${cat}&PRODUCT_BRAND=${brands}&PRODUCT_PRICE=${priceRange}&PRODUCT_COUNT=${pCount}&PRODUCT_STEP=${step}`;

  //   $.ajax({
  //     url
  //   })
  //     .done(data => {
  //       data = JSON.parse(data);
  //       url = new URL(window.location.href);

  //       let host = url.origin.includes("localhost")
  //           ? "http://localhost/assurancediapers/"
  //           : "https://assurancediapers.com/",
  //         res =
  //           Number(data[0]) > 0
  //             ? data[1]
  //             : `<div class='col text-center'><p>No products found for this selection </p></div>`;

  //       productsDiv.html(res);

  //       window.history.pushState(
  //         "object or string",
  //         "Title",
  //         `${host}store/shop?cat=${cat}&brands=${brands}&priceRange=${priceRange}&count=${pCount}&step=${step}`
  //       );

  //       renderPages(Number(data[0]), pCount, step);
  //     })
  //     .error(err => console.log(err));
};
