<!DOCTYPE html>

<head>
    <title>Userlist page</title>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/userlist_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>
</head>

<body>
    <?php include_once '../app/views/partials/menu.php'; ?>

    <div class="userlist_wrapper">
        <div class="userlist_content">
            <h1>User list</h1>

            <table class="userlist_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Username</th>
                    </tr>
                </thead>

                <button type="button" id="getUserlistbtn" class="btn btn-primary">
                    <div class="bs-example">
                        <div class="spinner-border">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>Load/refresh
                </button>

                <?php //Data from the Ajax will be put into tbody 
                ?>
                <tbody id="userlistdata" class="userlistdata"></tbody>

            </table>


        </div>

    </div>

    </div>

    <script src="<?php echo DOC_ROOT; ?>/js/userlistEvents.js"></script>
    <?php include_once '../app/views/partials/foot.php'; ?>