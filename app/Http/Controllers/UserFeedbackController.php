<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;
use Illuminate\Http\Request;


class UserFeedbackController extends Controller
{
    //==========================================================================================
    public function store(Request $request){


        $request->validate([
            'text_nome' => 'required',
            'text_email' => 'required',
            'text_feedback' => 'required|max:255'
        ]);

        $feedback = new feedback;

        $feedback->nome = $request->text_nome;
        $feedback->email = $request->text_email;
        $feedback->texto = $request->text_feedback;

        $feedback->save();

        return redirect()->route('welcome');
    }
}
