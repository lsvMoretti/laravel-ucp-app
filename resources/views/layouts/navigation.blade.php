<div class="bg-gray-950 text-white h-full p-6 w-64 space-y-10 pt-16">
    <a href="{{ route('dashboard') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
    <nav>
        <ul>
            <li class="group relative">
                <x-nav-link class="text-white hover:text-white" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-house pr-2"></i>{{ __('Dashboard') }}
                </x-nav-link>
            </li>
            @hasanyrole('admin|lead|management|senior|support')
            <p class="pl-2 text-xl text-grey-400">Admin</p>
            <li class="group relative">
                <x-nav-link class="text-slate-300 hover:text-white hover:bg-crp-darkred" :href="route('admin.registration-responses')" :active="request()->routeIs('admin.registration-responses')">
                    <i class="fa-solid fa-file-circle-question pr-2"></i> {{__('Pending Registrations')}}
                </x-nav-link>
            </li>
            @endhasanyrole
            @if(auth()->user()->cannot('whitelisted'))
            <p class="pl-2 text-grey-400">Registration</p>
            <li class="group relative">
                <x-nav-link class="text-slate-300 hover:text-white hover:bg-crp-darkred" :href="route('registration.quiz')" :active="request()->routeIs('registration.quiz')">
                    <i class="fa-solid fa-plus pr-2"></i> {{__('Register')}}
                </x-nav-link>
            </li>
            @endif
            <p class="pl-2 text-grey-400">Account</p>
            <li class="group relative">
                <x-nav-link class="text-slate-300 hover:text-white hover:bg-crp-darkred" :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <i class="fa-solid fa-id-badge pr-2"></i> {{__('Edit Profile')}}
                </x-nav-link>
                <!-- Logout form fields -->

                <x-nav-link class="text-slate-300 hover:text-white hover:bg-crp-darkred" :href="route('logout-user')" :active="request()->routeIs('logout-user')">
                    <i class="fa-solid fa-person-walking-arrow-right pr-2"></i> {{__('Logout')}}
                </x-nav-link>
            </li>
        </ul>
    </nav>
</div>
