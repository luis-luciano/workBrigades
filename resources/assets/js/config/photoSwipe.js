/*
|--------------------------------------------------------------------------
| PhotoSwipe Configuration
|--------------------------------------------------------------------------
|
| photoSwipe settings.
|
*/
	var PhotoSwiper = ( function($) {

    var _settings = {};

    var init = function(settings) {
        _settings = typeof settings !== 'undefined' ? settings : {};
        _setup();
    };

    var _setup = function() {
        var pswpElement = $('.pswp')[0];

        // build items array
        var items = _settings.photos;

        // define options (if needed)
        var options = {
            history: true,
            focus: true,

            showAnimationDuration: 0,
            hideAnimationDuration: 0,

            shareButtons: [
                {
                    id: 'download',
                    label: 'Descargar',
                    url: '{{raw_image_url}}',
                    download: true
                }
            ],
        };

        var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.listen('gettingData', function(index, item) {
            // index - index of a slide that was loaded
            // item - slide object
            // set the correct width
            item.w = 500;
            item.h = 500;
        });

        gallery.init();
    };

    return {
        init: init,
    };

} )(window.jQuery);

require('../app/globalize.js')({
    PhotoSwiper
});
//