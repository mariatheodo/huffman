<!DOCTYPE html>


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Huffman coding</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<style id="style-1-cropbar-clipper">
			.en-markup-crop-options {
				top: 18px;
				left: 50%;
				margin-left: -100px;
				width: 200px;
				border: 2px rgba(255,255,255,.38) solid;
				border-radius: 4px;
			}

			.en-markup-crop-options div div:first-of-type {
				margin-left: 0px;
			}
		</style>
		
	</head>

	<body>
		<div class="container">
			<div class="row page-header header">
				<h1>Κωδικοποίηση Huffman</h1>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="row">
				<?php include 'php_coding.php';?>
				
				<div class="col-md-6, col-lg-6">
	
					<p> Το κείμενό σας ήταν το: </p>
					<div class="panel panel-default">
					<div class="panel-heading"><?php echo $m; ?></div> <!-- εμφανίζω αυτό που πληκτρολογήθηκε -->
					</div> 
				</div>
				
			</div>
	<div class="col-md-6, col-lg-6">
		<p> Οι χαρακτήρες που εμφανίζονται, με τη συχνότητά τους είναι:<p>
		<table class="table table-hover table-bordered">
		<thead>
		<tr>
			<th>Χαρακτήρας</th>
			<th>Κώδικας ASCII</th>
			<th>Αριθμός Εμφανίσεων</th>
			<th>Συχνότητα Εμφάνισης</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($letters as $i => $val) { ?>
		<tr>
			<td>"<?php echo chr($i); ?>"</td>
			<td><?php echo decbin($i); ?></td>
			<td><?php echo $val; ?></td>
			<td><?php echo round($val/strlen($m), 3); ?></td>
		</tr>
		<?php }  ?>
	
		</tbody>
		</table>
	
    
      
    

	

	</div>

	</div>

	
	
	</body>
</html>