<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN -->
    <style>
        body {
            background-color: #f4f7f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 260px;
            position: fixed;
            top: 0;
            left: -260px; 
            background: linear-gradient(135deg, #9c607e, #ff758c);
            color: white;
            padding-top: 30px;
            transition: left 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar a {
            color: white;
            padding: 15px 25px;
            display: block;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #ffcc00;
            color: #ff758c;
            border-radius: 5px;
        }

        /* Main Content */
        .main-content {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease;
            background-color: #ffffff;
        }

        .main-content.with-sidebar {
            margin-left: 260px;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #9c607e, #ff758c);
            color: white;
            padding: 15px 25px;
            position: relative;
        }

        .navbar-toggler {
            border: none;
            background-color: transparent;
            font-size: 24px;
            color: white;
            transition: color 0.3s ease;
        }

        .navbar-toggler:hover {
            color: #ffcc00;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-action {
            font-size: 14px;
        }

        h3 {
            font-size: 24px;
            font-weight: bold;
            color: #ff758c;
        }

        /* Delete Button Styling */
        button[type="submit"] {
            background-color: #d9534f;
            border: none;
            color: white;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #c9302c;
        }

        /* Table Content Styling */
        .table td {
            word-wrap: break-word; 
        }

        .content-cell {
            max-height: 100px; 
            overflow-y: auto; 
            text-align: left; 
        }

        /* Action Button Styling */
        .action-buttons {
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }

        .action-buttons .btn {
            margin-bottom: 5px; 
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content.with-sidebar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar" id="sidebar">
        <h2 class="text-center text-white">User Panel</h2>
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
        <a href="{{route('admin.postmanage)}}'">Manage Posts</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>
    </div>

    <div class="main-content" id="main-content">
        <nav class="navbar">
            <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h4 class="mb-0">Welcome Post Manager</h4>
        </nav>

        <div class="container mt-4">
            <h3 class="text-center">All Post Controll</h3>

            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example User Data -->
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td class="content-cell">{{ $post->content }}</td>
                        <td>
                            <img src="{{ asset('uploads/post/'.$post->image) }}" style="width: 100px; height: 100px;" alt="Post {{ $post->id }}">
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('users1.view', ['id' => $post->id]) }}" class="btn btn-success btn-sm btn-action">View</a>
                            <a href="{{ route('users.edit', ['id' => $post->id]) }}" class="btn btn-success btn-sm btn-action">Edit</a>
                            <form action="{{ route('admin.users.delete', ['type' => 'post', 'id' => $post->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="container mt-4">
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="background-color: #ff758c; border-color:rgb(245, 168, 181);">Create New Post</a>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('show');
            mainContent.classList.toggle('with-sidebar');
        }

        function logout() {
            alert("Logging out...");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
