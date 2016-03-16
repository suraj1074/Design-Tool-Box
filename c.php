<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>jsScrollbar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
.Scroller-Container {
  position: absolute;
  top: 0px; left: 0px;
}
.Scrollbar-Up {
  position: absolute;
  width: 10px; height: 10px;
  background-color: #CCC;
  font-size: 0px;
}
.Scrollbar-Track {
  width: 10px; height: 160px;
  position: absolute;
  top: 20px;
  background-color: #EEE;
}
.Scrollbar-Handle {
  position: absolute;
  width: 10px; height: 30px;
  background-color: #CCC;
}
.Scrollbar-Down {
  position: absolute;
  top: 190px;
  width: 10px; height: 10px;
  background-color: #CCC;
  font-size: 0px;
}
#Scrollbar-Container {
  position: absolute;
  top: 50px; left: 460px;
}

#Container {
  position: absolute;
  top: 50px; left: 50px;
  width: 400px;
  height: 200px;
  background-color: #EEE;
}
#News, #About, #Extra { 
  position: absolute;
  top: 10px; 
  overflow: hidden;
  width: 400px;
  height: 180px;
  display: none;
}
#News {display: block;}
p {
  margin: 0; padding: 0px 20px 10px;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 11px;
  text-indent: 20px;
  color: #777;
}
#Navigation {
  position: absolute; 
  top: 30px;
  left: 75px;
}
#Navigation a {
  margin: 5px 2px 0 0;
  padding: 0 5px;
  height: 20px;
  background-color: #E4E4E4;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 10px;
  color: #AAA;
  text-decoration: none;
  display: block;
  float: left;
  letter-spacing: 1px;
}
#Navigation a:hover {
  margin-top: 0px;
  height: 25px;
}
#Navigation a.current {
  margin-top: 0px;
  height: 25px;
  background-color: #EEE;
  color: #777;
}
</style>
<script type="text/javascript" src="js/jsScroller.js"></script>
<script type="text/javascript" src="js/jsScrollbar.js"></script>
<script type="text/javascript">
var scroller  = null;
var scrollbar = null;

window.onload = function () {
  scroller  = new jsScroller(document.getElementById("News"), 400, 180);
  scrollbar = new jsScrollbar (document.getElementById("Scrollbar-Container"), scroller, true, scrollbarEvent);
}

function scrollbarEvent (o, type) {
	if (type == "mousedown") {
		if (o.className == "Scrollbar-Track") o.style.backgroundColor = "#E3E3E3";
		else o.style.backgroundColor = "#BBB";
	} else {
		if (o.className == "Scrollbar-Track") o.style.backgroundColor = "#EEE";
		else o.style.backgroundColor = "#CCC";
	}
}

</script>
</head>
<body>

<div id="Container">
  <div id="News">
    <div class="Scroller-Container">
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis, ante et congue feugiat, elit wisi commodo metus, ut commodo ligula enim ac justo. Pellentesque id ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus vitae mi a elit dictum volutpat. Pellentesque nec arcu. Etiam blandit. Phasellus egestas dolor ut lacus. Sed enim justo, sagittis ut, condimentum non, ullamcorper eu, neque. In hac habitasse platea dictumst. Integer ipsum risus, sagittis ac, imperdiet ac, interdum sed, libero. Praesent commodo. Mauris congue, urna eget hendrerit elementum, dolor ligula ultrices neque, in elementum ante erat et elit.</p>
      <p>Vivamus vehicula. Integer cursus massa et nisl. Morbi pretium sem eget risus. Vestibulum nec est. Donec feugiat purus et ligula. Quisque semper. Sed eu ante. Curabitur suscipit porttitor libero. Nam eros leo, sollicitudin eget, tincidunt vitae, facilisis a, dui. Proin neque. Aliquam erat volutpat. Pellentesque felis.</p>
      <p>Aliquam consequat. Proin feugiat ultricies dui. Suspendisse mollis dui nec nunc. Nam tristique, ante vitae imperdiet vestibulum, elit nulla rhoncus nisl, vitae tincidunt dolor dui eu mi. In hac habitasse platea dictumst. Nunc blandit dolor vel mauris. Proin wisi. Nam pharetra ultrices tellus. Sed arcu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam ultricies semper wisi. Sed nisl. Donec blandit. Nunc vitae urna sed nisl mattis ornare.</p>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis, ante et congue feugiat, elit wisi commodo metus, ut commodo ligula enim ac justo. Pellentesque id ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus vitae mi a elit dictum volutpat. Pellentesque nec arcu. Etiam blandit. Phasellus egestas dolor ut lacus. Sed enim justo, sagittis ut, condimentum non, ullamcorper eu, neque. In hac habitasse platea dictumst. Integer ipsum risus, sagittis ac, imperdiet ac, interdum sed, libero. Praesent commodo. Mauris congue, urna eget hendrerit elementum, dolor ligula ultrices neque, in elementum ante erat et elit.</p>
      <p>Vivamus vehicula. Integer cursus massa et nisl. Morbi pretium sem eget risus. Vestibulum nec est. Donec feugiat purus et ligula. Quisque semper. Sed eu ante. Curabitur suscipit porttitor libero. Nam eros leo, sollicitudin eget, tincidunt vitae, facilisis a, dui. Proin neque. Aliquam erat volutpat. Pellentesque felis.</p>
      <p>Aliquam consequat. Proin feugiat ultricies dui. Suspendisse mollis dui nec nunc. Nam tristique, ante vitae imperdiet vestibulum, elit nulla rhoncus nisl, vitae tincidunt dolor dui eu mi. In hac habitasse platea dictumst. Nunc blandit dolor vel mauris. Proin wisi. Nam pharetra ultrices tellus. Sed arcu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam ultricies semper wisi. Sed nisl. Donec blandit. Nunc vitae urna sed nisl mattis ornare.</p>
    </div>
  </div>
  
</div>
<div id="Scrollbar-Container">
  <div class="Scrollbar-Up"></div>
  <div class="Scrollbar-Down"></div>
  <div class="Scrollbar-Track">
    <div class="Scrollbar-Handle"></div>
  </div>
</div>
</body>
</html>
