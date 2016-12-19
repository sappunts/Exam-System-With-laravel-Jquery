<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposition;

class PropositionController extends Controller
{
    public function index() {
    	$Proposition = $this->GetExamFromDB();
    	return view('exam', array('Proposition' => $Proposition));
    }

    public function GetExamFromDB() {
    	$Exam = Proposition::orderBy('id')->get();
    	return $Exam;
    }

    public function ExamCheck(Request $request){
    	$AnswerlistFromGet = [$request->answer_1,$request->answer_2,$request->answer_3,$request->answer_4,$request->answer_5];
    	$AnswerFromDatabase = $this->GetExamFromDB();
    	foreach($AnswerFromDatabase as $Answer){
    		$AnswerList[] = $Answer->true_answer;
    	}
    	$Reply = array_intersect_assoc($AnswerlistFromGet, $AnswerList);
        $Score = count($Reply);
    	$ReturnJSON = ['Score' => $Score, 'AnswerList' => $AnswerList];
    	$ReturnJSON = json_encode($ReturnJSON);
        return $ReturnJSON;
    }
}
