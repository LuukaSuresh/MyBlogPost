<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f4f7f9, #d6e2f0);
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
            background: linear-gradient(135deg, #6a0572, #c31432);
            color: white;
            padding-top: 30px;
            transition: left 0.3s ease-in-out;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
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
            transition: 0.3s ease-in-out;
        }

        .sidebar a:hover {
            background-color: #ffcc00;
            color: #6a0572;
            border-radius: 5px;
        }

        /* Main Content */
        .main-content {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .main-content.with-sidebar {
            margin-left: 260px;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #6a0572, #c31432);
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-toggler {
            border: none;
            background: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }

        .navbar-toggler:hover {
            color: #ffcc00;
        }

        /* Table */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-action {
            font-size: 14px;
        }

        .content-cell {
            max-height: 100px;
            overflow-y: auto;
            text-align: left;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .action-buttons .btn {
            margin-bottom: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content.with-sidebar {
                margin-left: 0;
            }
        }
    </style>
    @if(session()->has('message'))
        <script>alert("{{ session('message') }}")</script>
    @endif
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2 class="text-center text-white">User Panel</h2>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <a href="#">Manage Posts</a>
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
            <h4 class="mb-0">Welcome User</h4>
        </nav>

        <div class="container mt-4">
            <h3 class="text-center">Your Post Control</h3>

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
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td class="content-cell">{{ $post->content }}</td>
                        <td>
                            <img src="{{ asset('uploads/post/'.$post->image) }}" style="width: 100px; height: 100px; border-radius: 5px;" alt="Post {{ $post->id }}">
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('users1.view', ['id' => $post->id]) }}" class="btn btn-success btn-sm btn-action">View</a>
                            <a href="{{ route('users.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm btn-action">Edit</a>
                            <form action="{{ route('user.post.delete', ['id' => $post->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-action">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('users.create') }}" class="btn btn-warning">Create New Post</a>
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
    </script>
</body>
</html>
