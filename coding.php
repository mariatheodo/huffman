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
	
	<p> Το κείμενό σας ήταν το <?php echo $m; ?></p> <!-- εμφανίζω αυτό που πληκτρολογήθηκε -->
	<pre>
	<?php
		$letters = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"); // δημιουργώ πίνακα με όλα τα γράμματα
		$matrix = array_fill_keys($letters, 0); // δίνω μηδενικές τιμές σε όλα τα κλειδιά 
		
		for ($x = 0; $x < strlen($m); $x++) {
			@$matrix[substr($m, $x, 1)]++; // μετράω πόσες εμφανίσεις έχει κάθε γράμμα
		} 
		$counts = array();
		foreach ($matrix as $letter => $num) {
			if ($num != 0) {
				$counts[$letter] = $num; // βάζω στον πίνακα counts μόνο αυτά που έχουν έστω και μία εμφάνιση
			}
		}
		$sum = 0;
		foreach ($counts as $letter => $num) {
			$counts[$letter] = round($num / strlen($m), 3); // στον πίνακα counts οι τιμές είναι η συχνότητα εμφάνισης κάθε χαρακτήρα
			$sum += $num / strlen($m);
		}
		asort($counts);
		print_r($counts);
		print_r($sum);
	?>
	</pre>
	
	
	</body>
</html>