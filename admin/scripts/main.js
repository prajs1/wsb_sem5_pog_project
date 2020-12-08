function changeStyle(width) {
  width = parseInt(width);
  if (width < 701) {
    $("#size-stylesheet").attr("href", "./css/narrow.css");
  } else if (width < 1000) {
    $("#size-stylesheet").attr("href", "./css/medium.css");
  } else {
     $("#size-stylesheet").attr("href", "./css/main.css");
  }
}

$(function() {
  changeStyle($(this).width());
  $(window).resize(function() {
    changeStyle($(this).width());
  });
});
