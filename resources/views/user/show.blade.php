<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font - Roboto -->
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
        }
        .navbar-brand, .nav-link {
            color: rgb(240, 245, 241) !important;
            font-weight: bold;
        }
        .navbar-logo {
            width: 50px; 
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Post Container */
        .container {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto;
            transition: box-shadow 0.3s ease;
        }
        .container:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Post Title */
        h1 {
            color: #ff758c;
            font-weight: bold;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        /* Image Styling */
        .post-image {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 20px auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .post-image:hover {
            transform: scale(1.02);
        }

        /* Post Content */
        .post-content {
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 30px;
            padding: 0 15px;
        }

        /* Timestamp */
        .post-date {
            font-size: 14px;
            color: #777;
            margin-bottom: 25px;
            text-align: center;
        }

        /* Button Styling */
        .btn-secondary {
            background-color: #ff758c;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            transition: all 0.3s ease;
            color: white !important;
        }
        .btn-secondary:hover {
            background-color: #ff4f7a;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .container {
                margin: 30px 15px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<div class="background-blur"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
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

    <!-- Single Post View -->
    <div class="container">
        <h1>{{$post->title}}</h1>
        <img src="{{asset('uploads/post/'.$post->image)}}" class="post-image" alt="Post Image" loading="lazy">
        <p class="post-content">{{$post->content}}</p>
        <p class="post-date"><strong>Posted on:</strong> {{ $post->created_at->format('M d, Y') }}</p>
        <a href="{{route('home')}}" class="btn btn-secondary">Back to Home</a>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>