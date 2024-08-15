
function toggleNavbar() {
    const navbarItems = document.getElementById('navbar-items');
    navbarItems.classList.toggle('show');
}
function toggleSearch() {
    if(window.innerWidth <= 768){
        document.getElementById('headbtn').style.display = 'none';}
    document.getElementById('searchBox').style.display = 'flex';
    document.getElementById('searchicon').style.display = 'none';
}

function closeSearch() {
    document.getElementById('headbtn').style.display = 'flex';
    document.getElementById('searchBox').style.display = 'none';
    document.getElementById('searchicon').style.display = 'flex';
}
