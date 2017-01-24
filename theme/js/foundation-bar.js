jQuery(document).ready(function($) {

    // Check if active page is the Foundation page
    // or if it's a subpage (children) of the Foundation (dropdown)
    if( $('#menu-primary li.menu-item-has-children').hasClass('active') || $('#menu-primary ul.dropdown-menu').children().hasClass('active')) {
        // Keep submenu open
        $('#menu-primary .dropdown').addClass('open');
        // Make sure we have enough spacing under the submenu
        $('html').addClass('menu-open');
        $('.navbar').append('<span class="nav-bg"></span>');
    }
});
