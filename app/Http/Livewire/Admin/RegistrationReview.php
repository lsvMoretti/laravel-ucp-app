<?php

namespace App\Http\Livewire\Admin;

use App\Models\RegistrationAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RegistrationReview extends Component
{
    public $registrationResponse;
    public $submissionId;
    public function mount($submissionId){
        $user = Auth::user();

        if(!$user->can('view registrations')){
            return redirect()->route('dashboard');
        }

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

    public function approveSubmission()
    {
        $responses = RegistrationAnswer::where('submission_id', $this->submissionId)->get();;
        foreach ($responses as $response){
            $response->status = 3;
            $response->save();
        }
        session()->flash('success', 'The application has been approved');
        return redirect()->route('admin.registration-responses');
    }

    public function reapplySubmission()
    {
        $responses = RegistrationAnswer::where('submission_id', $this->submissionId)->get();
        foreach ($responses as $response){
            $response->status = 2;
            $response->save();
        }
        session()->flash('success', 'The application has been declined.');
        return redirect()->route('admin.registration-responses');
    }

    public function submitBanAppeal()
    {
        $responses = RegistrationAnswer::where('submission_id', $this->submissionId)->get();;
        foreach ($responses as $response){
            $response->status = 1;
            $response->save();
        }
        session()->flash('success', 'The application has been declined.');
        return redirect()->route('admin.registration-responses');
    }
}
