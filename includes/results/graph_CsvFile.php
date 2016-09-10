<?php

	session_start();

	function createGraphCsv($user) {

		// $file_handle=fopen('sessions/'. $user . '_stats.csv','r');
		// $file=fopen('sessions/mod_type_data_'. $user. '.txt',"w");
		$file_handle=fopen($_SESSION['session_dir'] . $user . '_stats.csv','r');
		$file=fopen($_SESSION['session_dir'] . 'mod_type_data_'. $user. '.txt',"w");

		$count=array();
		$s_dev=array();
		$temp_count_dev=0;
		$temp_count=0;
		$skip=1;
		$num=0;

		while (! feof($file_handle) )
		{
			if($temp_count==1)
			{
				$skip=1;
			}
			$line_of_text = fgetcsv($file_handle,2048,',');
			if($line_of_text[1]=="Sum")
			{
				break;
			}
			if($skip==1)
			{
				$num=count($line_of_text);
				$count[$temp_count]=array();
				for($i=1;$i<$num;$i++)
				{
					if($temp_count==0)
					{
						$count[$temp_count][$i-1]=$line_of_text[$i];
					}
					else
					{
						$count[$temp_count][$i-1]=(float)$line_of_text[$i];
					}

				}
				$skip=0;
				$temp_count++;
				continue;
			}
			if($skip==0)
			{
				$num=count($line_of_text);
				$s_dev[$temp_count_dev]=array();
				for($i=2;$i<$num;$i++)
				{
					// $s_dev[$type_names[$temp_count_dev]][$count[0][$i-1]]=(float)$line_of_text[$i];
					$s_dev[$_SESSION['taskNames'][$temp_count_dev]][$count[0][$i-1]]=(float)$line_of_text[$i];
				}
				$temp_count_dev++;
				$skip=1;
				continue;
			}
		}

		fclose($file_handle);
		$count[0][0]='time';

		for($i=0;$i<$temp_count-1;$i++)
		{
			// $count[$i+1][0]=$type_names[$i];
			$count[$i+1][0]=$_SESSION['taskNames'][$i];
		}

		for($i=0;$i<$num-1;$i++)
		{
			for($j=0;$j<$temp_count-1;$j++)
			{
				fwrite($file,$count[$j][$i].",");
			}
			fwrite($file,$count[$temp_count-1][$i]."\n");
		}

		fclose($file);

		$_SESSION['n_columnsCsv']=$num;
		echo "<script>d3_visual('" . $user . "'," . (string)$num . ", 'mod_type_data_" . $user . ".txt')</script>";
	}
?>
