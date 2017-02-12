jQuery($ => {
    const WIDGET_URL = "https://platform.twitter.com/widgets.js";
    const TIMELINE_WIDGET_ID = "507185852284280832";
    const TIMELINE_WIDGET_WIDTH = 520;
    const TIMELINE_WIDGET_HEIGHT = 600;

    const $window = $(window);
    const $header = $("#header-container");
    const $nav = $("#nav-container");
    const $main = $("#main-container");
    const $navbar = $("#nav-container>nav>ul");
    const $navsearchform = $("#nav-search-form");
    const $navsearchInput = $("#nav-search-form input");
    const $mainContainer = $("#main-content-container");
    const $subContainer = $("#sub-content-container");
    const $lastMainContent = $("#main-content-container .main-content:last-child");
    const $lastWidget = $("#sub-content-container>div:last-child");

    function SetNavigationPosition() {
        if ($header.outerHeight(true) > $window.scrollTop() || $window.height() < 768) {
            $nav.css({ position: "" });
            $main.css({ margin: "" });
        } else {
            $main.css({ marginTop: parseInt($header.css("margin-bottom"), 10) + $nav.outerHeight(true) + "px" });
            $nav.css({ position: "fixed" });
        }
    }

    function AdjustLinksHeight() {
        if (!window.matchMedia("(min-width: 768px)").matches) {
            $lastWidget.css({ height: "" });
            return;
        }

        const mainHeight = $mainContainer.height();
        const subHeight = $subContainer.height();

        if (mainHeight === subHeight) {
            return;
        } else if (mainHeight > subHeight) {
            $lastWidget.css({ height: "" });
        } else {
            $lastWidget.css({ height: $lastWidget.outerHeight(true) - (subHeight - mainHeight) });
        }
    }

    function OnWidgetsLoaded() {
        const $twitterWidget = $("<div>", { id: "twitter-timeline-widget" }).hide().appendTo("body");
        twttr.ready(() =>
            twttr.events.bind("rendered", event =>
                $(event.target).contents().find(".EmbeddedTweet").css("max-width", "100%")
            )
        );
        $(".header-icon.twitter-icon").attr("href", "#twitter-timeline-widget").fancybox({
            openEffect: "elastic",
            closeEffect: "elastic",
            type: "inline",
            width: TIMELINE_WIDGET_WIDTH,
            height: TIMELINE_WIDGET_HEIGHT,
            autoSize: false,
            afterShow: current => {
                $.fancybox.showLoading();
                $twitterWidget.empty();
                twttr.widgets.createTimeline(TIMELINE_WIDGET_ID, $twitterWidget[0], {
                    lang: "ja",
                    chrome: "nofooter",
                    height: Math.min(TIMELINE_WIDGET_HEIGHT, current.inner.height()),
                }).then(elm => {
                    $.fancybox.hideLoading()
                });
            }
        });
    }

    if (!/iPhone|iPad|iPod|MSIE [5678]/.test(navigator.userAgent)) {
        $window.on("scroll", SetNavigationPosition);
    }

    if (window.matchMedia) {
        $window.on("resize", AdjustLinksHeight);
        AdjustLinksHeight();
    }

    $("#search-link").on("click", () => {
        $navbar.hide();
        $navsearchform.show();
        $navsearchInput[0].focus();
    });

    $("#search-cancel-link").on("click", () => {
        $navsearchform.hide();
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

    window.addEventListener("load", () => $.getScript(WIDGET_URL).done(OnWidgetsLoaded));
});
