<!DOCTYPE html>

<head>
    <title>Search book, author or publisher</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>

<body>

    <div class="search_wrapper">
        <div class="search_content">
            <form method="GET">
                <input type="text" class="search" name="search" id="search" placeholder="search for book, publisher or author" />
                <input type="button" class="searchbtn" name="searchbtn" id="searchbtn" value="search">
            </form>

            <table class="library_table" id="library_table">
                <thead>
                    <tr>
                        <th>author_name</th>
                        <th>book_title</th>
                        <th>publisher_name</th>
                    </tr>
                </thead>

                <tbody id="results" class="results"></tbody>

            </table>
        </div>
    </div>
    <script src="js/search.js"></script>
</body>

</html>