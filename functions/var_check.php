<?php
function var_check($var1, $var2)
{
	if (empty($var1))
	{return true;
	}
	else	
	{	
		if(empty($var2))
		{return true;
		}
		else
		{return false;
		}
	}

}

function var_check2($var1, $var2)
{
	if (empty($var1))
	{	if(empty($var2))
		{return false;
		}
		else
		{return true;
		}
	}
	else
	{return true;}
}

function length_check($var)
{
	if(empty($var))
	{return false;
	}
	else
	{	if(strlen($var) < 9)
		{return true;
		}
		else
		{return false;
		}
	}
}

function char_check($var)
{
	if(empty($var))
	{return false;
	}
	else
	{	if(!eregi('^[0-9]+$', $var))
		{return true;
		}
		else
		{return false;
		}
	}
}
?>