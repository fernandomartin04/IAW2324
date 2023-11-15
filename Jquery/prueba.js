$(document).ready(function () {
    
    $("#esconder").click(function(){
        $("p").removeClass("roja");
    })
    $("#mostrar").click(function(){
        $("p").addClass("roja");
    })
    $("#toggle").click(function(){
        $("p").toggleClass("roja");
    })

});