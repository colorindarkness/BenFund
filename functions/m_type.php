<?php
function m_type($mid)
{
  mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
  mysql_select_db("benfund") or die(mysql_error());
  $query = "SELECT m_type FROM merchants WHERE id='$mid'";
  $results = mysql_query($query);
  $type = mysql_fetch_array($results);
  $m_type = $type[0];
  
  if ($m_type == 1)
  {$account = array ("type" => "layaway",
  					 "payment" => "make a payment");
	session_register($account);
  }
  if ($m_type == 2)
  {$account = array ("type" => "fundraiser",
  					 "payment" => "make a donation");
	session_register($account);				
  }
  if ($m_type == 3)
  {$account = array ("type" => "accounts receivable",
  					 "payment" => "make a payment");
	session_register($account);
  }
}

?>