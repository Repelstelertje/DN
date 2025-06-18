<?php 
	define("TITLE", "Dating-Tipps");

        include('includes/array_tips.php');
        include('includes/array_prov.php');
        include('includes/header.php');
        include('includes/utils.php');

        if (isset($_GET['tip'])) {
                $datingtip = strip_bad_chars($_GET['tip']);
                if (!empty($datingtip) && isset($datingtips[$datingtip]) && !empty($datingtips[$datingtip]['name'])) {
                        $tips = $datingtips[$datingtip];
                } else {
                        $tips = ['title' => '', 'tekst' => ''];
                }
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