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

function updatePersonalLimit(username) {
  var personal_limit = document.getElementById("personal_limit_input").value;
  
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/updatePersonalLimit.php",
    data: {
      username: username,
      personal_limit: personal_limit
    },
    success: function (data) {
      switch (data) {
        case 0:
          alert("Zmienne nie istnieją");
          break;
        case 1:
          alert("Zmienne są puste");
          break;
        case 2:
          alert("Coś poszło nie tak przy wykonywani zapytania");
          break;
        case 3:
          location.reload();
          break;
      }
    },
    error: function () {
    }
  });
}

function updatePassword(username) {
  var pass1 = document.getElementsByClassName("pass_input")[0].value;
  var pass2 = document.getElementsByClassName("pass_input")[1].value;

  if (pass1 === pass2) {
    $.ajax({
      type: "POST",
      dataType: "json",
      async: false,
      url: "./admin/functions/updatePassword.php",
      data: {
        username: username,
        password: pass1
      },
      success: function (data) {
        switch (data) {
          case 0:
            alert("Zmienne nie istnieją");
            break;
          case 1:
            alert("Zmienne są puste");
            break;
          case 2:
            alert("Coś poszło nie tak przy wykonywani zapytania");
            break;
          case 3:
            location.reload();
            break;
        }
      },
      error: function () {
      }
    });
  } else {
    alert("Wprowadzone hałsa nie są takie same");
  }
}