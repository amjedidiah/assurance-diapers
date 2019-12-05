(function viewNumber(actionsRoot) {
  $.ajax({
    url: `${actionsRoot}/products_fetch_all.action.php`
  })
    .done(data => viewProductList(Math.ceil(Number(data) / 4)))
    .error(err => console.log(err));
})(actionsRoot);

const viewProductList = start => {
  let list = null;
  for (let i = 1; i < 5; i++) {
    let count = start * i;
    list += `<option value="${count}">${count}</option>`;
  }

  $("#viewProduct").html(list);
};
