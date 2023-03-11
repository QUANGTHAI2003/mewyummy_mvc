'use strict';

// push radio input attribute name to url when checked
$(document).on('change', 'input[type="radio"]', function() {
    var url = new URL(window.location.href);
    url.searchParams.set($(this).attr('name'), $(this).val());
    window.history.pushState({}, '', url);
})