
// @doc https://www.drupal.org/node/304258
// @doc https://www.drupal.org/node/132442#javascript-themeing

Drupal.theme = function (func) {
  for (var i = 1, args = []; i < arguments.length; i++) {
    args.push(arguments[i]);
  }
  return (Drupal.theme[func] || Drupal.theme.prototype[func]).apply(this, args);
};

Drupal.theme.prototype.myThemeFunction = function (left, top, width) {
  var myDiv = '<div  id="myDiv" style="left:'+ left +'px; top:'+ top +'px; width:'+ width +'px;">';
  myDiv += '</div>';
  return myDiv;
};

// Call
Drupal.theme('myThemeFunction', 50, 100, 500);

