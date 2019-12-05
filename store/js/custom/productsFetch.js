let countRenderPagesExec = 0;

const togglePages = target => {
  let url = new URL(window.location.href),
    brands = url.searchParams.get("brands"),
    cat = url.searchParams.get("cat"),
    priceRange = url.searchParams.get("priceRange"),
    pCount = url.searchParams.get("count"),
    step = (Number(target.querySelector("a").innerHTML) - 1) * pCount;

  $(".pagination .page-item").removeClass("active");

  target.classList.add("active");

  productsFetch(actionsRoot, cat, brands, priceRange, pCount, step);
};

const renderPages = (total, count, step) => {
  let pagesList = "",
    pages = total / count;

  if (pages > 0) {
    pages = Math.ceil(pages);
    for (let i = 0; i < pages; i++) {
      let l = i + 1;
      l = l < 10 ? `0${l}` : l;
      pagesList += `
      <li class="page-item ${
        Number(l) === Math.floor(step / count) + 1 ? "active" : ""
      }" onClick="togglePages(this)"><a class="page-link" href="#">${l}.</a></li>`;
    }
  }

  $(".pagination").html(pagesList);

  if (pages === 1 && countRenderPagesExec === 0) {
    togglePages(document.querySelector(".pagination .page-item"));
    countRenderPagesExec++;
  }
};

const productsFetch = (actionsRoot, cat, brands, priceRange, pCount, step) => {
  let productsDiv = $("#productsDiv"),
    url = `${actionsRoot}/products_fetch.action.php?PRODUCT_CATEGORY=${cat}&PRODUCT_BRAND=${brands}&PRODUCT_PRICE=${priceRange}&PRODUCT_COUNT=${pCount}&PRODUCT_STEP=${step}`;
  $.ajax({
    url
  })
    .done(data => {
      data = JSON.parse(data);
      url = new URL(window.location.href);

      let host = url.origin.includes("localhost")
          ? "http://localhost/assurancediapers/"
          : "https://assurancediapers.com/",
        res =
          Number(data[0]) > 0
            ? data[1]
            : `<div class='col text-center'><p>No products found for this selection </p></div>`;

      productsDiv.html(res);

      window.history.pushState(
        "object or string",
        "Title",
        `${host}store/shop?cat=${cat}&brands=${brands}&priceRange=${priceRange}&count=${pCount}&step=${step}`
      );

      renderPages(Number(data[0]), pCount, step);
    })
    .error(err => console.log(err));
};

//Fetching products on category click
const catProductsFetch = catBtn => {
  let url = new URL(window.location.href),
    cat = catBtn.querySelector("a").innerHTML,
    priceRange = url.searchParams.get("priceRange"),
    brands = url.searchParams.get("brands"),
    pCount = url.searchParams.get("count"),
    step = url.searchParams.get("step");

  $("#catsList")
    .find("li")
    .removeClass("active");

  catBtn.classList.add("active");
  productsFetch(actionsRoot, cat, brands, priceRange, pCount, step);
};

const brandProductsFetch = checkbox => {
  let brand = checkbox.parentElement.querySelector("label").innerHTML,
    url = new URL(window.location.href),
    cat = url.searchParams.get("cat"),
    priceRange = url.searchParams.get("priceRange"),
    pCount = url.searchParams.get("count"),
    step = url.searchParams.get("step");

  checkbox.checked
    ? brandArray.push(brand)
    : removeValueFromArray(brandArray, brand);

  let brands = brandArray.join(tagLine);
  brands = brands.length > 0 ? brands : null;

  productsFetch(actionsRoot, cat, brands, priceRange, pCount, step);
};

const priceProductsFetch = (min, max) => {
  let url = new URL(window.location.href),
    brands = url.searchParams.get("brands"),
    cat = url.searchParams.get("cat"),
    priceRange = `${min}${tagLine}${max}`,
    count =
      url.searchParams.get("count") ||
      document.querySelector("#viewProduct option").innerHTML,
    step = url.searchParams.get("step") || 0;

  productsFetch(actionsRoot, cat, brands, priceRange, count, step);
};

const countProductsFetch = btn => {
  let url = new URL(window.location.href),
    brands = url.searchParams.get("brands"),
    cat = url.searchParams.get("cat"),
    priceRange = url.searchParams.get("priceRange"),
    pCount = btn.value,
    step =
      (Number(
        $(".pagination .page-item.active")
          .find(".page-link")
          .html()
      ) -
        1) *
      pCount;

  countRenderPagesExec = 0;

  productsFetch(actionsRoot, cat, brands, priceRange, pCount, step);
};

const changeProductView = btn =>
  [...btn.classList].includes("active")
    ? ""
    : ($(".product-topbar .total-products .view a").removeClass("active"),
      btn.classList.add("active"),
      $("#productsDiv > div").toggleClass("col-sm-6 col-md-12 col-xl-6"));

const toggleBrandCheck = (chk, brands) => {
  let chkLabel = chk.querySelector(".form-check-label"),
    chkInput = chk.querySelector(".form-check-input");

  brands = brands || new Array();

  brands.includes(chkLabel.innerHTML) === true
    ? chkInput.setAttribute("checked", true)
    : chkInput.removeAttribute("checked");
};

setTimeout(() => {
  let url = new URL(window.location.href),
    brands = url.searchParams.get("brands"),
    cat = url.searchParams.get("cat"),
    priceRange = url.searchParams.get("priceRange"),
    pCount = url.searchParams.get("count");
  step = url.searchParams.get("step");

  //Set current cat active
  [...document.querySelectorAll("#catsList li a")].forEach(li =>
    li.innerHTML === cat ? li.parentElement.classList.add("active") : ""
  );

  //Set current brand active
  [...document.querySelectorAll("#brandsList .form-check")].forEach(li =>
    toggleBrandCheck(li, brands)
  );

  //Populate brandArray from get
  [...document.querySelectorAll("#brandsList .form-check-input")].forEach(inp =>
    inp.checked
      ? brandArray.push(
          inp.parentElement.querySelector(".form-check-label").innerHTML
        )
      : ""
  );

  [...document.querySelectorAll(".pagination .page-item")].forEach(item =>
    item
      .querySelector(".page-link")
      .innerHTML.includes(Number(step / pCount) + 1)
      ? item.classList.add("active")
      : item.classList.remove("active")
  );

  //Set current count value
  pCount === null
    ? (document.querySelector("#viewProduct").selectedIndex = 0)
    : (document.querySelector("#viewProduct").value = pCount);
}, 200);
