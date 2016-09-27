module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        //
    };

    var edit = function() {
        //
    };

    var editProfilePhoto = function(photos) {
        FileInput.init({
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 1024,
            maxFileCount: 1,
            allowedFileExtensions: ['png', 'jpg', 'jpeg'],
        });

        $('#fileinput').on('fileuploaded', function(event, data, previewId, index) {
            location.reload();
            //window.location.href = $('#backButton').attr('href');
        });

        $('#deleteUserPhotoButton').click(function(e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });

        $('#imageGalleryButton').on('click', function(e) {
            PhotoSwiper.init({
                "photos": photos
            });
        }.bind(photos));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
        editProfilePhoto: editProfilePhoto,
    };
    
})(window.jQuery);