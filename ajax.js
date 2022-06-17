var typing = document.getElementById("carii");
var jenis = document.getElementById("jenis");
var data = document.getElementById("data");
var Jenis = ["Appetizer", "Main Course", "Dessert"];


typing.addEventListener("keyup", function () {
    console.log(typing.value);
    // inisiasi objek ajax
    var objAjax = new XMLHttpRequest();
  
    // cek kesiapan ajax
    objAjax.onreadystatechange = function () {
        if ((objAjax.readyState = 4 && objAjax.status == 200)) {
            data.innerHTML = objAjax.responseText;
        }

    };
  
    objAjax.open("GET", "./filter.php?typing=" + typing.value, "true");
    objAjax.send();

  });

jenis.addEventListener("change", function () {
    console.log(jenis.value);
    // inisiasi objek ajax
    var objAjax = new XMLHttpRequest();
  
    // cek kesiapan ajax
    objAjax.onreadystatechange = function () {
        if ((objAjax.readyState = 4 && objAjax.status == 200)) {
            data.innerHTML = objAjax.responseText;
        }

    };
  
    objAjax.open("GET", "./filter.php?jenis=" + jenis.value, "true");
    objAjax.send();

});

