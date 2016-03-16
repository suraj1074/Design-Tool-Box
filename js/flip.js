$(document).ready(function(){
	$("#fv").click(function(){
		if(canvas.getActiveObject()){
			var obj = canvas.getActiveObject();
			obj.toggle('flipY');
			canvas.renderAll();
		}
	});
	$("#fh").click(function(){

		if(canvas.getActiveObject()){
			var obj = canvas.getActiveObject();
			obj.toggle('flipX');
			canvas.renderAll();
		}
	});
});