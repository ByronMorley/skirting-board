$(document).ready(function () {
    $('.sb-menu-toggle').addClass('open');
    $('.sb-nav').addClass('open');
    var menu = localStorage.getItem('menu');
    if (menu === "closed") {
        toggleMenu(false);
    }
    $('.sb-menu-toggle').on('click', function () {
        toggleMenu(true);
    });

    $('.sb-menu a').on('click', function(){
        //localStorage.setItem("menu", "closed");
    });
    checkMenuPosition($('.sb-nav'));
});


function toggleMenu(animate) {

    var hamburger = $('.sb-menu-toggle');
    var menuExtension = $('.sb-nav');

    if (animate) {
        menuExtension.removeClass('no-anim');
    } else {
        menuExtension.addClass('no-anim');
    }

    if (hamburger.hasClass('open')) {
        closeMenu(hamburger, menuExtension)
        menuExtension.removeAttr('style');
    } else {
        openMenu(hamburger, menuExtension);
        checkMenuPosition(menuExtension);
    }
}


$(window).on('resize', function () {

    var menuExtension = $('.sb-nav');
    checkMenuPosition(menuExtension);

    if (this.innerWidth < 992) {
        menuExtension.removeAttr('style');
    }
});

function checkMenuPosition(menuExtension) {
    if (window.innerWidth > 991) {
        if (hamburgerPosition() > menuExtension.width() && menuExtension.hasClass('open')) {
            menuExtension.css('width', hamburgerPosition() + "px");
        }
    }
}

function hamburgerPosition() {

    var el = document.querySelector('.sb-hamburger .sb-menu-toggle');
    var viewportOffset = el.getBoundingClientRect();
    var left = viewportOffset.left;
    return window.innerWidth - left
}


function openMenu(hamburger, menuExtension) {
    localStorage.setItem("menu", "open");
    hamburger.addClass('open').removeClass('closed');
    menuExtension.addClass('open').removeClass('closed');
}

function closeMenu(hamburger, menuExtension) {
    localStorage.setItem("menu", "closed");
    hamburger.addClass('closed').removeClass('open');
    menuExtension.addClass('closed').removeClass('open');
}
