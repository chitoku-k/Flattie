require("jquery-fancybox");
require("async-gist");

jQuery($ => {
    const WIDGET_URL = "https://platform.twitter.com/widgets.js";
    const $navbar = $("#nav-container>nav>ul");
    const $navSearchForm = $("#nav-search-form");
    const $navSearchInput = $("#nav-search-form input");

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

    $("[data-gist]").gist();

    $.getScript(WIDGET_URL).then(() => {
        twttr.ready(() => {
            twttr.events.bind("rendered", (e) => {
                $(e.target).css("padding", "0");
                $(e.target.shadowRoot || e.target).contents().find(".EmbeddedTweet").css("max-width", "100%");
            });
        });
    });
});
