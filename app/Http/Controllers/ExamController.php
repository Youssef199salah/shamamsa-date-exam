<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam; 
use App\Models\ExamDate;
use App\Models\Student;


class ExamController extends Controller
{
    public function storeTaks(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'selectedDate' => 'required',
    ]);

    $student = Student::find($request->input('id'));

    if ($student == null) {
        return view('errorId');
    }

    $exam_check = Exam::where('name', $student->name)->where('type', 'taks')->first();

    if ($exam_check) {
        return view('error');
    }

    $examDate = ExamDate::where('type', 'taks')->whereJsonContains('date', [['date' => $request->input('selectedDate')]])->first();

    if (!$examDate) {
        return response()->json(['message' => 'Exam dates taks not found'], 201);
    }

    $date = $request->input('selectedDate');
    $dates = json_decode($examDate->date, true);

    foreach ($dates as &$exam) {
        if ($exam['date'] === $date) {
            $exam['actual_num'] = $exam['actual_num'] + 1;
            break;
        }
    }

    $examDate->update(['date' => json_encode($dates, JSON_UNESCAPED_UNICODE)]);

    $exam = new Exam();
    $exam->name = $student->name;
    $exam->date = $request->input('selectedDate');
    $exam->type = 'taks';
    $exam->save();

    return view('success');
}

    public function getExamDatesTaks()
    {
        $examDates = ExamDate::where('type','taks')->latest()->first();
        $examDatesArray = json_decode($examDates->date, true);
        // dd($examDatesArray);
        return view('exam-date-taks', ['examDatesArray' => $examDatesArray]);
    }


    public function storeCoptic(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'selectedDate' => 'required',
        ]);
    
        $student = Student::find($request->input('id'));
    
        if ($student == null) {
            return view('errorId');
        }
    
        $exam_check = Exam::where('name', $student->name)->where('type', 'coptic')->first();
    
        if ($exam_check) {
            return view('error');
        }
    
        $examDate = ExamDate::where('type', 'coptic')->whereJsonContains('date', [['date' => $request->input('selectedDate')]])->first();
    
        if (!$examDate) {
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
    
        $date = $request->input('selectedDate');
        $dates = json_decode($examDate->date, true);
    
        foreach ($dates as &$exam) {
            if ($exam['date'] === $date) {
                $exam['actual_num'] = $exam['actual_num'] + 1;
                break;
            }
        }
    
        $examDate->update(['date' => json_encode($dates, JSON_UNESCAPED_UNICODE)]);
    
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'coptic';
        $exam->save();
    
        return view('success');
    }
    public function getExamDatesCoptic()
    {
        $examDates = ExamDate::where('type','coptic')->latest()->first();
        $examDatesArray = json_decode($examDates->date, true);
        // dd($examDatesArray);
        return view('exam-date-coptic', ['examDatesArray' => $examDatesArray]);
    }

    public function storeAlhan(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'selectedDate' => 'required',
        ]);
    
        $student = Student::find($request->input('id'));
    
        if ($student == null) {
            return view('errorId');
        }
    
        $exam_check = Exam::where('name', $student->name)->where('type', 'alhan')->first();
    
        if ($exam_check) {
            return view('error');
        }
    
        $examDate = ExamDate::where('type', 'alhan')->whereJsonContains('date', [['date' => $request->input('selectedDate')]])->first();
    
        if (!$examDate) {
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
    
        $date = $request->input('selectedDate');
        $dates = json_decode($examDate->date, true);
    
        foreach ($dates as &$exam) {
            if ($exam['date'] === $date) {
                $exam['actual_num'] = $exam['actual_num'] + 1;
                break;
            }
        }
    
        $examDate->update(['date' => json_encode($dates, JSON_UNESCAPED_UNICODE)]);
    
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'alhan';
        $exam->save();
    
        return view('success');
    }
    public function getExamDatesAlhan()
    {
        $examDates = ExamDate::where('type','alhan')->latest()->first();
        $examDatesArray = json_decode($examDates->date, true);
        // dd($examDatesArray);
        return view('exam-date-alhan', ['examDatesArray' => $examDatesArray]);
    }
    public function storeAgbia(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'selectedDate' => 'required',
        ]);
    
        $student = Student::find($request->input('id'));
    
        if ($student == null) {
            return view('errorId');
        }
    
        $exam_check = Exam::where('name', $student->name)->where('type', 'agbia')->first();
    
        if ($exam_check) {
            return view('error');
        }
    
        $examDate = ExamDate::where('type', 'agbia')->whereJsonContains('date', [['date' => $request->input('selectedDate')]])->first();
    
        if (!$examDate) {
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
    
        $date = $request->input('selectedDate');
        $dates = json_decode($examDate->date, true);
    
        foreach ($dates as &$exam) {
            if ($exam['date'] === $date) {
                $exam['actual_num'] = $exam['actual_num'] + 1;
                break;
            }
        }
    
        $examDate->update(['date' => json_encode($dates, JSON_UNESCAPED_UNICODE)]);
    
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'agbia';
        $exam->save();
    
        return view('success');
    }
    public function getExamDatesAgbia()
    {
        $examDates = ExamDate::where('type','agbia')->latest()->first();
        $examDatesArray = json_decode($examDates->date, true);
        // dd($examDatesArray);
        return view('exam-date-agbia', ['examDatesArray' => $examDatesArray]);
    } 
    public function deleteExamDate(Request $request)
    {
        $request->validate([
            'examId' => 'required|integer',
            'inboxSelect' => 'required',
        ]);
        // dd($request);
        $student = Student::find($request->input('examId'));
        // dd($request->input('inboxSelect'));
        if($student == null){
            $message = "هذا الطالب غير موجود";
            return view('error-message', ['message' => $message]);
        }
        $exam = Exam::where('name', $student->name)->where('type', $request->input('inboxSelect'))->first();
        // dd($exam);
        if($exam == null){
            $message = "لم يوجد موعد لهذا الطالب";
            return view('error-message', ['message' => $message]);
        }
        $examDate = ExamDate::where('type', $request->input('inboxSelect'))->whereJsonContains('date', [['date' => $exam->date]])->first();
        $date = $exam->date;
        $dates = json_decode($examDate->date, true);
        foreach ($dates as &$exam) {
            if ($exam['date'] === $date) {
                $exam['actual_num'] = $exam['actual_num'] - 1;
                break;
            }
        }
        $examDate->update(['date' => json_encode($dates, JSON_UNESCAPED_UNICODE)]);
        Exam::where('name', $student->name)->where('type', $request->input('inboxSelect'))->delete();
        return view('deleteSuccessfully');
    } 
    public function getTableExamDatesTaks()
    {
        // i want to get all dates from exam table
        $examDates = Exam::where('type','taks')->latest()->get();
        // i want to make array of objects that the key is date and values is the name and types that this date have
        $examDatesArray = [];
        foreach($examDates as $examDate){
            $examDatesArray[$examDate->date][] = ['name' => $examDate->name, 'type' => $examDate->type];
        }
        return view('table-exam-date-taks', ['examDatesArray' => $examDatesArray]);

    }
    public function getTableExamDatesCoptic()
    {
        // i want to get all dates from exam table
        $examDates = Exam::where('type','coptic')->latest()->get();
        // i want to make array of objects that the key is date and values is the name and types that this date have
        $examDatesArray = [];
        foreach($examDates as $examDate){
            $examDatesArray[$examDate->date][] = ['name' => $examDate->name, 'type' => $examDate->type];
        }
        return view('table-exam-date-coptic', ['examDatesArray' => $examDatesArray]);

    }
    public function getTableExamDatesAlhan()
    {
        // i want to get all dates from exam table
        $examDates = Exam::where('type','alhan')->latest()->get();
        // i want to make array of objects that the key is date and values is the name and types that this date have
        $examDatesArray = [];
        foreach($examDates as $examDate){
            $examDatesArray[$examDate->date][] = ['name' => $examDate->name, 'type' => $examDate->type];
        }
        return view('table-exam-date-alhan', ['examDatesArray' => $examDatesArray]);

    }
    public function getTableExamDatesAgbia()
    {
        // i want to get all dates from exam table
        $examDates = Exam::where('type','agbia')->latest()->get();
        // i want to make array of objects that the key is date and values is the name and types that this date have
        $examDatesArray = [];
        foreach($examDates as $examDate){
            $examDatesArray[$examDate->date][] = ['name' => $examDate->name, 'type' => $examDate->type];
        }
        return view('table-exam-date-agbia', ['examDatesArray' => $examDatesArray]);

    }
    public function verifyPassword(Request $request)
    {
        $password = $request->input('password');

        if ($password === '852456') {
            return view('delete-exam-date');
        } else {
            return view('error-message', ['message' => 'Wrong Password']);
        }
    }
    public function getStudentDates(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $student = Student::find($request->input('id'));
        if($student == null){
            $message = "هذا الطالب غير موجود";
            return view('error-message', ['message' => $message]);
        }
        $examDates = Exam::where('name', $student->name)->get();
        if($examDates->count() == 0){
            $message = "لم يوجد مواعيد لهذا الطالب";
            return view('error-message', ['message' => $message]);
        }
        return view('student-dates-table', ['examDates' => $examDates]);

    }
}
