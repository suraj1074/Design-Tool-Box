$(document).ready(function(){
    $("#freeDrawing").click(function(){
        var text = $(this).text();
        if(text == "Free Drawing") {
            $(this).html("Stop Free Drawing");
            $("#forFreeDrawing").show();
            canvas.isDrawingMode = true;
        }
        else{
            canvas.isDrawingMode = false;
            $(this).html("Free Drawing");
            $("#forFreeDrawing").hide();
        }
    });
    // changing width and color of pencil
    $("#drawing_line_width").change(function(){
        var width = parseInt($("#drawing_line_width").val());
        canvas.freeDrawingBrush.width = width;
    });
    $("#drawing-color").change(function(){
        var color = $("#drawing-color").val();
        canvas.freeDrawingBrush.color = color;
    });
});