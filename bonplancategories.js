$(function(){
    $("h1").click(function(){
        $(".sub_subject").toggle();
    });

    $("#delete").click(function(){
        $(".proverbemode").remove();
    });

    $(".h3").click(function(){
        $(".social").toggle();
    });
});