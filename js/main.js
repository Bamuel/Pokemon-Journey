var steps = 0;
var bg1 = $("#ad");
var bg2 = $("#ad2");
function onClick() {
    steps += 1;
    document.getElementById("steps").innerHTML = steps;
		bg1.css("left", (bg1.css("left") - 10 + "px"));
		bg2.css("left", (bg2.css("left") - 10 + "px"));
		
		
		if(steps % 25 == 0) {
			$("#ag").toggle(function() {
					$("#ag2").toggle();
			});
			
		}
}
$(function() {
	
	$("#ag2").click(function() {
		$("#ag2").toggle(function() {
			$("#ag").toggle();
		});
	});
	
});