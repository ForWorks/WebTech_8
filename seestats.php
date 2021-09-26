<!DOCTYPE html>
<html>
	<head>
		<meta lang="ru" charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="Test">
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>Test</title>
	</head>
	<body>
		<table>			
			<?php
				$file = file("stat.log");
				$mas = array();					
				$counts = array();
				for($i = 0; $i < sizeof($file); $i++) {											
					if(!in_array($file[$i], $mas)) {	
						$mas[] = $file[$i];		
						$counts[] = 1;
					}			
					else {
						for($j = 0; $j < sizeof($mas); $j++) {
							if($mas[$j] == $file[$i])
								$counts[$j]++;
						}
					}
				}		
				
				$mas[] = "127.0.0.2"; $mas[] = "127.0.0.3";
				$counts[] = 8; $counts[] = 3;				
				
				for($i = 0; $i < sizeof($counts) - 1; $i++) {
					$max = $i;
					for($j = $i + 1; $j < sizeof($counts); $j++) {
						if($counts[$max] < $counts[$j])
							$max = $j;
					}
					$temp = $mas[$i]; 
					$mas[$i] = $mas[$max];
					$mas[$max] = $temp;
					$temp = $counts[$i]; 
					$counts[$i] = $counts[$max];
					$counts[$max] = $temp;
				}
				if(sizeof($mas) > 0) {
			?>
			<tr>				
			<td><b>IP адрес</b></td>
			<td><b>Количество</b></td>				
			</tr>
			<?php
					for($i = 0; $i < sizeof($mas); $i++) {   					
						echo '<tr><td>'.$mas[$i].'</td>';
						echo '<td>'.$counts[$i].'</td></tr>';					
					}
				}
				else {
					echo "Сайт пока никто не посещал :(";
				}					
			?>
		</table>
	</body>
</html>

			