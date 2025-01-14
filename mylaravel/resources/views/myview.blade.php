<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตารางสูตรคูณ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            font-family: 'Arial', sans-serif;
        }

        .form-card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .table-card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .btn-custom {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            transform: scale(1.1);
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f7fd;
        }

        .table-striped tbody tr:nth-child(even) {
            background-color: #e6f7ff;
        }

        .table-striped tbody tr:nth-child(odd):hover {
            background-color: #e4d8f3;
        }

        .table-striped tbody tr:nth-child(even):hover {
            background-color: #b3e0ff;
        }

        .table-bordered td, .table-bordered th {
            border: 2px solid #ddd !important;
        }

        .table-dark th {
            background-color: #333;
            color: #fff;
        }

        .h1-title {
            color: #fff;
            font-size: 2.5rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .table-card h3 {
            color: #4CAF50;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .form-card h3 {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center h1-title mb-4">ตัวสร้างตารางสูตรคูณ</h1>

        <div class="form-card mb-4">
            <h3 class="text-center text-dark">กรอกเลขเพื่อสร้างตารางสูตรคูณ</h3>
            <form method="post" action="{{ url('/mycontroller') }}">
                @csrf
                <div class="mb-3">
                    <label for="myinput" class="form-label text-muted">กรอกเลข</label>
                    <input type="text" name="myinput" id="myinput" class="form-control form-control-lg" placeholder="กรอกเลข" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-custom">สร้างตาราง</button>
                </div>
            </form>
        </div>

        @if(isset($table) && $table)
            <div class="table-card">
                <h3 class="text-center">ตารางสูตรคูณของ {{ $myinput }}</h3>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ผลลัพธ์</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
