<?php
/*
Copyright Justin Whitford 2006.
  http://www.whitford.id.au/
Perpetual, non-exclusive license to use this code is granted
on the condition that this notice is left in tact.
*/
global $page_title, $root_url;
$trailLength=4;
$staleCrumbList = explode('|',$_COOKIE['breadcrumbs']);
if ( 
      $_SERVER['PHP_SELF'].'!'.$page_title !=
      $staleCrumbList[count($staleCrumbList)-1]
   ){
  $crumbList;
  $startPoint=(count($staleCrumbList) < $trailLength+1)?0:1;
  for($i=$startPoint;$i<count($staleCrumbList);$i++){
    $crumbList[$i]=$staleCrumbList[$i];
  }
  $crumbList[count($crumbList)+1]=$_SERVER['PHP_SELF'].'!'.$page_title;
  setcookie('breadcrumbs',join('|',$crumbList),time()+60*60*24*1,'/');
  $_COOKIE['breadcrumbs']=join('|',$crumbList);
}

function breadcrumbs(){
  $crumbList = explode('|',$_COOKIE['breadcrumbs']);
  $returnString = '';
  for($i=1;$i<count($crumbList)-1;$i++){
    $crumb=explode('!', $crumbList[$i]);
    $returnString .= "<span id='bc$i'>"
      ."<a href='$crumb[0]'>" . $crumb[1] . "</a> > </span>";
  }
  $crumb=explode('!', $crumbList[count($crumbList)-1]);
  echo $returnString.$crumb[1];
}

?>                                                                                                                                                   