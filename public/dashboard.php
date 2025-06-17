<?php
session_start();
ob_start();

include 'config/connection.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/3322/3322056.png">
    <title>LAUNDRY</title>
    <link rel="stylesheet" href="../src/assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
</head>
<body>
    <div class="w-full h-screen flex flex-col">
        <?php include 'includes/header.php'; ?>

        <div id="overlay" class="fixed inset-0 bg-black/30 z-20 hidden md:hidden"></div>

        <div class="flex h-screen overflow-hidden">
            <?php include 'includes/sidebar.php'; ?>

            <main class="flex-1 p-6 overflow-y-auto">
                <section class="section">
                    <?php
                    if (isset($_GET['page'])) {
                        if (file_exists("contents/" . $_GET['page'] . ".php")) {
                            include "contents/" . $_GET['page'] . ".php";
                        } else {
                            include 'contents/page-not-found.php';
                        }
                    } else {
                        include 'contents/home.php';
                    }
                    ?>
                </section>
            </main>
        </div>
    </div>
<script>
    $('#table').DataTable();
</script>
<script src="../src/assets/js/hamburger-menu.js"></script>
<script src="../src/assets/js/light-dark-mode.js"></script>
</body>
</html>