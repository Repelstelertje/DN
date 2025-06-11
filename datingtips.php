<?php 
	define("TITLE", "Datingtips");

  	include('includes/array_tips.php');
  	include('includes/array_prov.php');
	include('includes/header.php');

	function strip_bad_chars( $input ) {
		$output = preg_replace( "/[^a-zA-Z0-9_-]/", "",$input);
		return $output;
	}
	
	if(isset($_GET['tip'])) {
		$datingtip = strip_bad_chars( $_GET['tip'] );
		$tips = $datingtips[$datingtip];
	}
?>

<div class="container">
	<div class='jumbotron my-4'>
		<h1 class='text-center'><?php echo $tips["title"]; ?></h1>
	</div>
	<div class='jumbotron my-4'>
		<?php echo $tips["tekst"]; ?>
	</div>
</div>

<?php include('includes/footer.php'); ?>