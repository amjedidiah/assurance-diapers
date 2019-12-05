const catsList = catsList =>
  $.ajax({
    url: `./assets/categories.json`
  })
    .done(data =>
      catsList.html(
        data.map(
          (li, i) =>
            `<li onClick="catProductsFetch(this)" class="pointer" ><a name="${li}" class="text-left">${li}</a></li>`
        )
      )
    )
    .error(err => console.log(err));

catsList($("#catsList"));
