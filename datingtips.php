<?php 
	define("TITLE", "Datingtips");

        include('includes/array_tips.php');
        include('includes/array_prov.php');
        include('includes/utils.php');

        if(isset($_GET['tip'])) {
                $datingtip = strip_bad_chars( $_GET['tip'] );
                if (array_key_exists($datingtip, $datingtips)) {
                        $tips = $datingtips[$datingtip];
                } else {
                        include('404.php');
                        exit;
                }
        } else {
                include('404.php');
                exit;
        }

        include('includes/header.php');
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