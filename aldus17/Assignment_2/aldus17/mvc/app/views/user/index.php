<!DOCTYPE html>

<head>
    <title>frontpage</title>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/front_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>
</head>

<body>

    <?php include_once '../app/views/partials/menu.php'; ?>

    <div id="main-wrapper" class="main_wrapper">
        <h2 class="front_page-header">Homepage page</h2>
        <h3 class="front_page-subheader">Welcome to the Homepage <i><?= $viewbag['fullname'] . ' ' ?></i></br>
            Your username is: <i><?= $viewbag['username'] ?></i></h3>
    </div>

    <?php include_once '../app/views/partials/foot.php'; ?>