<?php

namespace App\Http\Livewire\Admin;

use App\Models\RegistrationAnswer;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RegistrationReview extends Component
{
    public $registrationResponse;
    public $submissionId;
    public function mount($submissionId){
        $this->submissionId = $submissionId;
        $this->getRegistrationResponse();
    }
    public function getRegistrationResponse(){
        $pending = RegistrationAnswer::where('status', 0)->where('submission_id', $this->submissionId)->with('user')->orderBy('created_at')->get();
        $this->registrationResponse = $pending;
    }
    public function render()
    {
        return view('livewire.admin.registration-review');
    }
}
