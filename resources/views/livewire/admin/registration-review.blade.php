<div class="flex flex-col items-center p-6">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="text-center text-2xl font-bold mb-6">
                Reviewing registration for {{$registrationResponse->first()->user->username}}
            </div>
            <div class="mb-4">
                <span class="text-lg font-semibold">Submitted on:</span>
                <span class="text-lg">{{ (new DateTime($registrationResponse->first()->created_at))->format('Y-m-d H:i') }}</span>
            </div>
            @foreach($registrationResponse as $response)
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-sm font-extrabold text-gray-500 uppercase tracking-wider">
                                Question: {{$response->question->question}}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 text-center">
                                    {{$response->answer}}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
            <div class="flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="color: white; background-color: blue;">
                    Button 1
                </button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" style="color: white; background-color: green;">
                    Button 2
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Button 3
                </button>
            </div>
        </div>
    </div>
</div>
