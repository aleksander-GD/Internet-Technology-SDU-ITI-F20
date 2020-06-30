<!DOCTYPE html>

<head>
    <title>Upload</title>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/upload_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>
</head>

<body>

    <?php include_once '../app/views/partials/menu.php'; ?>

    <div id="upload-picture-container" class="upload_picture_container">
        <h1>Upload page</h1>
        <form method="POST" action="/aldus17/mvc/public/user/upload" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title of the image here" required />
                <br>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" maxlength="250" placeholder="Type a description to the image"></textarea>
                <br>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Upload File</label>

                            <div class="dropzone-wrapper">
                                <div class="dropzone-desc">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <p>Choose an image file or drag it here.</p>
                                </div>
                                <input type="file" name="imageToBeUploaded" id="imageToBeUploaded" class="dropzone" required>
                            </div>
                            <div class="preview-zone hidden">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <div><b>Preview</b></div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                <i class="fa fa-times"></i> Remove image
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p> The only allowed formats are "jpg", "jpeg", "png", "gif"</p>
            <input type="submit" name="uploadbtn" id="uploadbtn" class="uploadbtn" value="Upload image" />
        </form>

        <?php if (isset($_SESSION['uploadMsg'])) {
            echo $_SESSION['uploadMsg'];
            $_SESSION['uploadMsg'] = null;
        } else {
            echo "<div class='alert alert-info alert-dismissible' data-dismiss='alert' role='alert'>" .
                "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
                "<strong>Information!</strong> Please upload a picture </div>";
        } ?>
    </div>

    <script src="<?php echo DOC_ROOT; ?>/js/uploadUtility.js"></script>
    <?php include_once '../app/views/partials/foot.php'; ?>