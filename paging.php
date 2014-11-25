<?php
session_start();
require ("includes/globals.php");
require($ROOT."/functions/common.php");
@ $rpp;        //Records Per Page
@ $cps;        //Current Page Starting row number
@ $lps;        //Last Page Starting row number
@ $a;        //will be used to print the starting row number that is shown in the page
@ $b;         //will be used to print the ending row number that is shown in the page
/////////////////////////////////////////////////////////////////////////////////
//Database connection
/////////////////////////////////////////////////////////////////////////////////
benfund_connect();
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//Following IF Statement is used to make sure when the page is loaded for the
//first time, Current Page's Starting row number is 0, i.e. 1st row from the
//table is being printed. It will change as the user will click on next.
/////////////////////////////////////////////////////////////////////////////////   
if(empty($_GET["cps"]))
{
    $cps = 0;
}
else
{
    $cps = $_GET["cps"];
}
/////////////////////////////////////////////////////////////////////////////////

$a = $cps+1;

if(empty($_POST["limit"]))
{
    $rpp = 10;
}
else
{
    $rpp = $_POST["limit"];
}

$lps = $cps - $rpp; //Calculating the starting row number for previous page

/////////////////////////////////////////////////////////////////////////////////
//Following IF Statement is used to make sure whether a link to Previous page is
//needed or not. If the user is viewing the first set of data then the link will
//be disabled, if on the next set then it will carry the $lps in its link and
//enable the link
if ($cps <> 0)
{
    $prv =  "<a href='paging.php?cps=$lps'>Previous</a>";
}
else   
{
    $prv =  "<font color='cccccc'>Previous</font>";
}
/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
//Following SQL Statement uses SQL_CALC_FOUND_ROWS function to calculate total
//number of rows found by the query excluding the limit function added at the
//end of the SQL statement. This is followed by second query with FOUND_ROWS()
//function which actually gives out the number of rows found.
/////////////////////////////////////////////////////////////////////////////////
$q="Select SQL_CALC_FOUND_ROWS * from paging limit $cps, $rpp";
$rs=mysql_query($q) or die(mysql_error());
$nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action

$q0="Select FOUND_ROWS()";
$rs0=mysql_query($q0) or die(mysql_error());
$row0=mysql_fetch_array($rs0);
$nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action

/////////////////////////////////////////////////////////////////////////////////
//Following IF Statement is used to determine whether the user has reached the
//last page of the records. For example, if we have 27 rows to print and we show
//10 rows per page, then on the third and the last page it will show seven rows
//and will say at the top that SHOWING RECORDS FROM 21 to 27. If the following
//validator is not used then it shows SHOWING RECORDS FROM 21 to 30.
/////////////////////////////////////////////////////////////////////////////////   
if (($nr0 < 10) || ($nr < 10))
{
       $b = $nr0;
}
else
{
    $b = ($cps) + $rpp;
}
/////////////////////////////////////////////////////////////////////////////////

?>
<html>
<head>
<title>Record Set Paging with PHP</title>
</head>

<body>
<br>
<table border="0" cellpadding="4" cellspacing="1" width="20%" align="center">
<tr><td align=left colspan="2"><b><font face="verdana" size=1 color="#9999CC">Show this many records:</font></b>
<form name="limit_select" id="limit_select" method="POST">
<select name="limit" id="limit" onchange="this.form.submit();">
<option value="10" <?php if($_POST['limit'] == 10){ echo "selected";}?>>10</option>
<option value="20" <?php if($_POST['limit'] == 20){ echo "selected";}?>>20</option>
<option value="30" <?php if($_POST['limit'] == 30){ echo "selected";}?>>30</option>
<option value="40" <?php if($_POST['limit'] == 40){ echo "selected";}?>>40</option>
<option value="50" <?php if($_POST['limit'] == 50){ echo "selected";}?>>50</option>
</select>
</td></tr>
  <tr><td align=left colspan="2"><b><font face="verdana" size=1 color="#9999CC"><? echo "$nr0 Records Found - ".$rpp; ?></font></b></td></tr>
  <tr><td align='left' colspan="2"><b><font face="verdana" size=1 color="#9999CC"><? echo "Showing Records from $a to $b"; ?></font></b></td></tr>
  <tr><td bgcolor="#000080" align='Center'><b><font face="verdana" color="#FFFFFF">SL#</font></b></td>
  <td bgcolor="#000080" align='Center'><b><font face="verdana" color="#FFFFFF">Value</font></b></td>
</tr>
<?
while ($row=mysql_fetch_array($rs))
{
    /////////////////////////////////////////////////////////////////////////////////
    //This is used to show the serial number on the page as well as to count it up
    //so that we can get the next page's starting row number when it exits the while
    //loop after fullfilling the above SQL criteria.
    /////////////////////////////////////////////////////////////////////////////////
    $cps = $cps +1;

    $val=$row["name"];
    echo "<tr><td align='center'><font face=verdana>$cps</font></td><td align='center'><font fave=verdana>$val</font></td></tr>"; 
}

echo "<tr><td align='right' colspan=2>$prv";

/////////////////////////////////////////////////////////////////////////////////
//Following IF Statement is used to determine whether the Next link will be
//enabled or disabled. If the user has reached the last page of the record, then
//the Next link will be disabled.
/////////////////////////////////////////////////////////////////////////////////
if ($cps == $nr0)
{     
    echo "  |  <font color='CCCCCC'>Next</font>";
}
else
{
    if ($nr0 > 5)
    {
        echo "  |  <a href='paging.php?cps=$cps&lps=$lps'>Next</a>";
    }
}
/////////////////////////////////////////////////////////////////////////////////
?>
</td>
</tr>
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>