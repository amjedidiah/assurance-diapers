const priceRange = (actionsRoot, priceRange) =>
  $.ajax({
    url: `${actionsRoot}/price_range.action.php`
  })
    .done(data => {
      let { min, max } = JSON.parse(data);
      min = min;
      max = max;

      priceRange.find(".slider-range-price").attr({
        "data-min": min,
        "data-max": max,
        "data-value-min": min,
        "data-value-max": max
      });

      priceRange.find(".price-min").html(min);
      priceRange.find(".price-max").html(max);
    })
    .error(err => console.log(err));

priceRange(actionsRoot, $("#priceRange"));
