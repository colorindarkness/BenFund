<?php
/*
Project Name:		Ajax Toybox
Project URI:		http://www.funwithjustin.com/ajax-toybox/
Description:		This project is designed as a showcase for Ajax tools and techniques. Due to the experimental 						nature of the applications in this project, please excuse the occasional error message or problem 					in making things work.
Version:			1.0
Author:				Justin Schultz
Author URI:			http://www.funwithjustin.com/

Comments:			If you benefit from these examples, I'd really appreciate a link back to
					my blog @ http://www.FunWithJustin.com/
*/

$op1 = $_REQUEST['op1'];
$op2 = $_REQUEST['op2'];


switch($_REQUEST['op']) {
	case 'a':
		echo "ajax|" . ($op1 + $op2);
	    break;
	case 's':
		echo "ajax|" . ($op1 - $op2);
	    break;
	case 'm':
		echo "ajax|" . ($op1 * $op2);
	    break;
	case 'd':
		echo "ajax|" . ($op1 / $op2);
	    break;
}
?>