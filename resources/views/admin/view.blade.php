<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            padding: 10px;
            text-align: center;
            background-color: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .text-muted {
            color: #6c757d;
        }

        .d-flex {
            display: flex;
            flex-direction: column; /* Changed from row to column to stack vertically */
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 50rem;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="h3">User Details</h2>
            </div>
            <div class="card-body">
                <div class="mb-4 d-flex">
                    <p class="fw-semibold text"><strong>Name:</strong></p>
                    <p class="text-muted">{{$user->name}}</p>
                </div>
                <div class="mb-4 d-flex">
                    <p class="fw-semibold text-secondary"><strong>Email:</strong></p>
                    <p class="text-muted">{{$user->email}}</p>
                </div>
                <div class="mb-4 d-flex">
                    <p class="fw-semibold text-secondary"><strong>User Type:</strong></p>
                    <p class="text-muted">{{ ucfirst($user->usertype) }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.dashboard') }}" class="btn">
                    Back to Users
                </a>
            </div>
        </div>
    </div>
</body>
</html>
