<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">My Blogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-right">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">All Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_blog.php">Add a Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<div class="container">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="feature-box">
                    <h4>Search Blogs</h4>
                </div>
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search and filter">
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    <hr>

    <!-- Search input -->

    <!-- Blog list -->
    <div id="blogList">
        <?php
        include 'connection/conn.php';

        $sql = "SELECT * FROM blogs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="wrapper blogItem">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <a href="edit_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary float-end">Edit</a>
                            <form method="post" action="delete_blog.php">
                                <button type="submit" class="btn btn-danger float-end" name="delete_blog">Delete</button>
                                <input type="hidden" name="blog_id" value="<?php echo $row['id']; ?>">
                            </form>
                            <h3><?php echo $row["title"]; ?></h3>
                            <hr class="short-hr">
                            <div class="content">
                                <?php echo $row["description"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>

</div>

<!-- JavaScript for live filtering -->
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        var searchQuery = this.value.toLowerCase();
        var blogItems = document.getElementsByClassName('blogItem');

        Array.from(blogItems).forEach(function (item) {
            var blogTitle = item.querySelector('h3').innerText.toLowerCase();
            var blogContent = item.querySelector('.content').innerText.toLowerCase();

            if (blogTitle.includes(searchQuery) || blogContent.includes(searchQuery)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
