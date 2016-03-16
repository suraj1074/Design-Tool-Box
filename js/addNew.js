$(document).ready(function(){
	function addCanvas(canvasId){
		$(".layersRight").append("<div class='canvasLayer' id='canvas-"+canvasId+"'><h4 class='hi'>Canvas "+canvasId+" <a  style='float:right;color:red;cursor:pointer' id='"+canvasId+"' class='canvasclosex'>x</a></h4></div>");
	}
	$("#addNew").click(function(){
		var Id = 'c' + canvasId;
		 $('<canvas>').attr({
        	id: Id
    	}).appendTo('.content');
		document.getElementById('c'+canvasId).style.height = '450px';
		document.getElementById('c'+canvasId).style.width = '640px';
    	var name = new fabric.Canvas(Id,{selection: false});
    	name.setHeight(450);
		name.setWidth(640);
    	canvas = name;
    	presentCanvas = canvasId;
    	names.push(name);
    	addCanvas(canvasId);
    	canvasId ++;
		
	});
	
	
});