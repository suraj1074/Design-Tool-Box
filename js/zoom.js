$(document).ready(function(){
	canvasScale = 1;
	SCALE_FACTOR = 1.33;

	$("#zoomInCanvas").click(function(){

		canvasScale = canvasScale * SCALE_FACTOR;
    
	    canvas.setHeight(canvas.getHeight() * SCALE_FACTOR);
	    canvas.setWidth(canvas.getWidth() * SCALE_FACTOR);
	    
	    var objects = canvas.getObjects();
	    for (var i in objects) {
	        var scaleX = objects[i].scaleX;
	        var scaleY = objects[i].scaleY;
	        var left = objects[i].left;
	        var top = objects[i].top;
	        
	        var tempScaleX = scaleX * SCALE_FACTOR;
	        var tempScaleY = scaleY * SCALE_FACTOR;
	        var tempLeft = left * SCALE_FACTOR;
	        var tempTop = top * SCALE_FACTOR;
	        
	        objects[i].scaleX = tempScaleX;
	        objects[i].scaleY = tempScaleY;
	        objects[i].left = tempLeft;
	        objects[i].top = tempTop;
	        
	        objects[i].setCoords();
	    }
	        
	    canvas.renderAll();
	});
	$("#zoomOutCanvas").click(function(){

		canvasScale = canvasScale * (1 / SCALE_FACTOR);
    
	    canvas.setHeight(canvas.getHeight() * (1 / SCALE_FACTOR));
	    canvas.setWidth(canvas.getWidth() * (1 / SCALE_FACTOR));
	    
	    var objects = canvas.getObjects();
	    for (var i in objects) {
	        var scaleX = objects[i].scaleX;
	        var scaleY = objects[i].scaleY;
	        var left = objects[i].left;
	        var top = objects[i].top;
	        
	        var tempScaleX = scaleX * (1 / SCALE_FACTOR);
	        var tempScaleY = scaleY * (1 / SCALE_FACTOR);
	        var tempLeft = left * (1 / SCALE_FACTOR);
	        var tempTop = top * (1 / SCALE_FACTOR);
	        
	        objects[i].scaleX = tempScaleX;
	        objects[i].scaleY = tempScaleY;
	        objects[i].left = tempLeft;
	        objects[i].top = tempTop;
	        
	        objects[i].setCoords();
	    }
	        
	    canvas.renderAll();
	});
});