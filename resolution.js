function adjustStyle(width) {
    width = parseInt(width);
    if (width < 1150) {
        $("#size-stylesheet").attr("href", "mainMobile.css");
    } else {
       $("#size-stylesheet").attr("href", "main.css"); 
    }
}

$(function() {
    adjustStyle($(this).width());
    $(window).resize(function() {
        adjustStyle($(this).width());
    });
});