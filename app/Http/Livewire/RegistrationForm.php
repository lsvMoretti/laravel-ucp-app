<?php

namespace App\Http\Livewire;

use App\Models\RegistrationAnswer;
use App\Models\RegistrationQuestion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegistrationForm extends Component
{

    public $answers = [];

    public function mount()
    {
        $questions = RegistrationQuestion::all();

        foreach ($questions as $question){
            $this->answers[$question->id] = '';
        }
    }

    public function submit()
    {
        $user = Auth::user();

        foreach($this->answers as $questionId => $answerText) {
            $answer = new RegistrationAnswer(['answer' => $answerText, 'question_id' => $questionId]);
            $user->registrationAnswers()->save($answer);
        }

        return redirect()->to('/thank-you');
    }

    public function render()
    {
        $questions = RegistrationQuestion::all();
        return view('livewire.registration-form', compact('questions'));
    }
}
