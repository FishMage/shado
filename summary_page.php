<?php

	session_start();

	$html_head_insertions .= '<link rel="stylesheet" href="styles/assist_summary.css">';

	$curr_page='summaryReportPage';
	$page_title='Print Report';
	require_once('header.php');
	require_once("side_navigation.php");

	$low_count_0=$_SESSION['low_count_0'];
	$normal_count_0=$_SESSION['normal_count_0'];
	$high_count_0=$_SESSION['high_count_0'];
	$low_count_1=$_SESSION['low_count_1'];
	$normal_count_1=$_SESSION['normal_count_1'];
	$high_count_1=$_SESSION['high_count_1'];

	if ($_SESSION['operator1'] == -1) {
		$operator2Style = 'display:none; ';
	} else {
		$operator2Style = ' ';
	}
?>

<style>
		#low_work_0, #high_work_0{ color: <?php if(($low_count_0+$high_count_0)>$normal_count_0){ echo "red";} else{ echo "black";}?>;}
		#normal_work_0{ color: <?php if(($low_count_0+$high_count_0)<$normal_count_0){ echo "green";} else{ echo "black";}?>;}

		#low_work_1, #high_work_1{ color: <?php if(($low_count_1+$high_count_1)>$normal_count_1){ echo "red";} else{ echo "black";}?>;}
		#normal_work_1{ color: <?php if(($low_count_1+$high_count_1)<$normal_count_1){ echo "green";} else{ echo "black";}?>;}

		#submit1, #submit2{
			display: none;
		}

/*		@media print
		{
			.no-print, .no-print *
			{
				display: none !important;
			}
		}*/
		
		#text-box{display: block;}
	#howTab{display: block;}
	
	
	
</style>

<div id="print-content">

	<form>
			<div id="next_page" class="printPdf" onclick="var submit = getElementById('button'); button.click()";>
			</div>
			<input type="button" id="button" onclick="printDiv('print-content')" value="print a div!" style='display:none;'/>
	</form>

	<?php
		require_once("assist.html");
		require_once("graph_engineer.php");
		echo "<br>";
		require_once("graph_nav_static.php");
		graphText('sessions/Engineer_stats.csv');
		/* require_once('graph_calculations.php'); */
		

		
	?>
</div>

<script type="text/javascript">




document.getElementById('text_box').style.display="block";
document.getElementById('introduction_text').style.display="block";
document.getElementById('howTab').style.display="block";
document.getElementById('operator2').style.display="none";
function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>

<?php
	require_once("footer.php");
?>
