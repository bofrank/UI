$('.featured-content').ready(function() {

    var width = 540,
        height = 130,
        aspect = width/height,
        thumbAspect = null,
        this$ = $('.featured-content'),
        img$ = $('.bd ul li img', this$);

    img$.each(function(index) {

        var thisImg$ = $(this);

        if ($(thisImg$).length > 0) {

            var oldSrc = thisImg$.attr('src');

            if ((oldSrc.indexOf(nflcsAssetPath) > -1) || (oldSrc.indexOf(nflcsImgAssetPath) > -1)) {

                var oldImagePath = oldSrc.split(nflcsAssetPath)[1],
                    thisListItem = thisImg$.closest("li"),
                    imageSrc,
                    mezzImagePath = oldImagePath.replace(/thumb_[0-9]+_[0-9]./,'mezz_1280_1024'),
                    medImagePath = oldImagePath.replace(/thumb_[0-9]+_[0-9]./,'medium_540_360'),
                    newThumb = new Image();

                if( thisListItem.hasClass("content-type-photo") || thisListItem.hasClass("content-type-photo-gallery") ) {
                    imageSrc = nflcsImgAssetPath + mezzImagePath + "?width=" + width;
                }
                else if( thisListItem.hasClass("content-type-club-article") ||
                    thisListItem.hasClass("content-type-video") ||
                    thisListItem.hasClass("content-type-unknown") ||
                    thisListItem.hasClass("content-type-club-external-article") ||
                    thisListItem.hasClass("content-type-audio") ||
                    thisListItem.hasClass("content-type-internet-resource") ) {

                    imageSrc = nflcsAssetPath + medImagePath;
                }
                else
                {
                    imageSrc = oldSrc;
                }

                function setImageSrc(src) {
                    thumbAspect = newThumb.width/newThumb.height;

                    if (thumbAspect > aspect) {
                        thisImg$.addClass('vert');
                    }

                    thisImg$.attr('src', src);
                }

                newThumb.onload = function() {
                    setImageSrc(imageSrc);
                };

                $(newThumb).bind("error", function() {
                    setImageSrc(oldSrc);
                });

                newThumb.src = imageSrc;
            }
        }
    });
});
