<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Exam Date</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-3">Delete Exam Date for student</h1>
        <form action="{{ route('exam.deleteExamDate') }}" method="post">
            @csrf
            <!-- Exam ID Input -->
            <div class="form-group">
                <label for="examId">Student ID</label>
                <input type="text" class="form-control" id="examId" name="examId" placeholder="Enter Exam ID" required>
            </div>

            <!-- Inbox Selection -->
            <div class="form-group">
                <label for="inboxSelect">Select Inbox</label>
                <select class="form-control" id="inboxSelect" name="inboxSelect" required>
                    <option value="taks">taks</option>
                    <option value="agbia">agbia</option>
                    <option value="alhan">alhan</option>
                    <option value="coptic">coptic</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-danger">Delete Exam</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
