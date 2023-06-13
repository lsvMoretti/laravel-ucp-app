<?php

namespace App\Http\Livewire\Admin;

use App\Models\RegistrationAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RegistrationResponses extends Component
{
    public $pendingResponses;
    public function mount()
    {
        $user = Auth::user();
        $hasPermission = $user->can('view registrations');
        Log::debug($hasPermission);
        if (!$hasPermission) {
            session()->flash('error', 'You do not have permission to view this page.');
            abort(401);
        }
        $this->getPendingResponses();
    }

    public function getPendingResponses()
    {
        $pending = RegistrationAnswer::where('status', 0)->with(['user', 'question'])->orderBy('created_at')->get();
        $this->pendingResponses = $pending->groupBy('submission_id')->toArray();
        return $this->pendingResponses;
    }

    public function showSubmission($submissionId){
        return redirect()->route('admin.registration-review', ['submissionId' => $submissionId]);
    }

    public function render()
    {
        return view('livewire.admin.registration-responses');
    }
}
