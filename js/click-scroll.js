//jquery-click-scroll
//by Collin Joe
$(document).ready(function() {
    // Initialize all links as inactive
    $('.navbar-nav .nav-item .nav-link').addClass('inactive');

    // Get the current page pathname
    var currentPath = window.location.pathname.split("/").pop();

    // Define an array with paths and corresponding nav-link indices
    var pageLinks = [
        { path: "index", index: 0 },
        { path: "about", index: 1 },
        { path: "works", index: 2 },
        { path: "stories", index: 3 },
        { path: "contact", index: 4 },
        { path: "donate", index: 5 }
    ];

    // Loop through the pageLinks array to find the active link
    $.each(pageLinks, function(i, page) {
        if (currentPath === page.path) {
            $('.navbar-nav .nav-item .nav-link').eq(page.index).addClass('active').removeClass('inactive');
        }
    });
});
