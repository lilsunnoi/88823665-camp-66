<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2c3e50; /* Deep blue-gray */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 100%;
            max-width: 500px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #34495e; /* Dark gray-blue */
            color: white;
        }
        .card-header {
            background-color: #1abc9c; /* Teal */
            color: white;
            text-align: center;
            font-size: 1.25rem;
            border-radius: 10px 10px 0 0;
        }
        .btn-primary {
            width: 100%;
            background-color: #3498db; /* Blue */
            border-color: #3498db;
        }
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
            background-color: #95a5a6; /* Gray */
            border-color: #95a5a6;
        }
        .form-control {
            background-color: #2c3e50;
            color: white;
            border: 1px solid #1abc9c;
        }
        .form-control::placeholder {
            color: #bdc3c7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password (leave blank to keep current password)</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ url('/users') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
