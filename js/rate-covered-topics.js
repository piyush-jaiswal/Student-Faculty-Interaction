
//dropdown button
$(document).ready(function() {
    $('.dropdown').click(function() {

        var img = $(this).attr("src");
        if(img=="../images/down.png")
            img = "../images/up.svg";
        else
            img = "../images/down.png";
        $(this).attr("src", img);

    });
});
