jQuery($ => {
    const $navbar = $("#nav-container>nav>ul");
    const $navsearchForm = $("#nav-search-form");
    const $navsearchInput = $("#nav-search-form input");

    $("#search-link").on("click", () => {
        $navbar.hide();
        $navSearchForm.show();
        $navSearchInput[0].focus();
    });

    $("#search-cancel-link").on("click", () => {
        $navSearchForm.hide();
        $navbar.show();
    });

    $(".main-content a:not(.no-fancybox):not(.share-button)").fancybox({
        openEffect: "elastic",
        closeEffect: "elastic",
        fitToView: false,
    });

    $(".share-button").on("click", (e) => {
        e.preventDefault();
        window.open(
            $(e.currentTarget).attr("href"),
            "share",
            "height=400,width=600,left=" + (screen.width / 2 - 600 / 2) + ",top=" + (screen.height / 2 - 400 / 2)
        );
    });

    $(".navbar-nav .dropdown-menu .current-post-ancestor").each(function () {
        $(this).parents(".dropdown").addClass("active");
    });
});
