<!DOCTYPE html>

<head>
    <title>Imagefeed</title>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/imagefeed_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>

</head>

<body>
    <?php include_once '../app/views/partials/menu.php'; ?>

    <div class="imagefeed_wrapper">
        <div class="imagefeed_content">
            <h1>All posted images</h1>

            <h4> Search for username:
                <div class="searchContainer">
                    <div>
                        <input type="text" class="search" name="search" id="search" placeholder="search for username" onload="getUserImages(this.value);" onkeyup="getUserImages(this.value);" />
                    </div>
                    <div class="bs-example">
                        <div class="spinner-border">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </h4>

            <?php // Data from the Ajax call will be put into the div imagefeed 
            ?>
            <div class="imagefeed" id="imagefeed">

            </div>

        </div>
    </div>

    <script src="<?php echo DOC_ROOT; ?>/js/ajaxCallImages.js"></script>
    <?php include_once '../app/views/partials/foot.php'; ?>