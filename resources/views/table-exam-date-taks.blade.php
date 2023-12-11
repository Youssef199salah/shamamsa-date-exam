<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dates Table</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 30px;
        }

        .card {
            margin-bottom: 20px;
        }

        .table-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .table-body tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .students-count {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">مواعيد امتحان الطقس</h1>
    <div class="container">
        @if(count($examDatesArray) > 0)
            @foreach($examDatesArray as $date => $students)
                <div class="card">
                    <div class="table-header">
                        <h2>{{ $date }} <span class="students-count">(عدد الطلاب: {{ count($students) }})</span></h2>
                    </div>
                    <div class="table-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['type'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <p>No exam dates available.</p>
        @endif
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
