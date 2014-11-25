<?php
include ("/benfund.com/functions/jpgraph/jpgraph.php");
include ("/benfund.com/functions/jpgraph/jpgraph_bar.php");

$datay=array(130,250,210,350,310,660,130,250,210,350,310,260);
$datay2=array(100,200,200,300,300,600,100,200,200,300,300,200);
$datazero=array(0,0,0,0);
$datax=array("Jan","Feb","Mar","Apr","May","June","July","Aug","Sept", "Oct","Nov","Dec");

// Create the graph. 
$graph = new Graph(350,200);

//Graph Title
$graph->title->Set('Monthly Expense Report');
$graph->title->SetFont(FF_GEORGIA,FS_BOLD,12);
$graph->title->SetColor("#2B50FF");

// Setup Y and Y2 scales with some "grace"	
$graph->SetScale("textlin");
$graph->SetY2Scale("lin");
$graph->yaxis->scale->SetGrace(30);
$graph->y2axis->scale->SetGrace(30);

//$graph->ygrid->Show(true,true);
$graph->ygrid->SetColor('gray','lightgray@0.5');

// Setup graph colors
$graph->SetMarginColor('white');

//Hide Y2 Axis Lables
$graph->y2axis->Hide();

// Create the "dummy" 0 bplot
$bplotzero = new BarPlot($datazero);

// Create the "Y" axis group
//Charges
$ybplot1 = new BarPlot($datay2);
//$ybplot1->SetFormt('$%01.2f');
$ybplot1->value->Show();
$ybplot1->value->SetColor('#0000A0');
$ybplot1->value->SetFont(FF_ARIAL,FS_NORMAL, 8);
$ybplot1->value->SetMargin(5);
$ybplot1->value->SetAngle(60);
//$ybplot1->SetFormt('$%01.2f');
$ybplot1->SetFillGradient("#408CFF","#F0F0FF",GRAD_HOR);
$ybplot = new GroupBarPlot(array($ybplot1,$bplotzero));

// Setup font for axis
//Bottom Lables
$graph->xaxis->SetFont(FF_GEORGIA,FS_NORMAL,10);
$graph->xaxis->SetColor("#1B1B1B");
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(50);
//Left Lables
$graph->yaxis->SetFont(FF_GEORGIA,FS_NORMAL,10);
$graph->yaxis->SetColor('#1B1B1B');
//$graph->y2axis->SetFont(FF_VERDANA,FS_NORMAL,10);

// Create the "Y2" axis group
$ybplot2 = new BarPlot($datay);
$ybplot2->value->Show();
$ybplot2->value->SetColor('#008000');
$ybplot2->value->SetFont(FF_ARIAL,FS_NORMAL, 8);
$ybplot2->value->SetMargin(0);
$ybplot2->value->SetAngle(60);
//$ybplot2->value->SetFormt('$%01.2f');
$ybplot2->SetFillGradient("#80FF80","#E8FFE8",GRAD_HOR);
$y2bplot = new GroupBarPlot(array($bplotzero,$ybplot2));

// Setup X-axis labels


// Add the grouped bar plots to the graph
$graph->Add($ybplot);
$graph->AddY2($y2bplot);

// .. and finally stroke the image back to browser
$graph->Stroke();
?>
