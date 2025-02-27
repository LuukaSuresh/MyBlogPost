<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
         /*  Background Styling */
         body {
            background: linear-gradient(to right, #ffddd2, #fef6e4);
            font-family: 'Arial', sans-serif;
            color: #333; 
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, #9c607e, #ff758c);
            padding: 10px 15px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-logo {
            width: 50px; 
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            color: rgb(240, 245, 241) !important;
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Search Bar */
        .search-box {
            max-width: 400px;
            margin: auto;
        }

        /* Blog Post Card Styling */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-text {
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Button Styling */
        .btn-primary {
            background: #ff758c;
            border: none;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background: #ff4f7a;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: #f7637c;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
        }
        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 18px;
        }

        /* Search Box Styling */
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            max-width: 500px;
            margin: auto;
        }

        .search-box {
            flex: 1;
            height: 45px;
            border: 2px solid #ff758c;
            border-radius: 25px;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .search-box:focus {
            border-color: #ff4f7a;
            box-shadow: 0px 0px 8px rgba(255, 79, 122, 0.5);
            outline: none;
        }

        /* Search Button */
        .btn-search {
            background: #ff758c;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .btn-search:hover {
            background: #ff4f7a;
            transform: translateY(-2px);
        }

        .no-results {
    font-size: 20px;
    font-weight: bold;
    color: #d9534f;
    text-align: center;
    padding: 20px;
    background: linear-gradient(to right, #ffd3d3, #fff1f1); /* Soft pinkish-red */
    border: 1px solid #ff9999;
    border-radius: 5px;
    width: fit-content;
    margin: 20px auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('logo/1.png') }}" class="navbar-logo" alt="Logo">  </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Search Bar -->
    <form action="{{ route('home.search') }}" method="get">
        <div class="container mt-4 text-center">
            <div class="search-container">
                <input type="text" name="search" class="form-control search-box" placeholder="Search blog posts...">
                <button type="submit" class="btn-search">Search</button>
            </div>
        </div>
    </form>

    @if(isset($results))
    <div class="container mt-4">
        <h2 class="no-results">Search Results</h2>
        <div class="row">
            @if(count($results) > 0)
                @foreach($results as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4">
                            <img src="{{ asset('uploads/post/'.$post->image) }}" class="card-img-top" alt="Post {{ $post->id }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <a href="{{ route('users.view', ['id' => $post->id]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="result_no_found" >No results found.</h3>
            @endif
        </div>
    </div>
    @endif

    <div class="container mt-4">
        <h1 class="no-results">All Posts</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-4">
                        <img src="{{ asset('uploads/post/'.$post->image) }}" class="card-img-top" alt="Post {{ $post->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <a href="{{ route('users.view', ['id' => $post->id]) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div>&copy; 2025 My Blog | Designed for Assignment PS 2616</div>
        <div class="social-icons mt-2">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https
