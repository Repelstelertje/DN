<?php
  $companyName = "Dating Nebenan";
  include('includes/nav_items.php');

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  ini_set('error_log', __DIR__ . '/../php_errorlog');
  error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kostenloses Dating - Suchst du einen Partner oder ein nettes kostenloses Date? Hier finden Sie mehr als 10.000 Singles. Die Anmeldung ist 100% kostenlos.">
    <meta name="author" content="Dating Nebenan">
    <meta http-equiv="Content-Security-Policy" content="
        default-src *; 
        font-src 'self' https://fonts.gstatic.com ;
        img-src 'self' https://16hl07csd16.nl/ https://region1.google-analytics.com www.googletagmanager.com https://ssl.gstatic.com https://www.gstatic.com https://www.google-analytics.com https://20fhbe2020.be/ https://23mlf01ccde23.com/ ;
        style-src 'self' https://tagmanager.google.com https://fonts.googleapis.com/ https://23mlf01ccde23.com/ 'unsafe-inline'; 
        style-src-elem 'self' https://tagmanager.google.com https://fonts.googleapis.com/ https://23mlf01ccde23.com/ 'unsafe-inline'; 
        connect-src 'self' https://region1.google-analytics.com https://tagmanager.google.com/ https://www.google-analytics.com https://16hl07csd16.nl/ https://20fhbe2020.be/ https://23mlf01ccde23.com/;
        script-src 'self' http://* https://www.googletagmanager.com https://www.google-analytics.com https://ssl.google-analytics.com https://cdn.jsdelivr.net https://23mlf01ccde23.com/ 'nonce-googletagmanager' 'nonce-2726c7f26c' 'sha256-WwSlXI54tpz3oRisOne8KKEqXFjbTYCI2AzKef7+7nE=' 'unsafe-inline' 'unsafe-eval'
    " >
    <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/fav/android-chrome-512x512.png">
    <link rel="manifest" href="img/fav/site.webmanifest">
    <?php
        include_once('includes/config.php');
        $pageMeta = [
            'item' => [
                'param' => 'item',
                'url'   => '/dating-%s',
                'title' => 'Dating %s | ' . $companyName
            ],
            'id'   => [
                'param' => 'id',
                'url'   => '/profile?id=%s',
                'title' => 'Daten mit %s | ' . $companyName
            ],
            'tip'  => [
                'param' => 'tip',
                'url'   => '/datingtips-%s',
                'title' => 'Datingtips %s | ' . $companyName
            ],
        ];

        $baseUrl       = $BASE_URL;
        $canonical     = $baseUrl;
        $title         = 'Dating Nebenan – Finde Liebe Direkt Um Die Ecke';

        foreach ($pageMeta as $meta) {
            $param = $meta['param'];
            if (isset($_GET[$param]) && !empty($_GET[$param])) {
                $value     = htmlspecialchars($_GET[$param]);
                $canonical = $BASE_URL . sprintf($meta['url'], $value);
                $title     = sprintf($meta['title'], $value);
                break;
            }
        }

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id        = (int) $_GET['id'];
            $apiUrl    = "https://23mlf01ccde23.com/profile/get0/8/" . $id;
            $response  = @file_get_contents($apiUrl);
            if ($response !== false) {
                $data = json_decode($response, true);
                $profileName = null;
                if (isset($data['profile']['name'])) {
                    $profileName = $data['profile']['name'];
                } elseif (isset($data['name'])) {
                    $profileName = $data['name'];
                }
                if ($profileName) {
                    $slug      = strtolower($profileName);
                    $slug      = preg_replace('/[^a-z0-9]+/', '-', $slug);
                    $slug      = trim($slug, '-');
                    $canonical = $baseUrl . '/daten-met-' . $slug;
                    $title     = 'Daten met ' . $profileName;
                }
            }
        }

        echo '<link rel="canonical" href="' . $canonical . '" >';
        echo '<meta property="og:url" content="' . $canonical . '">';
        echo '<meta property="og:title" content="' . $title . '">';
        echo '<meta property="og:type" content="website">';
        echo '<title>' . $title . '</title>';
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGF9E4WFZD" nonce="2726c7f26c" SameSite=None; Secure></script>
    <script nonce="2726c7f26c" SameSite=None; Secure>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-47K5Q4WKT9');
    </script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="top">
    <div id="oproepjes">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $BASE_URL; ?>/">Dating Nebenan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menü</button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php  include('includes/nav.php'); ?>
                </div>
            </div>
        </nav>




