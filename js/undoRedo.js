$(document).ready(function(){
	var current;
	var list = [];
	var state = [];
	var index = 0;
	var index2 = 0;
	var action = false;
	var refresh = true;

	canvas.on("object:added", function (e) {
	    var object = e.target;

	    if (action === true) {
	        state = [state[index2]];
	        list = [list[index2]];

	        action = false;
	        index = 1;
	    }
	    object.saveState();

	    state[index] = JSON.stringify(object.originalState);
	    list[index] = object;
	    index++;
	    index2 = index - 1;
	    
	    refresh = true;
	});

	canvas.on("object:modified", function (e) {
	    var object = e.target;

	    if (action === true) {
	        state = [state[index2]];
	        list = [list[index2]];

	        action = false;
	        console.log(state);
	        index = 1;
	    }

	    object.saveState();

	    state[index] = JSON.stringify(object.originalState);
	    list[index] = object;
	    index++;
	    index2 = index - 1;

	    refresh = true;
	});

	function undo() {

	    if (index <= 0) {
	        index = 0;
	        return;
	    }
	    
	    if (refresh === true) {
	        index--;
	        refresh = false;
	    }

	    index2 = index - 1;
	    current = list[index2];
	    current.setOptions(JSON.parse(state[index2]));

	    index--;
	    current.setCoords();
	    canvas.renderAll();
	    action = true;
	}

	function redo() {

	    action = true;
	    if (index >= state.length - 1) {
	        return;
	    }

	    index2 = index + 1;
	    current = list[index2];
	    current.setOptions(JSON.parse(state[index2]));

	    index++;
	    current.setCoords();
	    canvas.renderAll();
	}

	$('#undo').click(function () {
	    undo();
	});
	$('#redo').click(function () {
	    redo();
	});

	$("#grid").click(function(){
		var height = canvas.getHeight();
		var width = canvas.getWidth();
		var context = canvas.getContext("2d");

		for (var x = 0.5; x < width; x += 10) {
		  context.moveTo(x, 0);
		  context.lineTo(x, height);
		}

		for (var y = 0.5; y < height; y += 10) {
		  context.moveTo(0, y);
		  context.lineTo(width, y);
		}

		context.strokeStyle = "#ddd";
		context.stroke();
	});
});