<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ExamPaper;
use App\Models\ExamPaperAssignedQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $exam_papers = ExamPaper::query()
            ->latest()
            ->get();

        return view('admin_panel.exam_papers.index', compact('exam_papers'));
    }

    private function data(ExamPaper $examPaper) {
        $subjects = Course::query()
            ->where('status', "active")
            ->latest()
            ->get(['id', 'name', 'code']);

        $questions = Question::query()
            ->where('status', "active")
            ->latest()
            ->get();

        return [
            'exam_paper' => $examPaper,
            'subjects'   => $subjects,
            'questions'  => $questions
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.exam_papers.create', $this->data(new ExamPaper()) + [
            'assigned_question_ids' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'numeric', 'max:20'],
            'description' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'total_mark' => ['required'],
            'per_question_mark' => ['required'],
            'per_question_mark' => ['required'],
            // 'exam_entry_description' => ['required', 'string'],
            'result_publish_time' => ['required'],
            'inputState' => ['required', 'string', 'max:255'],
            'selected_questions' => ['required'],
        ]);

        $exam_paper = ExamPaper::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'date_and_time' => $request->date_and_time,
            'end_date_and_time' => $request->end_date_and_time,
            'duration' => $request->duration,
            'total_mark' => $request->total_mark,
            'per_question_mark' => $request->per_question_mark,
            'per_question_negative_mark' => $request->per_question_negative_mark,
            'result_publish_time' => $request->result_publish_time,
            'status' => $request->inputState,
        ]);

        if ($request->selected_questions) {
            foreach($request->selected_questions as $selected_question) {
                ExamPaperAssignedQuestion::create([
                    'exam_paper_id' => $exam_paper->id,
                    'question_id'   => $selected_question
                ]);
            }
        }
        
        return redirect()->to('admin-panel/dashboard/exam-papers')
            ->with('success', 'Exam Paper Created Successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamPaper $examPaper) {
        return view('admin_panel.exam_papers.show', $this->data($examPaper));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamPaper $examPaper) {
        $assigned_question_ids = $examPaper->assigned_question->pluck('question_id')->toArray();

        return view('admin_panel.exam_papers.edit', $this->data($examPaper) + [
            'assigned_question_ids' => $assigned_question_ids
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamPaper $examPaper) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'numeric', 'max:20'],
            'description' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'total_mark' => ['required'],
            'per_question_mark' => ['required'],
            'per_question_mark' => ['required'],
            // 'exam_entry_description' => ['required', 'string'],
            'result_publish_time' => ['required'],
            'inputState' => ['required', 'string', 'max:255'],
            'selected_questions' => ['required'],
        ]);

        $examPaper->update([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'date_and_time' => $request->date_and_time,
            'end_date_and_time' => $request->end_date_and_time,
            'duration' => $request->duration,
            'total_mark' => $request->total_mark,
            'per_question_mark' => $request->per_question_mark,
            'per_question_negative_mark' => $request->per_question_negative_mark,
            'result_publish_time' => $request->result_publish_time,
            'status' => $request->inputState,
        ]);

        if ($request->selected_questions) {
            foreach($request->selected_questions as $selected_question) {
                ExamPaperAssignedQuestion::updateOrCreate([
                    'exam_paper_id' => $examPaper->id,
                    'question_id'   => $selected_question
                ]);
            }
        }
        
        return redirect()->to('admin-panel/dashboard/exam-papers')
            ->with('success', 'Exam Paper Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamPaper $examPaper) {
        $examPaper->delete();

        return redirect()->to('admin-panel/dashboard/exam-papers')
            ->with('success', 'Exam Paper Delete Successfully!!!');
    }
}
