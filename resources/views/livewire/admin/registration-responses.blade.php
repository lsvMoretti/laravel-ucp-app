<div class="flex flex-col items-center">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-sm font-extrabold text-gray-500 uppercase tracking-wider">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-sm font-extrabold text-gray-500 uppercase tracking-wider">
                            Date Submitted
                        </th>
                    </tr>
                    </thead>
                    @if (count($pendingResponses) > 0)
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pendingResponses as $submission)
                            <tr wire:click="showSubmission({{ $submission[0]['submission_id'] }})" class="cursor-pointer hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                        {{ $submission[0]['user']['username'] }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 text-center">
                                        {{ (new DateTime($submission[0]['created_at']))->format('Y-m-d H:i') }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    No Registrations Found
                                </td>
                            </tr>
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
