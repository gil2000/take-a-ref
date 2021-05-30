<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feedbacks = Feedback::all();

        return view('admin.feedbacks.index')->with('feedbacks', $feedbacks);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $feedback = new feedback;

        $feedback->nome = $request->text_nome;
        $feedback->email = $request->text_email;
        $feedback->texto = $request->text_feedback;

        $feedback->save();

        return redirect()->route('welcome');
    }


    public function show(Feedback $feedback)
    {

    }


    public function edit(Feedback $feedback)
    {
        //
    }


    public function update(Request $request, Feedback $feedback)
    {
        //
    }


    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedback.index')
            ->with('success', 'Feedback eliminado com sucesso');
    }
}
