<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Title</title>
    
    <!-- Bootstrap CDN (with async for better loading) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font - Roboto (for better typography) -->
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
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Post Container */
        .post-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            max-width: 850px;
            margin-top: 60px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            backdrop-filter: blur(8px);
            text-align: center;
        }
        .post-container:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        /* Post Title */
        h1 {
            color: #ff758c;
            font-weight: bold;
            font-size: 2.8rem; 
            margin-bottom: 20px;
        }

        /* Image Styling */
        .post-image {
            display: block;
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 20px auto;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .post-image:hover {
            transform: scale(1.05);  
        }

        /* Post Content */
        .post-content {
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 20px;
        }

        /* Timestamp */
        .post-date {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
            font-style: italic;
        }

        /* Button Styling */
        .btn-secondary {
            background-color: #ff758c;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            width: 100%;
            transition: 0.3s;
        }
        .btn-secondary:hover {
            background-color: #ffcc00;
            color: #ff4f7a;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }
            .post-container {
                padding: 25px;
            }
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

    <!-- Single Post View -->
    <div class="container d-flex justify-content-center">
        <div class="post-container">
            <h1>{{$post->title}}</h1>
            <img src="{{asset('uploads/post/'.$post->image)}}" class="post-image" alt="Post Image" loading="lazy">
            <p class="post-content">{{$post->content}}</p>
            <p class="post-date"><strong>Posted on:</strong> {{ $post->created_at->format('M d, Y') }}</p>
            <a href="{{route('dashboard')}}" class="btn btn-secondary">Back to dashboard</a>
        </div>
    </div>

    <!-- JavaScript for Navbar Toggle -->
    <script>
        const navbarToggler = document.getElementById('navbarToggler');
        const navbarNav = document.getElementById('navbarNav');

        navbarToggler.addEventListener('click', () => {
            navbarNav.classList.toggle('collapse');
        });
    </script>
</body>
</html>
