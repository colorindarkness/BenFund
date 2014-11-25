<?php
session_start();
$class = $_GET['class'];
$balance = $_GET['balance'];
$goal = $_GET['total'];
include ("/benfund.com/functions/jpgraph/jpgraph.php");
include ("/benfund.com/functions/jpgraph/jpgraph_pie.php");
include ("/benfund.com/functions/jpgraph/jpgraph_pie3d.php");

if ($class = 1){
	$label1 = 'Funds Raised';
	$label2 = 'Goal';
	$title = 'Fundraising Objective';
}

// Some data
$data = array($balance, $total);
//$data = $findata;

// Create the Pie Graph.
$graph = new PieGraph(200,170,"auto");

// Set A title for the plot
$graph->title->Set($title);
$graph->title->SetFont(FF_TIMES,FS_BOLD,16);
$graph->title->SetColor("darkgray");
$graph->legend->Pos(0.075,0.2);
$graph->SetFrame(false);

// Create 3D pie plot
$p1 = new PiePlot3d($data);
$p1->SetSliceColors(array('#5CD900', '#6666FF')); 
$p1->SetCenter(0.45, 0.65);
$p1->SetSize(70);

// Adjust projection angle
$p1->SetAngle(45);

// Adjsut angle for first slice
$p1->SetStartAngle(80);

// Display the slice values
$p1->value->SetFont(FF_TIMES,FS_BOLD,11);
$p1->value->SetColor("navy");

// Add colored edges to the 3D pie
// NOTE: You can't have exploded slices with edges!
$p1->SetEdge("navy");
$p1->SetLabelType(PIE_VALUE_ABS);
$p1->value->SetFormat('$%d'); 
$p1->SetLabels(array($balance, $total),1);
$p1->SetLabelPos(0.3);
$p1->SetLegends(array($label1, $label2));

$graph->Add($p1);
$graph->SetAntiAliasing(); 
$graph->Stroke();

?>


