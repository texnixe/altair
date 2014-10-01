<?php
// Include/load the Mobile_Detect.php script
include_once('Mobile_Detect.php');

// Now create a new mobile detect class
$detect = new Mobile_Detect();

// (Re)set the session variable for the different device classes
$_SESSION['isMobile'] = false;
// $_SESSION['isTablet'] = false;
$_SESSION['isDesktop'] = false;

// Now set the session variables for both device classes
if($detect->isMobile()) {
	$_SESSION['isMobile'] = true;
}
// elseif($detect->isTablet()) {
// 	$_SESSION['isTablet'] = true;
// }
else {
	$_SESSION['isDesktop'] = true; // if device can't be detected, assume it's desktop
}

// Now load the device specific template snippets
function snippet_detect($file, $data = array(), $return = false) {
	if(is_object($data)) $data = array('item' => $data);

	// First set the device class variable
	if($_SESSION['isMobile']) { $deviceClass = 'mobile'; }
	if($_SESSION['isDesktop']) { $deviceClass = 'desktop'; }

	// Then load the device class specific snippet
	if ($deviceClass == 'mobile') {
		// Embed the mobile snippet (`mobile` is the default snippet, without the device specific `.postfix`)
		return tpl::load(kirby::instance()->roots()->snippets() . DS . $file . '.php', $data, $return);
	} else {
		// Embed the device class specific snippet
		return tpl::load(kirby::instance()->roots()->snippets() . DS . $file . '.' . $deviceClass . '.php', $data, $return);
	}

}

?>
