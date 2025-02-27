<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

    <!-- Bootstrap & Font Awesome CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles */
body {
    background-color: #f4f7f9;
    font-family: 'Roboto', sans-serif;
    color: #333;
    position: relative;
    overflow-x: hidden;
}

/* Background Blur Effect */
.background-blur {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('{{asset("uploads/post/".$post->image)}}') no-repeat center center/cover;
    filter: blur(12px);
    z-index: -1;
    opacity: 0.6;
}

/* Navbar Styling */
.navbar {
    background: linear-gradient(135deg, #9c607e, #ff758c);
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.navbar-brand, .nav-link {
    color: #ffffff !important;
    font-weight: 600;
    transition: color 0.3s ease;
}
.nav-link:hover {
    color: #ffcc00 !important;
    font-weight: bold;
}

/* Container Styling */
.container {
    background: rgba(255, 255, 255, 0.85); 
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    max-width: 650px;
    margin-top: 50px;
    backdrop-filter: blur(15px); 
    border: 1px solid rgba(255, 255, 255, 0.3); 
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.container:hover {
    transform: scale(1.02);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
}

/* Form Styling */
.form-group label {
    font-weight: bold;
    color: #ff758c;
    font-size: 1.1rem;
    margin-bottom: 0.8rem;
}
.form-control {
    border-radius: 8px;
    border: 1px solid #ff758c;
    padding: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
}
.form-control:focus {
    border-color: #ffcc00;
    box-shadow: 0 0 8px rgba(255, 117, 140, 0.4);
    outline: none;
}

/* Textarea Styling */
textarea {
    resize: none;
    min-height: 150px;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #ff758c;
    transition: all 0.3s ease;
}
textarea:focus {
    border-color: #ffcc00;
    box-shadow: 0 0 8px rgba(255, 117, 140, 0.4);
}

/* Button Styling */
.btn-primary {
    background-color: #ff758c;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.3s ease;
}
.btn-primary:hover {
    background-color: #ffcc00;
    color: #ff758c;
    transform: scale(1.05);
}

/* Image Preview */
.img-thumbnail {
    border: 2px solid #ff758c;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-width: 100%;
    height: auto;
    margin-top: 15px;
}
.img-thumbnail:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Image Upload Section */
.form-group {
    margin-bottom: 1.5rem;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.form-group label {
    font-weight: 600;
    color: #333;
    display: block;
    margin-bottom: 0.5rem;
    font-size: 1rem;
}
.form-control-file {
    display: block;
    width: 100%;
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    background-color: #fff;
    font-size: 16px;
    margin-bottom: 10px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.form-control-file:hover, .form-control-file:focus {
    border-color: #ff758c;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 117, 140, 0.5);
}

/* Spacing */
.mt-2 {
    margin-top: 10px;
}

/* Responsive Enhancements */
@media (max-width: 768px) {
    .container {
        padding: 20px;
        margin-top: 30px;
        max-width: 90%;
    }
    .navbar {
        padding: 10px;
    }
    .form-control, .form-control-file {
        font-size: 14px;
    }
    .btn-primary {
        font-size: 16px;
        padding: 10px 15px;
    }
}

/* Tooltip Styling */
.tooltip-inner {
    background-color: #ff758c;
    color: #fff;
    font-size: 14px;
    padding: 10px;
    border-radius: 6px;
}
.tooltip.bs-tooltip-top .arrow::before {
    border-top-color: #ff758c;
}
.tooltip.bs-tooltip-bottom .arrow::before {
    border-bottom-color: #ff758c;
}

/* Enhanced Focus State for Inputs */
.form-control:focus, textarea:focus, .form-control-file:focus {
    border-color: #ff758c;
    box-shadow: 0 0 5px rgba(255, 117, 140, 0.5);
}

    </style>

</head>
<body>
<div class="background-blur"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/">My Blog</a>
        <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
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
 

    <!-- Edit Post Form -->
    <div class="container">
        <h1 class="text-center" style="color: #ff758c;">Edit Post</h1>
        <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <img src="{{asset('uploads/post/'.$post->image)}}" alt="Post Image" class="img-thumbnail mt-2" width="150">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update Post</button>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
