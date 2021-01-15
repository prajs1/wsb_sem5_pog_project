function changeStyle(width, sWidth) {
  width = parseInt(width);
  sWidth = parseInt(sWidth);
  if (width < 1001 || sWidth < 1000) {
    $("#size-stylesheet").attr("href", "./css/narrow.css");
  } /*else if (width < 1200) {
    $("#size-stylesheet").attr("href", "./css/medium.css");
  } */else {
     $("#size-stylesheet").attr("href", "./css/main.css");
  }
}

$(function() {
  changeStyle(window.innerWidth, screen.availWidth);
  $(window).resize(function() {
    changeStyle(window.innerWidth, screen.availWidth);
  });
});

function copy(elementID) {
  document.getElementById(elementID).select();
  document.execCommand('copy');
}

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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
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

function updateHouseLimit() {
  var house_limit = document.getElementById("house_limit_input").value;

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/updateHouseLimit.php",
    data: {
      house_limit: house_limit
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
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
            alert("Coś poszło nie tak przy wykonywaniu zapytania");
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

function addRecipent() {
  var recipent_name = document.getElementById("recipent_name_input").value;
  var acc_number = document.getElementById("acc_number_input").value;

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/addRecipent.php",
    data: {
      recipent_name: recipent_name,
      acc_number: acc_number
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
          break;
        case 3:
          location.reload();
          break;
        case 4:
          alert("Niepoprawny numer bankowy");
          break;
      }
    },
    error: function () {
    }
  });
}

function deleteRecipent(recipent_id) {
  recipent_id = recipent_id.slice(8);

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/deleteRecipent.php",
    data: {
      recipent_id: recipent_id
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
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

function editRecipent() {
  recipent_id = document.getElementById("edit_recipent_id").value;
  recipent_name = document.getElementById("edit_recipent_name").value;
  recipent_acc_number = document.getElementById("edit_recipent_acc_number").value;
  document.getElementById("modal_edit_recipent").style.display = "none";

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/editRecipent.php",
    data: {
      new_recipent_id: recipent_id,
      new_recipent_name: recipent_name,
      new_recipent_acc_number: recipent_acc_number
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
          break;
        case 3:
          location.reload();
          break;
        case 4:
          alert("Niepoprawny numer bankowy");
          break;
      }
    },
    error: function () {
    }
  });
}

/* okno modal dla edycji odbiorcy */

function showModal(name, acc_number) {
  document.getElementById("modal_edit_recipent").style.display = "block";
  document.getElementById("edit_recipent_name").value = document.getElementById(name).value;
  document.getElementById("edit_recipent_acc_number").value = document.getElementById(acc_number).value;
  document.getElementById("edit_recipent_id").value = name.slice(8);
}

window.onclick = function (event) {
  if (event.target == document.getElementById("modal_edit_recipent")) {
    document.getElementById("modal_edit_recipent").style.display = "none";
  }
}

function addPayment() {
  /*TODO dokończyć funkcję odpalająca funkcje dodająca płatność */
  var payment_recipent_id = document.getElementById("add_payment_recipents_select").value.slice(8);
  var payment_category = document.getElementById("add_payment_category_select").value;
  var payment_amount = document.getElementById("add_payment_amount").value;
  var payment_date = document.getElementById("add_payment_date").value;

  switch (payment_category) {
    case "house_and_bills":
      payment_category = "Dom i rachunki";
      break;
    case "daily_expenses":
      payment_category = "Codzienne wydatki";
      break;
    case "investments":
      payment_category = "Inwestycje";
      break;
    case "savings":
      payment_category = "Oszczędności";
      break;
    case "entertainment":
      payment_category = "Rozrywka";
      break;
    case "car_and_transport":
      payment_category = "Samochód i transport";
      break;
  }

  if (document.getElementById("add_payment_private_expenses_checkbox").checked == true) {
    var payment_private = 'y';
  }
  else{
    var payment_private = 'n';
  }

  if (document.getElementById("add_payment_permament_checkbox").checked == true){
    var payment_perm_date = document.getElementById("add_perm_payment_date").value;
  }
  else{
    var payment_perm_date = 'n';
  }

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/addPayment.php",
    data: {
      payment_recipent_id: payment_recipent_id,
      payment_category: payment_category,
      payment_amount: payment_amount,
      payment_date: payment_date,
      payment_private: payment_private,
      payment_perm_date: payment_perm_date
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania");
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

function showPermPaymentDateInput() {
  if (document.getElementById("add_payment_permament_checkbox").checked == true) {
    document.getElementById("perm_payment_div").style.display = "inline-block";
  }
  else {
    document.getElementById("perm_payment_div").style.display = "none";
  }
}