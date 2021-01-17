<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php getTitle($_GET['read']); ?></title>
        <link href="res/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <!-- HEADER -->
        <header>
            <nav>
                <ul>
                    <?php printMenu(); ?>
                </ul>
            </nav>
        </header>

        <!-- MAIN -->
        <main>