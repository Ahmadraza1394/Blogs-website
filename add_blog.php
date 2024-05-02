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
            <div class="col-lg-10 offset-lg-1">
                <form action="action_add_blog.php" method="POST" class="form wrapper">
                    <h3 class="text-center fw-bolder">Add a Blog</h3>
                    <hr class="short-hr">
                <div class="mb-3">
                    <label class="form-label">Blog Title:</label>
                    <input name="title" type="text" class="form-control" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Blog Description:</label>
                    <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <input type="submit" value="Submit" class="btn btn-success float-end">

                </form>
            </div>
        </div>


</body>
</html>