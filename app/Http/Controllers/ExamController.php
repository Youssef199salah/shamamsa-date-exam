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
            'selectedDate' => 'required|date',
        ]);
        $student = Student::find($request->input('id'));
        // dd($student == null);
        if($student == null){
            return view('errorId');
        }
        $exam_check = Exam::where('name',$student->name)->where('type','taks')->first();
        if($exam_check->name == $student->name && $exam_check->type == 'taks'){
            return view('error');
        }
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'taks';
        $exam->save();
        // Get the date from the request
        $date = $request->input('selectedDate');

        // Find the ExamDate record with the specified date
        $examDate = ExamDate::where('type','taks')->whereJsonContains('date', [['date' => $date]])->first();
        if ($examDate) {
            $dates = json_decode($examDate->date, true);
            foreach ($dates as &$exam) {
                if ($exam['date'] === $date) {
                    $exam['actual_num'] = $exam['actual_num'] + 1;
                    break;
                }
            }
       $examDate->update(['date' => json_encode($dates)]);
        }else{
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
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
            'selectedDate' => 'required|date',
        ]);
        $student = Student::find($request->input('id'));
        if($student == null){
            return view('errorId');
        }
        $exam_check = Exam::where('name',$student->name)->where('type','coptic')->first();
        if($exam_check->name == $student->name && $exam_check->type == 'coptic'){
            return view('error');
        }
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'coptic';
        $exam->save();
        // Get the date from the request
        $date = $request->input('selectedDate');

        // Find the ExamDate record with the specified date
        $examDate = ExamDate::where('type','coptic')->whereJsonContains('date', [['date' => $date]])->first();
        if ($examDate) {
            $dates = json_decode($examDate->date, true);
            foreach ($dates as &$exam) {
                if ($exam['date'] === $date) {
                    $exam['actual_num'] = $exam['actual_num'] + 1;
                    break;
                }
            }
       $examDate->update(['date' => json_encode($dates)]);
        }else{
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
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
            'selectedDate' => 'required|date',
        ]);
        $student = Student::find($request->input('id'));
        if($student == null){
            return view('errorId');
        }
        $exam_check = Exam::where('name',$student->name)->where('type','alhan')->first();
        if($exam_check->name == $student->name && $exam_check->type == 'alhan'){
            return view('error');
        }
        $exam = new Exam();
        $exam->name = $student->name;
        $exam->date = $request->input('selectedDate');
        $exam->type = 'alhan';
        $exam->save();
        // Get the date from the request
        $date = $request->input('selectedDate');

        // Find the ExamDate record with the specified date
        $examDate = ExamDate::where('type','alhan')->whereJsonContains('date', [['date' => $date]])->first();
        if ($examDate) {
            $dates = json_decode($examDate->date, true);
            foreach ($dates as &$exam) {
                if ($exam['date'] === $date) {
                    $exam['actual_num'] = $exam['actual_num'] + 1;
                    break;
                }
            }
       $examDate->update(['date' => json_encode($dates)]);
        }else{
            return response()->json(['message' => 'Exam dates taks not found'], 201);
        }
        return view('success');
    }
    public function getExamDatesAlhan()
    {
        $examDates = ExamDate::where('type','alhan')->latest()->first();
        $examDatesArray = json_decode($examDates->date, true);
        // dd($examDatesArray);
        return view('exam-date-alhan', ['examDatesArray' => $examDatesArray]);
    }
  
}