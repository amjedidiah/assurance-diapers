const actionsRoot = "./actions",
  removeValueFromArray = (arr, val) => {
    for (let i = 0; i < arr.length; i++) {
      if (arr[i] === val) arr.splice(i, 1);
    }
    return arr;
  },
  tagLine = "AlphaEchoJalingo@6048";

let brandArray = new Array();

