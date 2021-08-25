// Force Menu Depth to Match Front End

// main menu can only have one child level
if (document.getElementById("locations-primary_navigation").checked) {
	wpNavMenu.options.globalMaxDepth = 1;
}

// footer menu have only top level
if (
	document.getElementById("locations-footer_one").checked ||
	document.getElementById("locations-footer_two").checked
) {
	wpNavMenu.options.globalMaxDepth = 0;
}
// all other menu locations stay at the WP default
