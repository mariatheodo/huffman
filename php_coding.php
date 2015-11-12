<?php
		$m = $_POST["text_to_code"]; 
		
		$letters = count_chars($m, 1); // δημιουργώ πίνακα με όλα τα γράμματα
		$freq = array();
		
		foreach ($letters as $i => $val) {

			$chars[chr($i)] = $val;
			$freq[chr($i)] = round($val/strlen($m), 2);

		}

		asort($freq); //ταξινομώ τον πίνακα ως προς τις τιμές
		
		while (count($freq) > 1) { 
			$low = key($freq); //παίρνω το κλειδί της πρώτης θέσης,
			
			next($freq); //πάω στην επόμενη
			$high = key($freq);

			$new_value = $freq[$low] + $freq[$high]; //προσθέτω τις συχνότητες εμφάνισης
			array_insert($freq, array("{$low}{$high}"=>$new_value));
			$chars[$low] = '1'; //δίνω τιμές '1' και '0' σε κάθε χαρακτήρα ή συνδυασμό τους
			$chars[$high] = '0';
			
			asort($freq); // ξαναταξινομώ τον πίνακα
			reset($freq); //μεταφέρω το current στην πρώτη θέση του πίνακα

		}
		$new_matrix = array();
		foreach ($letters as $i => $val) { //στον πίνακα new_matrix δίνω τιμές σε κάθε χαρακτήρα τον νέο κώδικα
			$val = '';
			foreach ($chars as $j => $bin) { 
				if (strpos($j, chr($i)) !== false ) {
					@$new_matrix[chr($i)] = "$bin".$new_matrix[chr($i)];
				}
			}
		}
		
		$new_string = huf_string($m, $new_matrix);
		
		$new_length = strlen($new_string);

		//αφαιρώ τα δύο πρώτα στοιχεία του πίνακα και στη θέση τους βάζω το συνδυασμό τους		
		function array_insert (&$array, $insert_array) { 
			$first_array = array_splice ($array, 2); 
			//var_dump($first_array);
			$array = array_merge ($insert_array, $first_array); 
		}
		
		function huf_length ($text, $matrix) {
			$length = 0;
			$arr = str_split($text);
			foreach ($arr as $i => $val) {
				
				$length += strlen($matrix[$val]);
				
			}
			return $length;
		}
		
		function huf_string ($text, $matrix) {
			$huf_string = '';
			$arr = str_split($text);
			foreach ($arr as $i => $val) {
				
				$huf_string .= $matrix[$val];
				
			}
			return $huf_string;
		}

	?>