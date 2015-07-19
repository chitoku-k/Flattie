jQuery ($) ->
    WIDGET_URL             = "https://platform.twitter.com/widgets.js"
    TIMELINE_WIDGET_ID     = "507185852284280832"
    TIMELINE_WIDGET_WIDTH  = 520
    TIMELINE_WIDGET_HEIGHT = 600

    $window                = $(window)
    $header                = $("#header-container")
    $nav                   = $("#nav-container")
    $main                  = $("#main-container")
    $navbar                = $("#nav-container>nav>ul")
    $navsearchform         = $("#nav-search-form")
    $navsearchInput        = $("#nav-search-form input")
    $mainContainer         = $("#main-content-container")
    $subContainer          = $("#sub-content-container")
    $lastMainContent       = $("#main-content-container .main-content:last-child")
    $lastWidget            = $("#sub-content-container>div:last-child")

    SetNavigationPosition = ->
        if $header.outerHeight(true) > $window.scrollTop() or $window.height() < 768
            $nav.css(position: "")
            $main.css(margin: "")
        else
            $main.css(marginTop: parseInt($header.css("margin-bottom"), 10) + $nav.outerHeight(true) + "px")
            $nav.css(position: "fixed")
        return

    AdjustLinksHeight = ->
        if not window.matchMedia("(min-width: 768px)").matches
            $lastWidget.css(height: "")
            return

        mainHeight = $mainContainer.height()
        subHeight = $subContainer.height()

        if mainHeight is subHeight
            return
        else if mainHeight > subHeight
            $lastWidget.css(height: "")
        else
            $lastWidget.css(height: $lastWidget.outerHeight(true) - (subHeight - mainHeight))
        return

    OnWidgetsLoaded = ->
        $twitterWidget = $("<div>", { id: "twitter-timeline-widget" }).hide().appendTo("body")
        twttr.ready(->
            twttr.events.bind("rendered", (event) ->
                $(event.target).contents().find(".EmbeddedTweet").css("max-width", "100%")
                return
            )
            return
        )
        $(".header-icon.twitter-icon").attr("href", "#twitter-timeline-widget").fancybox(
            openEffect:  "elastic"
            closeEffect: "elastic"
            type:        "inline"
            width:       TIMELINE_WIDGET_WIDTH
            height:      TIMELINE_WIDGET_HEIGHT
            autoSize:    false
            afterShow:   (current) ->
                $.fancybox.showLoading()
                $twitterWidget.empty()
                twttr.widgets.createTimeline(TIMELINE_WIDGET_ID, $twitterWidget[0],
                    lang:   "ja",
                    chrome: "nofooter"
                    height: Math.min(TIMELINE_WIDGET_HEIGHT, @.inner.height())
                ).then((elm) ->
                    $.fancybox.hideLoading()
                    return
                )
                return
        )
        return

    if not /iPhone|iPad|iPod|MSIE [5678]/.test(navigator.userAgent)
        $window.on("scroll", SetNavigationPosition)

    if window.matchMedia
        $window.on("resize", AdjustLinksHeight)
        AdjustLinksHeight()

    $("#search-link").on("click", ->
        $navbar.hide()
        $navsearchform.show()
        $navsearchInput[0].focus()
        return
    )

    $("#search-cancel-link").on("click", ->
        $navsearchform.hide()
        $navbar.show()
        return
    )

    $(".main-content a:not(.no-fancybox):not(.share-button)").fancybox(
        openEffect:  "elastic"
        closeEffect: "elastic"
        fitToView:   false
    )

    $(".share-button").on("click", (e) ->
        e.preventDefault()
        window.open($(@).attr("href"), "share", "height=400,width=600,left=" + (screen.width / 2 - 600 / 2) + ",top=" + (screen.height / 2 - 400 / 2))
        return
    )

    $(".navbar-nav .dropdown-menu .current-post-ancestor").each(->
        $(@).parents(".dropdown").addClass("active")
        return
    )

    $.getScript(WIDGET_URL).done(OnWidgetsLoaded)
    return
