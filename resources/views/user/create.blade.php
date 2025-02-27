<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background-color: #f4f7f9;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, #9c607e, #ff758c);
        }
        .navbar-brand, .nav-link {
            color: rgb(240, 245, 241) !important;
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Page Container */
        .container {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-top: 50px;
        }

        /* Form Styling */
        .form-group label {
            font-weight: bold;
            color: #ff758c;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ff758c;
        }
        textarea {
            resize: none;
        }
        
        /* Button Styling */
        .btn-primary {
            background-color: #ff758c;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #ffcc00;
            color: #ff758c;
        }

        /* Image Upload Styling */
        .form-control-file {
            border: 1px solid #ff758c;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>

     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Create Post Form -->
    <div class="container">
        <h1 class="text-center" style="color: #ff758c;">Create New Post</h1>
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Post</button>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
