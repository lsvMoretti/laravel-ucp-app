<?php

namespace App\Http\Livewire;

use App\Models\RegistrationAnswer;
use App\Models\RegistrationQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $answers = [];

    public function mount()
    {
        $questions = RegistrationQuestion::where('is_active', true)->get();

        foreach ($questions as $question){
            $this->answers[$question->id] = '';
        }
    }

    public function submit()
    {
        $user = Auth::user();

        $lastSubmission = RegistrationAnswer::max('submission_id');
        if(empty($lastSubmission)){
            $lastSubmission = 0;
        }
        $lastSubmission = $lastSubmission + 1;

        foreach($this->answers as $questionId => $answerText) {
            $answer = new RegistrationAnswer(['answer' => $answerText, 'question_id' => $questionId, 'submission_id' => $lastSubmission]);
            $user->registrationAnswers()->save($answer);
        }
        Log::debug('Registration submitted');
        session()->flash('success', 'Your application has been submitted');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $user = Auth::user();
        $questions = RegistrationQuestion::where('is_active', true)->get();

        $answers = $user->registrationAnswers()->orderBy('created_at', 'desc')->get();
        if(empty($answers)){
            return view('livewire.registration-form', compact('questions'));
        }

        $answersGroupedBySubmission = $answers->groupBy('submission_id');

        $statusesBySubmission = $answersGroupedBySubmission->map(function ($answers, $submissionId) {
            return $answers->first()->status;
        });
        if($statusesBySubmission->isEmpty()){
            return view('livewire.registration-form', compact('questions'));
        }
        $lastSubmissionStatus = (int)$statusesBySubmission->first();
        switch ($lastSubmissionStatus){
            case 0:
                $message = "Your application hasn't been reviewed yet.";
                session()->flash('error', $message);
                return view('livewire.message-area');
            case 1:
                $message = "Your application has been denied. Please submit a ban appeal";
                session()->flash('error', $message);
                return view('livewire.message-area');
            case 2:
                $message = "Your previous application has been denied. Please re-submit.";
                session()->flash('error', $message);
                break;
            case 3:
                $message = "Your application has been accepted!";
                session()->flash('success', $message);
                return view('livewire.message-area');
            default:
                return view('livewire.message-area');
        }
        return view('livewire.registration-form', compact('questions'));
    }
}
