$(document).ready(function(){
	$(".addTextbox").click(function(){
		var text = new fabric.IText('write here',{left: 50 , top :50});
		canvas.add(text);
		canvas.setActiveObject(text);
		text.enterEditing();
		text.selectAll();
		$(".layersRight").append("<div><span class='layer' id='"+k+"'>"+k+"</span>Layer<button class='delete'>Delete this</button></div>");
	    k = k + 1;
	});
	function setStyle(object, styleName, value) {
	  if (object.setSelectionStyles && object.isEditing) {
	    var style = { };
	    style[styleName] = value;
	    object.setSelectionStyles(style);
	  }
	 	else {
	  	 object[styleName] = value;
	  }
	}

	function getStyle(object, styleName) {
	  return (object.getSelectionStyles && object.isEditing)
	    ? object.getSelectionStyles()[styleName]
	    : object[styleName];
	}

	function addHandler(id, fn, eventName) {
	  document.getElementById(id)[eventName || 'onclick'] = function() {
	    var el = this;
	    if (obj = canvas.getActiveObject()) {
	      fn.call(el, obj);
	      canvas.renderAll();
	    }
	  };
	}

	addHandler('underline', function(obj) {
	  var isUnderline = (getStyle(obj, 'textDecoration') || '').indexOf('underline') > -1;
	  setStyle(obj, 'textDecoration', isUnderline ? '' : 'underline');
	});

	addHandler('bold', function(obj) {
 	 	var isBold = getStyle(obj, 'fontWeight') === 'bold';
  		setStyle(obj, 'fontWeight', isBold ? '' : 'bold');
	});
		
	addHandler('italic', function() {
	  var isItalic = getStyle(obj, 'fontStyle') === 'italic';
	  setStyle(obj, 'fontStyle', isItalic ? '' : 'italic');
	});

	addHandler('color', function(obj) {
	  setStyle(obj, 'fill', this.value);
	}, 'onchange');

	addHandler('size', function(obj) {
	  setStyle(obj, 'fontSize', parseInt(this.value, 10));
	}, 'onchange');

	addHandler('font-control',function(obj){
		setStyle(obj,'fontFamily',$('#font-control').val());
	},'onchange');

	// showing hiding for textbox options
	canvas.on('mouse:down', function(options) {
 	 	if (options.target) {
    		if(options.target.type == "i-text")
    		{
    			$("#forTextBox").show();
    		}
    		else
    		{
    			$("#forTextBox").hide();
    		}
  		}
  		else
  		{
  			$("#forTextBox").hide();
  		}
	});
});