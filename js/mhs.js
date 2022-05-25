var keyword = document.getElementById("keyword");
var role = document.getElementById("role");
var search = document.getElementById("tombol-cari");
var container = document.getElementById("kontainer");

keyword.addEventListener("keypress", function (){
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function (){
        if (xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        };
    }

    //eksekusi ajax
    xhr.open("GET", "ajax/carimhs.php?keyword=" + keyword.value + "&role=" + role.value, true);
    xhr.send();
});