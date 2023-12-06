
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam Date Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style>
            /* Additional CSS for button styling */
            .date-button {
                width: 100%;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    <div class="col text-center">
            <h1>مواعيد امتحان القبطي</h1>
    </div>
    <div class="container mt-5">
        <form action="{{ route('exam.storeCoptic') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            
            <div class="form-group text-center">
                <h3><label for="selectedDate">: اختار معاد الامتحان المناسب</label></h3>
                <input type="hidden" id="selectedDate" name="selectedDate" value="">
            </div>
            
            <div class="form-group" >
    @foreach ($examDatesArray as $item)
        @php
            // Get the date, actualLimit, and limit from the $item array
            $date = $item['date'];
            $maxLimit = $item['max_num'] ?? 0;
            $actualLimit = $item['actual_num'] ?? 0;
        @endphp
        <button type="button" class="btn btn-primary btn-lg date-button" 
                data-date="{{ $date }}" actual-limit="{{ $actualLimit }}"  data-limit="{{ $maxLimit }}" 
                name="date" @if ($maxLimit == $actualLimit) disabled @endif>
            {{ $date }}
        </button>
    @endforeach
</div>


            <button type="submit" class="btn btn-success btn-lg">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function () {
        $('.date-button').on('click', function () {
            var selectedDate = $(this).data('date');
            var name = $('#name').val();
            
            // Set the value of the hidden input field to the selected date
            $('#selectedDate').val(selectedDate);

            // Example: Disable button and change color if the limit is reached
            var maxLimit = $(this).data('data-limit');
            var actualLimit = $(this).data('actual-limit');
            
            if (actualLimit >= maxLimit) {
                // If actual limit equals or exceeds the maximum limit, disable the button
                $(this).prop('disabled', true);
            }

            // Change the color of the clicked button
            $('.date-button').removeClass('btn-danger').addClass('btn-primary');
            $(this).removeClass('btn-primary').addClass('btn-danger');

            // You can handle additional logic for the selected date here
            console.log('Selected Date:', selectedDate);
            console.log('Name:', name);
        });
    });
</script>


    </body>
    </html>
