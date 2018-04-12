$(function(){
    $("#search").click(function(){
        $("#search").css({
            "margin": "10px 0px 0px 10px",
            "padding": "0px 0px 5px 5px",
            "border-top": "0px solid #000000",
            "border-right": "0px solid #000000",
            "border-bottom": "2px solid ActiveBorder",
            "border-left": "0px solid #000000",
            "width": "500px",
            "height": "30px",
            "font-size": "18px",
            "font-weight": "bold"
        });

        $("h3").css({
            "color": "ActiveBorder"
        });

        $("#logout a").css({
            "color": "ActiveBorder"
        });
    });
});