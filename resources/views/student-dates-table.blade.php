<!-- resources/views/exam/dates.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dates</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-3"> المواعيد الذي سجل فيها الطالب : {{ $examDates[0]['name'] }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>اليوم</th>
                    <th>المادة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($examDates as $examDate)
                <tr>
                    <td>{{ $examDate['date'] }}</td>
                    <td>
                        @if($examDate['type'] == 'taks')
                        {{'طقس'}}
                        @elseif($examDate['type'] == 'coptic')
                        {{ 'القبطي'}}
                        @elseif($examDate['type'] == 'alhan')
                        {{ 'الالحان'}}
                        @elseif($examDate['type'] == 'agbia')
                        {{ 'الاجبية'}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
