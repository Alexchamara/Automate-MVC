//resposive navigation bar
let menu = document.querySelector("#menu-icon");
let navlist = document.querySelector(".navlist");

// toggle menu
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    document.getElementById("nav").classList.toggle("sticky", window.scrollY > 0);
    // header.classList.toggle("sticky", window.scrollY > 0);
    // window.scroll > 0 ? document.getElementById("nav").classList.add("sticky") : document.getElementById("nav").classList.remove("sticky");
    const menuLinks = document.querySelectorAll(".menu-link");


    if (window.scrollY > 0) {
        if (!menu.classList.contains("bx-x")) {
            menu.style.color = "black";
        }
        if (window.innerWidth >= 1100) {
            menuLinks.forEach((link) => {
                link.style.color = "#000";
            })
        } else {
            menuLinks.forEach((link) => {
                link.style.color = "#fff";
            })
        }
    } else if (window.scrollY == 0) {
        menu.style.color = "white";
        if (window.innerWidth >= 1100) {
            menuLinks.forEach((link) => {
                link.style.color = "#fff";
            })
        } else {
            menuLinks.forEach((link) => {
                link.style.color = "#fff";
            })
        }
    }
});

//change color of create ads button when scrolling
window.addEventListener("scroll", function() {
    var adsMob = document.querySelector(".Ads-mob");
    if (window.scrollY > 0) {
        adsMob.style.color = "white";
    }
});

// toggle menu
menu.onclick = () => {
    menu.classList.toggle("bx-x");
    navlist.classList.toggle("open");
    if (menu.classList.contains("bx-x")) {
        menu.style.color = "white";
    } else {
        window.scrollY > 0 ? menu.style.color = "black" : menu.style.color = "white";
    }
}

// //
// document.addEventListener('DOMContentLoaded', () => {
//     const dropdown = document.querySelector('.dropdown');
//     if (dropdown) {
//         const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
//         const dropdownMenu = dropdown.querySelector('.dropdown-menu');

//         if (dropdownToggle && dropdownMenu) {
//             dropdownToggle.addEventListener('click', function(e) {
//                 e.preventDefault();
//                 dropdownMenu.classList.toggle('show');
//             });

//             document.addEventListener('click', function(e) {
//                 if (!dropdown.contains(e.target)) {
//                     dropdownMenu.classList.remove('show');
//                 }
//             });
//         }
//     }
// });
