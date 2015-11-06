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
		
		foreach ($letters as $i => $val) {
			echo chr($i);
			echo $val; 
			echo "@";
			echo round($val/strlen($m), 2);
			echo "<br>";
		}

	?>

	
	
	</body>
</html>