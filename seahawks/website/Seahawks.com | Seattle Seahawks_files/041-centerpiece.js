$nflcs.centerpiece = {
    /**
     * Integer Number of centerpieces on page
     * Used to identify a unique modal window element per centerpiece
     */
    numOfCPs: 0,

    /**
     * Executes load of centerpiece module; Get settings, preload first chapter image, then instantiate centerpiece.
     *
     * @param elem HTML element containing markup for centerpiece
     * @return void
     */
    load : function(elem) {

        this.numOfCPs++;

        var el$ = $nflcs(elem),
            cpClass = "cp-" + this.numOfCPs,
            CP = this,
            settings = {
                container:          'chapter-list',
                generatePagination: false,
                paginationClass:    'chapter-navigation',
                effect:             el$.attr('effect'),
                play:               el$.attr('play'),
                crossfade:          el$.attr("crossfade") || false,
                fadeSpeed:          parseInt(el$.attr("fadeSpeed")) || 350
            },
            height;

        el$.find(".modal-window").addClass(cpClass);

        /* tried "preload: true" but wasn't sufficient for all supported browsers
           may need to revisit if load event isn't sufficient either */

        var images$ = el$.find('.chapter-list img');

        images$.each(function(index, value){
            var img = new Image();

            img.onerror = function(){
                images$ = CP.imageLoadError(CP, img, images$, value, el$, height, settings, cpClass);
            }

            img.onload = function() {
                images$ = images$.not(value);
                height = img.height;

                if(images$.length == 0){
                    CP.show(el$, height, settings, cpClass);
                }
            }

            if($nflcs.trim($nflcs(value).attr('src')).length == 0){
                images$ = CP.imageLoadError(CP, img, images$, value, el$, height, settings, cpClass);
            }
            else{
                img.src = $nflcs(value).attr('src');
            }

            // preload check in IE
            if (value.complete || value.naturalHeight > 0) {
                $nflcs(value).trigger('load');
            }

        });

    },

    imageLoadError: function(CP, img, images$, value, el$, height, settings, cpClass){
        nflcsLog("Centerpiece Image Load error: " + img.src + "\nRemoving CP chapter for this image.");

        CP.removeChapter(value, el$);

        images$ = images$.not(value);

        if(images$.length == 0){
            CP.show(el$, height, settings, cpClass);
        }

        return images$;
    },

    removeChapter: function(img, el$){
        var chapterList$ = el$.find('.chapter-list'),
            chapterNavigation$ = el$.find('.chapter-navigation'),
            index = $nflcs(img).closest('li').index();

        $nflcs("> li:eq("+ (index) +")",chapterList$).remove();
        $nflcs("> li:eq("+ (index) +")",chapterNavigation$).remove();

        //renumber the navigation elements
        $nflcs("li span a span", chapterNavigation$).each(function(index, value){
            $nflcs(value).html(index+1);
        });
    },

    show : function(el$, height, settings, cpClass){
        var chapterList$ = el$.find('.chapter-list'),
            chapterNavigation$ = el$.find('.chapter-navigation');

        if($nflcs('> li',chapterList$).length <= 0){
            //we've arrived at this point and there are no chapters to display, so hide centerpiece
            console.log("Hiding centerpiece since no valid chapters were available.");
            el$.hide();
            return;
        }

        el$.find('.preloader').hide(function() {
            chapterList$.show();
            chapterNavigation$.show();
            // instantiate the centerpiece
            el$.slides(settings);
            chapterList$.children('li').height(height);
            chapterList$.height(height);
            // set content bottom for default layout

            if(!el$.find('.headlines').length) {
                chapterList$.find('.content > div').css('padding-bottom', chapterNavigation$.height());
            }

            // add click event for modal links
            chapterList$.find('.modal-link').click(function(event) {
                event.preventDefault();
                var opts = {
                    container : "." + cpClass,
                    externalID : $nflcs(this).data('external-id'),
                    mediaType : $nflcs(this).data('media-type'),
                    context : el$,
                    event : $nflcs(this),
                    playerName: "centerpiece-modal"
                };
                $nflcs.OpenModalVideo(opts);
                // stop slides on click
                el$.trigger('stop');
            });
        });

        //load the Omniture click tracking events
        this.omnitureTrackingEvents();
    },

    /**
     * Tracking events for the HTML centerpiece.
     * Attaches events that allow for link tracking to be
     * captured by Omniture
     *
     * @return Void
     */
    omnitureTrackingEvents: function(){

        /**
         * Track clicks in the main content area of the html centerpiece
         */
        $nflcs('li[class*="chapter"]').live("click", function(event){
            var whichTarget = $nflcs(event.target),
                index = $nflcs(this).index() + 1,
                position = whichTarget.attr("class").indexOf("-click"),
                className = whichTarget.attr("class").slice(0, position),
                articleName = $nflcs(this).find(".content h3 a span").text(),
                clickedSection = ($nflcs(this).find(".related-links").has(whichTarget).length > 0) ? "related" : "main",
                clickedUrl = whichTarget.closest("a").attr("href"),
                propertyNames = ["eVar16", "eVar17", "eVar18","prop29","prop30","prop31"],
                propertyValues = [];

            if(position > 0){
                propertyValues.push("cp");
                propertyValues.push(index);
                propertyValues.push(className);
                propertyValues.push(articleName);
                propertyValues.push(index + "-" + clickedSection);
                propertyValues.push(clickedUrl);
                $nflcs.Omniture.trackLinkClicked(propertyNames, propertyValues, "cp-" + index + "-" + className);
            }

        });

        /**
         * Track modal click links
         */
//        $nflcs(".modal-link").live("click", function(event){
//            var pagePath = $nflcs.Omniture.getPagePath();
//            $nflcs.Omniture.trackPageView(["s_analytics_pageName", "s_analytics_gf1", "s_analytics_hier", "prop5",], [document.domain + "|"+pagePath+"|modal-player", "modal-player", document.domain + "|"+pagePath+"", document.domain + "|"+pagePath+"|modal-player"]);
//        });

        /**
         * Track chapter navigation links
         */
        $nflcs(".chapter-navigation a").click(function(event){
            var index = $nflcs(".chapter-list li:visible").index() + 1,
                position = $nflcs(this).attr("class").indexOf("-click"),
                className = $nflcs(this).attr("class").slice(0, position);

            if(position > 0){
                var propertyNames = ["eVar16", "eVar17", "eVar18"];
                var propertyValues = [];
                propertyValues.push("cp");
                propertyValues.push(index);
                propertyValues.push(className);
                $nflcs.Omniture.trackLinkClicked(propertyNames, propertyValues, "cp-" + index + "-" + className);
            }
        });

    }
};