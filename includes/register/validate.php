<?php
 $required = array ("name" => "Name",
 					"c_name" => "Contact Name (First, Middle Initial, Last)",
  					"address1" => "Address",
					"city" => "City",
					"state" => "State",
					"zip" => "Zip",
					"p1" => "Phone",
					"p2" => "Phone",
					"p3" => "Phone",
					"pa1" => "Alternate Phone",
					"pa2" => "Alternate Phone",
					"pa3" => "Alternate Phone",
					"email" => "E-mail",
					"password" => "Password",
					"pwconfirm" => "Confirm Password");
foreach($required as $field => $label)
{
  	if (!$_POST[$field])
  	{$err .="$label is a required field <br>";}
		}
		
		if (!eregi('^[0-9]+$', $zip))
		{$err .="Your zip code can only contain numbers <Br>";
		}
		
		if(strlen($zip) < 5 )
		{$err .="Your zip code must be 5 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', "$p1$p2$p3"))
		{$err .="Your phone number can only contain numbers <Br>";
		}
		
		if(strlen("$p1$p2$p3") < 10 )
		{$err .="Your phone number must be 10 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', "$pa1$pa2$pa3"))
		{$err .="Your alternate phone number can only contain numbers <Br>";
		}
		
		if(strlen("$pa1$pa2$pa3") < 10 )
		{$err .="Your alternate phone number must be 10 digits <br>";
		}
		
		if (!check_email_address($email)) 
		{$err .="$email is not a valid email address <br>";
		}
		
		if (!var_check2($tax, $ssn))
		{$err .="You must enter your Social Security Number or Federal Tax ID<br>";
		}
		
		if (!var_check($tax, $ssn))
		{$err .="Please only enter your Social Security Number <em>or</em> Federal Tax ID, not both<br>";
		}
		
		if (char_check($ssn))
		{$err .="Your social security number can only contain numbers <Br>";
		}
		
		if (char_check($tax))
		{$err .="Your federal tax ID can only contain numbers <Br>";
		}
		
		if(length_check($ssn))
		{$err .="Your social security number must be 9 digits <br>";
		}
		
		if(length_check($tax))
		{$err .="Your Federal Tax ID must be 9 digits <br>";
		}
		
		if(strlen($password) < 6 )
		{$err .="Your password must be at least 6 characters <br>";
		}
	
		if ($password != $pwconfirm)
		{$err .="Your passwords must match <br>";
		}
	
?>