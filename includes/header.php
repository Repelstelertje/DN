<?php
  $companyName = "Dating Nebenan";
  include('includes/nav_items.php');
  $config = include('includes/config.php');

  // Enable verbose error reporting only when APP_DEBUG=true
  if (!empty($config['DEBUG'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  }
?>
<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kostenloses Dating - Suchst du einen Partner oder ein nettes kostenloses Date? Hier finden Sie mehr als 10.000 Singles. Die Anmeldung ist 100% kostenlos.">
    <meta name="author" content="Dating Nebenan">
    <link rel="apple-touch-icon" sizes="57x57" href="img/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
    <link rel="manifest" href="img/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php
        // Canonical URL logic
        $baseUrl = "https://datingnebenan.de";
        $canonicalUrl = $baseUrl; // Default canonical URL
        $title = "Dating Nebenan"; // Default title
        if (isset($_GET['item'])) {
            $canonicalUrl = $baseUrl . "/dating-" . htmlspecialchars($_GET['item']);
            $title = "Dating " . htmlspecialchars($_GET['item']);
        } else if (isset($_GET['id'])) {
            $id = preg_replace('/[^0-9]/', '', $_GET['id']);
            $apiResponse = @file_get_contents("https://23mlf01ccde23.com/profile/get0/8/" . $id);
            if ($apiResponse !== false) {
                $data = json_decode($apiResponse, true);
                if (isset($data['profile']['name'])) {
                    $profileName = $data['profile']['name'];
                    $slug = strtolower($profileName);
                    $slug = preg_replace('/\s+/', '-', $slug);
                    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
                    $slug = trim($slug, '-');
                    $canonicalUrl = $baseUrl . '/date-mit-' . $slug;
                    $title = 'Date mit ' . htmlspecialchars($profileName);
                } else {
                    $canonicalUrl = $baseUrl . "/profile?id=" . htmlspecialchars($_GET['id']);
                    $title = "Date mit " . htmlspecialchars($_GET['id']);
                }
            } else {
                $canonicalUrl = $baseUrl . "/profile?id=" . htmlspecialchars($_GET['id']);
                $title = "Date mit " . htmlspecialchars($_GET['id']);
            }
        } else if (isset($_GET['tip'])) {
            $canonicalUrl = $baseUrl . "/datingtips-" . htmlspecialchars($_GET['tip']);
            $title = "Datingtips " . htmlspecialchars($_GET['tip']);
        }
        echo '<link rel="canonical" href="' . $canonicalUrl . '" >';
        echo '<title>' . $title . '</title>';
    ?>
    <?php
        // Stel standaardwaarden in
        $default_title = "Zoekertjes België - Vind en Plaats zoekertjes in België";
        $default_description = "Zoek en plaats eenvoudig oproepjes in heel België. Van dating tot vriendschap, ontdek de beste oproepjes op Zoekertjes België.";
        $default_image = $baseUrl . "/img/bg.jpg";
        $default_url = $baseUrl;
        // Dynamisch genereren van inhoud gebaseerd op de pagina-URL
        $current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // Mapping van URL-sleutels naar Open Graph gegevens
        $og_title = $default_title;
        $og_description = $default_description;
        $og_image = $default_image;
        $og_url = $default_url;
        $og_pages = [
            'dating-baden-wurttemberg' => [
                'title' => 'Dating Baden-Wurttemberg',
                'description' => 'Dating in Baden-Württemberg vereint kulturelle Vielfalt mit landschaftlicher Schönheit. Mit Städten wie Stuttgart, Heidelberg und Freiburg bietet die Region zahlreiche Möglichkeiten für romantische Treffen – von Spaziergängen durch historische Altstädte bis hin zu Ausflügen in den Schwarzwald. Die Menschen hier gelten als herzlich und bodenständig, was das Kennenlernen angenehm und authentisch macht. Ob bei einem Glas Wein in einer gemütlichen Weinstube oder bei einem kulturellen Event – Baden-Württemberg ist ein wunderbarer Ort, um echte Verbindungen zu knüpfen.',
                'image' => $baseUrl . ''
            ],
            'dating-bayern' => [
                'title' => 'Dating Bayern',
                'description' => 'Dating in Bayern verbindet Tradition, Gastfreundschaft und beeindruckende Natur. Ob in lebendigen Städten wie München, Nürnberg oder Augsburg, oder in den idyllischen Alpenregionen – Bayern bietet zahlreiche Möglichkeiten für romantische Erlebnisse. Vom gemütlichen Biergarten-Date bis hin zu gemeinsamen Wanderungen durch Berglandschaften ist für jeden Geschmack etwas dabei. Die bayerische Herzlichkeit und Lebensfreude schaffen eine entspannte Atmosphäre, in der sich echte und langfristige Beziehungen entwickeln können.',
                'image' => $baseUrl . '/'
            ],
            'dating-berlin' => [
                'title' => 'Dating Berlin',
                'description' => 'Dating in Berlin ist aufregend, vielfältig und voller Möglichkeiten. Die deutsche Hauptstadt zieht Menschen aus aller Welt an und bietet eine einzigartige Mischung aus Kultur, Kreativität und Freiheit. Ob bei einem Spaziergang entlang der Spree, einem Besuch in einer angesagten Bar oder bei einem Festival – Berlin ist der ideale Ort für unkonventionelle und spannende Dates. Die offene und tolerante Atmosphäre macht es leicht, neue Menschen kennenzulernen und echte Verbindungen zu knüpfen – ganz egal, wonach man sucht.',
                'image' => $baseUrl . ''
            ],
            'dating-brandenburg' => [
                'title' => 'Dating Brandenburg',
                'description' => 'Dating in Brandenburg ist ruhig, authentisch und naturnah. Abseits des Großstadttrubels bietet die Region mit ihren vielen Seen, Wäldern und historischen Städten wie Potsdam eine idyllische Kulisse für romantische Begegnungen. Ob eine Radtour durch die Natur, ein Picknick am Wasser oder ein Spaziergang durch charmante Altstädte – Brandenburg lädt zu entspannten Dates in harmonischer Atmosphäre ein. Wer hier datet, sucht oft echte Nähe, Verlässlichkeit und gemeinsame Erlebnisse in einer ruhigen, bodenständigen Umgebung.',
                'image' => $baseUrl . ''
            ],
            'dating-bremen' => [
                'title' => 'Dating Bremen',
                'description' => 'Dating in Bremen ist charmant, unkompliziert und geprägt von norddeutscher Gelassenheit. Die Hansestadt bietet mit ihrer historischen Altstadt, dem Schnoorviertel und den Uferpromenaden entlang der Weser eine romantische Kulisse für unvergessliche Dates. Ob bei einem Kaffee in einem gemütlichen Café, einem Spaziergang durch den Bürgerpark oder einem Abend in der kreativen Kulturszene – Bremen schafft ideale Bedingungen, um sich kennenzulernen. Die Menschen hier sind offen, ehrlich und bodenständig – perfekt für alle, die echte Verbindungen suchen.',
                'image' => $baseUrl . ''
            ],
            'dating-hamburg' => [
                'title' => 'Dating Hamburg',
                'description' => 'Dating in Hamburg ist stilvoll, vielseitig und von maritimem Flair geprägt. Die Hansestadt bietet zahlreiche romantische Kulissen – von den Alsterkanälen und der Elbphilharmonie bis hin zu den lebendigen Vierteln wie Sternschanze oder St. Pauli. Ob ein Spaziergang am Hafen, ein Konzertbesuch oder ein gemütlicher Abend in einem schicken Restaurant: Hamburg verbindet hanseatische Eleganz mit urbaner Offenheit. Die Menschen hier sind weltoffen, direkt und herzlich – ideale Voraussetzungen für echte und spannende Begegnungen.',
                'image' => $baseUrl . ''
            ],
            'dating-hessen' => [
                'title' => 'Dating Hessen',
                'description' => 'Dating in Hessen verbindet urbanes Leben mit ländlichem Charme. Mit Städten wie Frankfurt, Wiesbaden und Kassel sowie idyllischen Regionen wie dem Taunus oder der Rhön bietet Hessen vielfältige Möglichkeiten für romantische Begegnungen. Ob ein Spaziergang am Mainufer, ein Besuch auf einem Weinfest oder ein Ausflug in die Natur – hier findet jeder das passende Setting für ein gelungenes Date. Die Menschen in Hessen gelten als offen, herzlich und bodenständig, was das Kennenlernen besonders angenehm und authentisch macht.',
                'image' => $baseUrl . ''
            ],
            'dating-mecklenburg-vorpommern' => [
                'title' => 'Dating Mecklenburg-Vorpommern',
                'description' => 'Dating in Mecklenburg-Vorpommern ist ruhig, naturnah und voller romantischer Möglichkeiten. Mit seinen weiten Seenlandschaften, der Ostseeküste und charmanten Städten wie Rostock, Schwerin oder Stralsund bietet die Region ideale Kulissen für entspannte und besondere Dates. Ob ein Spaziergang am Strand, eine Bootstour auf dem See oder ein Abendessen in historischer Altstadt – hier steht echtes Kennenlernen im Vordergrund. Die Menschen in Mecklenburg-Vorpommern sind herzlich, bodenständig und schätzen Authentizität – perfekte Voraussetzungen für eine ehrliche und tiefgehende Verbindung.',
                'image' => $baseUrl . ''
            ],
            'dating-niedersachsen' => [
                'title' => 'Dating Niedersachsen',
                'description' => 'Dating in Niedersachsen ist vielseitig, entspannt und authentisch. Die Region vereint pulsierende Städte wie Hannover, Braunschweig und Oldenburg mit idyllischen Landschaften wie der Lüneburger Heide, dem Harz und der Nordseeküste. Ob ein gemütliches Café-Date in der Stadt, ein Spaziergang durch die Natur oder ein gemeinsamer Tag am Meer – Niedersachsen bietet für jeden Geschmack die passende Atmosphäre. Die Menschen hier gelten als freundlich, ehrlich und unkompliziert, was das Kennenlernen angenehm und bodenständig macht.',
                'image' => $baseUrl . ''
            ],
            'dating-nordrhein-westfalen' => [
                'title' => 'Dating Nordrhein-Westfalen',
                'description' => 'Dating in Nordrhein-Westfalen ist dynamisch, vielfältig und voller Möglichkeiten. Mit Metropolen wie Köln, Düsseldorf, Dortmund und Essen bietet das bevölkerungsreichste Bundesland eine lebendige Mischung aus Kultur, Nachtleben und rheinischer Herzlichkeit. Ob ein Spaziergang am Rhein, ein Konzertbesuch, ein Street-Food-Festival oder ein gemütliches Café-Date – in NRW findet jeder das passende Umfeld für romantische Begegnungen. Die Menschen sind offen, direkt und kontaktfreudig, was das Kennenlernen leicht und spannend macht – ideal für alle, die echte Verbindungen suchen.',
                'image' => $baseUrl . ''
            ],
            'dating-rheinland-pfalz' => [
                'title' => 'Dating Rheinland-Pfalz',
                'description' => 'Dating in Rheinland-Pfalz ist genussvoll, herzlich und geprägt von landschaftlicher Schönheit. Mit romantischen Weinregionen wie der Mosel, dem Rheintal und charmanten Städten wie Mainz, Trier und Koblenz bietet die Region ideale Voraussetzungen für unvergessliche Dates. Ob eine Weinprobe im Weingut, ein Spaziergang durch historische Altstädte oder ein Ausflug in die Natur – Rheinland-Pfalz schafft eine entspannte und liebevolle Atmosphäre. Die Menschen sind bodenständig, offen und herzlich – perfekt für alle, die auf der Suche nach echten und dauerhaften Beziehungen sind.',
                'image' => $baseUrl . ''
            ],
            'dating-saarland' => [
                'title' => 'Dating Saarland',
                'description' => 'Dating im Saarland ist persönlich, herzlich und entspannt. In der kleinsten Flächenregion Deutschlands trifft man auf viel Natur, enge Gemeinschaften und charmante Orte wie Saarbrücken, Sankt Wendel oder Merzig. Ob ein Spaziergang entlang der Saarschleife, ein gemütlicher Abend in einer regionalen Gaststätte oder ein Besuch auf einem Dorffest – das Saarland bietet viele Gelegenheiten für romantische Begegnungen. Die Menschen hier gelten als offen, humorvoll und bodenständig, was das Kennenlernen besonders authentisch und angenehm macht.',
                'image' => $baseUrl . ''
            ],
            'dating-sachsen' => [
                'title' => 'Dating Sachsen',
                'description' => 'Dating in Sachsen verbindet kulturellen Reichtum mit herzlicher Bodenständigkeit. Städte wie Dresden, Leipzig und Chemnitz bieten eine lebendige Mischung aus Geschichte, Kunst und modernem Stadtleben – ideale Kulissen für abwechslungsreiche Dates. Ob ein Spaziergang entlang der Elbe, ein Museumsbesuch oder ein gemütlicher Abend im Szeneviertel – Sachsen hält für jeden Geschmack das Richtige bereit. Die Menschen sind offen, ehrlich und traditionsbewusst, was das Kennenlernen angenehm und aufrichtig macht. Perfekt für alle, die auf der Suche nach echten Verbindungen sind.',
                'image' => $baseUrl . ''
            ],
            'dating-sachsen-anhalt' => [
                'title' => 'Dating Sachsen-Anhalt',
                'description' => 'Dating in Sachsen-Anhalt ist entspannt, authentisch und geprägt von kulturellem Erbe und ländlicher Ruhe. Mit historischen Städten wie Magdeburg, Halle (Saale) und Quedlinburg sowie malerischen Landschaften entlang der Elbe und im Harz bietet die Region ideale Möglichkeiten für romantische Begegnungen. Ob ein Ausflug zu einem Schloss, ein Spaziergang durch charmante Altstädte oder ein gemeinsamer Tag in der Natur – Sachsen-Anhalt schafft eine bodenständige und gemütliche Atmosphäre für echte Verbindungen. Die Menschen gelten als herzlich, ehrlich und unkompliziert – perfekt für ehrliches Kennenlernen.',
                'image' => $baseUrl . ''
            ],
            'dating-schleswig-holstein' => [
                'title' => 'Dating Schleswig-Holstein',
                'description' => 'Dating in Schleswig-Holstein ist nordisch entspannt, natürlich und voller maritimer Romantik. Mit seinen Küsten an Nord- und Ostsee, charmanten Städten wie Kiel, Lübeck und Flensburg sowie idyllischen Landschaften zwischen Meer und Feldern bietet das nördlichste Bundesland traumhafte Kulissen für Dates. Ob ein Strandspaziergang bei Sonnenuntergang, ein Fischbrötchen am Hafen oder ein Ausflug zu den Inseln – hier steht echte Nähe im Mittelpunkt. Die Menschen in Schleswig-Holstein gelten als herzlich, ehrlich und angenehm zurückhaltend – ideale Voraussetzungen für authentische und tiefgehende Begegnungen.',
                'image' => $baseUrl . ''
            ],
            'dating-thuringen' => [
                'title' => 'Dating Thüringen',
                'description' => 'Dating in Thüringen ist entspannt, naturverbunden und kulturell reich. Mit Städten wie Erfurt, Weimar und Jena sowie weiten Wäldern, Burgen und malerischen Dörfern bietet das grüne Herz Deutschlands eine romantische Kulisse für jedes Date. Ob ein Spaziergang durch historische Altstädte, ein Picknick im Thüringer Wald oder ein gemeinsamer Theaterbesuch – die Region lädt zu echten Begegnungen ein. Die Menschen in Thüringen gelten als bodenständig, herzlich und zuverlässig – perfekte Voraussetzungen für ehrliche und dauerhafte Beziehungen.',
                'image' => $baseUrl . ''
            ],
        ];
        // Zoek een match in de array
        foreach ($og_pages as $keyword => $data) {
            if (strpos($current_url, $keyword) !== false) {
                $og_title = $data['title'];
                $og_description = $data['description'];
                $og_image = $data['image'];
                $og_url = $current_url;
                break;
            }
        }
    ?>

    <!-- Voeg dynamische Open Graph-tags toe in de HTML -->
    <meta property="og:title" content="<?php echo $og_title; ?>">
    <meta property="og:description" content="<?php echo $og_description; ?>">
    <meta property="og:url" content="<?php echo $og_url; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $og_image; ?>">

    <!-- Twitter Cards voor betere integratie met Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $og_title; ?>">
    <meta name="twitter:description" content="<?php echo $og_description; ?>">
    <meta name="twitter:image" content="<?php echo $og_image; ?>">
    <meta name="twitter:url" content="<?php echo $og_url; ?>">

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