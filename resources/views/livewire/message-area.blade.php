<div class="flex justify-center pt-5">
    <div class="w-full max-w-md">
        @if(session()->has('success'))
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-6 shadow sm:rounded-lg text-center" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
                    {{session('success')}}
                </div>
            </div>
            <br/>
        @endif
        @if(session()->has('error'))
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-6 shadow sm:rounded-lg text-center" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
                    {{session('error')}}
                </div>
            </div>
            <br/>
        @endif
    </div>
</div>
