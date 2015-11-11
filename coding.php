<!DOCTYPE html>

<?php 
	$m = $_POST["text_to_code"]; 
?>

<html>
	<head>
		<title>Huffman coding</title>
		<link href="styles.css" rel="stylesheet">
		
	</head>
	<body>
	
	<p> Το κείμενό σας ήταν το "<?php echo $m; ?>"</p> <!-- εμφανίζω αυτό που πληκτρολογήθηκε -->
	<p> Οι χαρακτήρες που εμφανίζονται με τη συχνότητά τους είναι:<p>

	<?php
		$letters = count_chars($m, 1); // δημιουργώ πίνακα με όλα τα γράμματα
		$freq = array();
		
		foreach ($letters as $i => $val) {
			echo chr($i);
			echo $val; 
			echo "@";
			echo round($val/strlen($m), 2);
			$chars[chr($i)] = $val;
			$freq[chr($i)] = round($val/strlen($m), 2);
			echo "<br>";
		}
		//var_dump($chars);
		//echo "<br>";
		asort($freq);
		//var_dump($freq);
		//echo "<br>";
		//προσπάθεια με πίνακες
		while (count($freq) > 1) {
			$low = key($freq);
			
			next($freq);
			$high = key($freq);
			//var_dump($low);
			//var_dump($high);
			$new_value = $freq[$low] + $freq[$high];
			array_insert($freq, array("{$low}{$high}"=>$new_value));
			$chars[$low] = '1';
			$chars[$high] = '0';
			
			asort($freq);
			reset($freq);
			//echo "<hr>";
			//var_dump($chars);
			//echo "<br>";
	
			//var_dump($freq);
			//echo "<hr>";
		}
		$new_matrix = array();
		foreach ($letters as $i => $val) {
			$val = '';
			foreach ($chars as $j => $bin) {
				if (strpos($j, chr($i)) !== false ) {
					@$new_matrix[chr($i)] = "$bin".$new_matrix[chr($i)];
				}
			}
		}
		var_dump($new_matrix);
		
				
		function array_insert (&$array, $insert_array) { 
			$first_array = array_splice ($array, 2); 
			//var_dump($first_array);
			$array = array_merge ($insert_array, $first_array); 
		}

		

	?>

	
	
	</body>
</html>