<?php
        define('TITLE', 'Partnerlinks');
        include('includes/header.php');
        include('includes/partner_links.php');

        $columns = array_chunk($partnerLinks, ceil(count($partnerLinks) / 3));
?>
<div class="container">
        <div class="jumbotron my-4">
                <h1 class="text-center">Partner-Links:</h1>
                <div class="row">
                        <?php foreach ($columns as $col): ?>
                        <div class="col-md-6 col-12">
                                <ul>
                                <?php foreach ($col as $link): ?>
                                        <li><a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank"><?php echo htmlspecialchars($link['label']); ?></a></li>
                                <?php endforeach; ?>
                                </ul>
                        </div>
                        <?php endforeach; ?>
                </div>
        </div>
</div>
<?php
        include('includes/footer.php');
?>