<?php
    include('includes/array_prov.php');
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

    if (empty($landTitle)) {
        header('Location: 404.php');
        exit;
    }

    define('TITLE', 'Dating ' . $landTitle);
    include('includes/header.php');
?>
<div class="container">
  <div class="jumbotron my-4">
    <h1 class="text-center">Dating <?php echo $landTitle; ?></h1>
    <hr>
    <div class="row">
    <?php foreach ($provinces as $slug => $prov) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"><a href="provincie.php?item=<?php echo $slug; ?>"><?php echo $prov['name']; ?></a></h5>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

