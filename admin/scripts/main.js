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

function clearPersonalLimit(username) {
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/clearPersonalLimit.php",
    data: {
      username: username
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
          alert("Wyzerowano wykorzystanie limitu osobistego");
          location.reload();
          break;
      }
    },
    error: function () {
    }
  });
}

function clearHouseLimit(username) {
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/clearHouseLimit.php",
    data: {
      username: username
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
          alert("Wyzerowano wykorzystanie limitu domu");
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
    if (username == "user_pass_reset") {
      username = document.getElementById("reset_pass_user_id").value;
    }

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
            alert("Hasło zostało zmienione");
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
          alert("Odbiorca został dodany");
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

function addUser() {
  var user_name = document.getElementById("user_name_input").value;
  var user_surname = document.getElementById("user_surname_input").value;
  var user_login = document.getElementById("user_login_input").value;
  var pass1 = document.getElementsByClassName("pass_input")[0].value;
  var pass2 = document.getElementsByClassName("pass_input")[1].value;
  var user_role = document.getElementById("user_role_select").value;

  if (pass1 == pass2) {
    $.ajax({
      type: "POST",
      dataType: "json",
      async: false,
      url: "./admin/functions/addUser.php",
      data: {
        user_name: user_name,
        user_surname: user_surname,
        user_login: user_login,
        user_password: pass1,
        user_role: user_role
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
            alert("Użytkownik został dodany");
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
          alert("Odbiorca został usunięty");
          location.reload();
          break;
      }
    },
    error: function () {
    }
  });
}

function deleteUser(user_id) {
  user_id = user_id.slice(4);

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/deleteUser.php",
    data: {
      user_id: user_id
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
          alert("Użytkownik został usunięty");
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
          alert("Odbiorca został zedytowany");
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

function showModalRecipent(name, acc_number) {
  document.getElementById("modal_id").style.display = "block";
  document.getElementById("edit_recipent_name").value = document.getElementById(name).value;
  document.getElementById("edit_recipent_acc_number").value = document.getElementById(acc_number).value;
  document.getElementById("edit_recipent_id").value = name.slice(8);
}

function showModalUser(user_login) {
  document.getElementById("modal_id").style.display = "block";
  document.getElementById("reset_pass_user_id").value = user_login;
}

window.onclick = function (event) {
  if (event.target == document.getElementById("modal_id")) {
    document.getElementById("modal_id").style.display = "none";
  }
}

function addPayment(user_role) {
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

  if (user_role != "Inmate") {
    if (document.getElementById("add_payment_permament_checkbox").checked == true) {
      var payment_perm_date = document.getElementById("add_perm_payment_date").value;
    }
    else {
      var payment_perm_date = 'n';
    }
  }
  else {
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
          alert("Płatność została dodana");
          updateLimitUsed(payment_amount, payment_private);
          break;
        case 4:
          alert("Kwota płatności przekracza limit wydatków");
          break;
      }
    },
    error: function () {
    }
  });
}

function updateLimitUsed(payment_amount, payment_private) {
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: "./admin/functions/updateLimitUsed.php",
    data: {
      payment_amount: payment_amount,
      payment_private: payment_private
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
          alert("Coś poszło nie tak przy wykonywaniu zapytania aktualizacji limitu");
          break;
        case 3:
          alert("Wykorzystany limit został zaktualizowany");
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

function showHouserAndBillsSelectOption() {
  if (document.getElementById("add_payment_private_expenses_checkbox").checked == true) {
    document.getElementById("house_and_bills").style.display = "none";
    
    if (document.getElementById("add_payment_category_select").value == "house_and_bills") {
      document.getElementById("add_payment_category_select").value = "daily_expenses";
    }
  }
  else {
    document.getElementById("house_and_bills").style.display = "inline-block";
  }
}
