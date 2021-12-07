<?php
    if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JeansStore - <?php echo $page_title; ?></title>
        <link rel="stylesheet" media="all" href="../stylesheets/staff.css" />
    </head>
    <body>
        <header>
            <h1>JeansStore Staff Area</h1>
        </header>

        <navigation>
            <ul>
                <li><a href="<?php echo '../index.php'; ?>">Menu</a></li>
            </ul>
        </navigation>
    </body>
</html>