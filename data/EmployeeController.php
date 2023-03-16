<?php

namespace App\Http\Controllers;

use App\Models\Enquete;
use App\Models\EnqueteQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index'); 
    }

    public function create()
    {
        return view('employee.enquete.create');
    }

    public function store(request $request)
    {
        // $enqueteQuestion = new EnqueteQuestion();
        $categorieId = $request->input('category_id');
        // $questionA = $request->input('enqueteQuestion_1');
        // $this->validate($request, [
        //     'title' => 'required',
        // ]);

        // $enquete = new Enquete();
        // $enquete->title = $request->title;
        // $enquete->category_id = $categorieId;
        // $enqueteQuestion->question_id = $questionA->id;
        // $enqueteQuestion->save();

        // $enquete->save();



    //HIER begint nieuwe code 

    // Valideer de enquete gegevens
    $request->validate([
        'title' => 'required'
    ]);

    // Maak de enquete aan
    $enquete = Enquete::create([
        'titleenquete' => $request->name,
        'category_id' => $categorieId

    ]);

    // Maak de vragen aan en link ze aan de enquete
    foreach ($request->questions as $questionData) {
        $question = Question::create([
            'title' => $questionData['title'],
        ]);
        EnqueteQuestion::create([
            'enquete_id' => $enquete->id,
            'question_id' => $question->id,
        ]);
    }

    $request->save();

        return redirect('/employee/enquete');
    }
}
