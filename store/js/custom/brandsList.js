const brandsList = brandsList =>
  $.ajax({
    url: `./assets/brands.json`
  })
    .done(data =>
      brandsList.html(
        data.map(
          (li, i) =>
            `<div class="form-check">
                <input class="form-check-input" onChange="brandProductsFetch(this)" type="checkbox" value="" id="${li}">
                <label class="form-check-label text-capitalize" for="${li}">${li}</label>
            </div>`
        )
      )
    )
    .error(err => console.log(err));

brandsList($("#brandsList"));
