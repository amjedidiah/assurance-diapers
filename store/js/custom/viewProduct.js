(function() {
  let url = new URL(window.location.href),
    id = url.searchParams.get("id");
  url = `${actionsRoot}/product_fetch.action.php?id=${id}`;

  id === null
    ? (window.location.href = "./")
    : $.ajax({
        url
      })
        .done(data => {
          let {
              ID,
              PRODUCT_BRAND,
              PRODUCT_NAME,
              PRODUCT_PRICE,
              PRODUCT_DESC,
              PRODUCT_QTY,
              PRODUCT_AVAILABILITY
            } = JSON.parse(data),
            availabilityClass =
              PRODUCT_AVAILABILITY === "1" ? "" : "text-danger",
            availabilityText =
              PRODUCT_AVAILABILITY === "1" ? "In stock" : "Out of stock";

          $(".product-brand")
            .find("a")
            .attr(
              "href",
              `./shop?cat=Diapers&brands=${PRODUCT_BRAND}&priceRange=2000AlphaEchoJalingo@60484000&count=1&step=0`
            )
            .html(PRODUCT_BRAND);

          $(".product-name").html(PRODUCT_NAME);
          $(".product-price").html(PRODUCT_PRICE);
          $(".product-desc").html(PRODUCT_DESC);
          $(".product-qty").attr("max", PRODUCT_QTY);
          $(".product-availability").find("i").addClass(availabilityClass);
          $(".product-availability").find("span").html(availabilityText);

          getProductImages(ID);
        })
        .error(err => console.log(err));
})();

const getProductImages = id => {
  let url = `${actionsRoot}/images_fetch.action.php?id=${id}`;

  $.ajax({
    url
  })
    .done(data => {
      let imageIndicatorList = "",
        imageList = "";
      JSON.parse(data).forEach(({ IMAGE_LOCATION_STRING }, i) => {
        let active = i === 0 ? "active" : "",
          path = `../img/products/${IMAGE_LOCATION_STRING}`;

        imageIndicatorList += `<li class="${active}" data-target="#product_details_slider" data-slide-to="${i}"
        style="background-image: url(${path});">
    </li>`;
        imageList += `<div class="carousel-item ${active}">
        <a class="gallery_img" href="${path}">
            <img class="d-block w-100" src="${path}"
                alt="${i}th slide">
        </a>
    </div>
    `;
      });
      $(".product-images-li").html(imageIndicatorList);
      $(".product-images").html(imageList);
    })
    .error(err => console.log(err));
};
