<?php
    include('includes/array_prov.php');
    include('includes/header.php');
    include('includes/utils.php');

    $land = isset($_GET['land']) ? strip_bad_chars($_GET['land']) : '';
    switch ($land) {
        case 'de':
            $provinces = $de;
            $landTitle = 'Deutschland';
            break;
        case 'at':
            $provinces = $at;
            $landTitle = 'Österreich';
            break;
        case 'ch':
            $provinces = $ch;
            $landTitle = 'Schweiz';
            break;
        default:
            $provinces = [];
            $landTitle = '';
    }
?>
<div class="container">
  <div class="jumbotron my-4">
    <h1 class="text-center">Provinzen in <?php echo $landTitle; ?></h1>
    <hr>
    <ul class="list-unstyled">
    <?php foreach ($provinces as $slug => $prov) { ?>
        <li><a href="provincie.php?item=<?php echo $slug; ?>"><?php echo $prov['name']; ?></a></li>
    <?php } ?>
    </ul>
  </div>
</div>
<?php include('includes/footer.php'); ?>

