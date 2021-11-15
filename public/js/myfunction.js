$(document).ready(function() {
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});

function dependentdropdown(id, depends, url) {
    var parent_menu_id = id;
    parent_menu_id.depdrop({
        depends: depends,
        url: url,
    });
}