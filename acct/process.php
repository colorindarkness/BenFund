<?php
function stringForJavascript($in_string) {
   $str = ereg_replace("[\r\n]", " \\n\\\n", $in_string);
   $str = ereg_replace('"', '\\"', $str);
   Return $str;
}
switch($_GET['id']) {
	case 'tab1':
		$content = include ('history.php');
		break;
	case 'tab2':
		$content = 'This is content for tab 2.';
		break;
	case 'tab3':
		$content = 'This is content for tab 3.';
		break;
	case 'tab4':
		$content = 'This is content for tab 4.';
		break;
	default:
		$content = 'There was an error.';
		break;								
	
} 
print stringForJavascript($content);
usleep(400000);
?>