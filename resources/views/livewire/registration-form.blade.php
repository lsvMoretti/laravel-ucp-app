<div class="flex justify-center pt-5">
    <div class="w-full max-w-md">
        <form wire:submit.prevent="submit">
            @foreach($questions as $question)
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answer{{ $question->id }}">
                        {{ $question->question }}
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="answer{{ $question->id }}" wire:model="answers.{{ $question->id }}">
                    @error('answers.' . $question->id) <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
            @endforeach
            <div class="flex items-center justify-between">
                <x-primary-button>Submit</x-primary-button>
            </div>
        </form>
    </div>
</div>
