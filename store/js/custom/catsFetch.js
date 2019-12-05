const catsFetch = (actionsRoot, catsDiv) =>
  $.ajax({
    url: `${actionsRoot}/cats_fetch.action.php`
  })
    .done(data => catsDiv.html(data))
    .error(err => console.log(err));

catsFetch(actionsRoot, $("#catsDiv"));
