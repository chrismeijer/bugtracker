require('./bootstrap');

require('summernote/dist/summernote.css');
require('summernote');

$(document).ready(function() {
    $('.summernote').summernote({
        height: 150
    });
});