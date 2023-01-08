// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('d-none');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('d-none');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('d-none');
                }
            });
        }
    }

    let products = document.querySelectorAll(".add-to-cart");
    let cart = document.querySelectorAll(".cart-number");
    let addMore = document.querySelectorAll(".add-more");
    
    let index = 0;
    let num = 0;

    


    products.forEach(product => {
        addMore.forEach(addMoreItem => {
            product.addEventListener("click", ()=>{
                num++;
                addMoreItem.classList.remove("d-none");
                product.classList.toggle("d-none");
                cart[0].innerHTML = num;
            })
        })
        
    });






    
});
