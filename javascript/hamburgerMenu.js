// Hamburger Menu Buka & Tutup
function toggleMenu(){
    var x = document.getElementById("headerId");
    if(x.className === "header-list") {
        x.className += " responsive";
    } else {
        x.className = "header-list";
    }
}