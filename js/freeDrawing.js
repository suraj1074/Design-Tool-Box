$(document).ready(function(){
    $("#freeDrawing").on('click',function(){
        
		$('#mycomponent').css('padding-top','60px');
			
        $("#forFreeDrawing").show();
        canvas.isDrawingMode = true;
       
    });
	
	$("#drawdone").on('click',function(){
		canvas.isDrawingMode = false;
        
		$('#mycomponent').css('padding-top','0px');
        $("#forFreeDrawing").hide();
	});
	
    // changing width and color of pencil
    $("#drawing_line_width").change(function(){
        var width = parseInt($("#drawing_line_width").val());
        canvas.freeDrawingBrush.width = width;
    });
    $("#drawing-color").on('change',function(){
        var color = $("#drawing-color").val();
        //alert(color);
        canvas.freeDrawingBrush.color = color;
    });
});