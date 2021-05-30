<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Feedback;


class FeedbackController extends Controller
{
    //==========================================================================
    public function __construct()
    {
        $this->middleware('auth');
    }

    //==========================================================================
    public function index()
    {
        $feedbacks = Feedback::all();

        return view('admin.feedbacks.index')->with('feedbacks', $feedbacks);
    }

    //==========================================================================
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedback.index')
            ->with('success', 'Feedback eliminado com sucesso');
    }
}
