<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $questions = Question::query()
            ->latest()
            ->get();

        return view('admin_panel.questions.index', compact('questions'));
    }

    private function data(Question $question) {
        return [
            'subjects' => Course::query()
                            ->where('status', "active")
                            ->latest()
                            ->get(['id', 'name', 'code']),
            'question' => $question
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin_panel.questions.create', $this->data(new Question()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'course_id'        => ['required', 'numeric', 'max:20'],
            'type'              => ['required', 'string', 'max:255'],
            'title'             => ['required', 'string'],
            // 'option_a'          => ['required', 'string', 'max:255'],
            // 'option_b'          => ['required', 'string', 'max:255'],
            // 'option_c'          => ['required', 'string', 'max:255'],
            // 'option_d'          => ['required', 'string', 'max:255'],
            'correct_answer'    => ['required', 'string'],
            'inputState'        => ['required', 'string', 'max:255'],
        ]);

        Question::create([
            'course_id'        => $request->course_id,
            'type'              => $request->type,
            'title'             => $request->title,
            'option_a'          => $request->option_a,
            'option_b'          => $request->option_b,
            'option_c'          => $request->option_c,
            'option_d'          => $request->option_d,
            'option_e'          => $request->option_e,
            'correct_answer'    => $request->correct_answer,
            'reference'         => $request->reference,
            'description'       => $request->description,
            'status'            => $request->inputState
        ]);

        return redirect()->to('admin-panel/dashboard/questions')
            ->with('success', 'Question Created Successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question) {
        return view('admin_panel.questions.show', $this->data($question));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question) {
        return view('admin_panel.questions.edit', $this->data($question));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question) {
        $request->validate([
            'course_id'        => ['required', 'numeric', 'max:20'],
            'type'              => ['required', 'string', 'max:255'],
            'title'             => ['required', 'string'],
            // 'option_a'          => ['required', 'string', 'max:255'],
            // 'option_b'          => ['required', 'string', 'max:255'],
            // 'option_c'          => ['required', 'string', 'max:255'],
            // 'option_d'          => ['required', 'string', 'max:255'],
            'correct_answer'    => ['required', 'string'],
            'inputState'        => ['required', 'string', 'max:255'],
        ]);

        $question->update([
            'course_id'        => $request->course_id,
            'type'              => $request->type,
            'title'             => $request->title,
            'option_a'          => $request->option_a,
            'option_b'          => $request->option_b,
            'option_c'          => $request->option_c,
            'option_d'          => $request->option_d,
            'option_e'          => $request->option_e,
            'correct_answer'    => $request->correct_answer,
            'reference'         => $request->reference,
            'description'       => $request->description,
            'status'            => $request->inputState
        ]);

        return redirect()->to('admin-panel/dashboard/questions')
            ->with('success', 'Question Update Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question) {
        $question->delete();

        return redirect()->to('admin-panel/dashboard/questions')
            ->with('success', 'Question Delete Successfully!!!');
    }
}
