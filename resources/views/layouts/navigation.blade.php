<div class="bg-gray-800 text-white h-screen p-6 w-64 space-y-10 pt-16">
    <a href="{{ route('dashboard') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
    <nav>
        <ul>
            <li class="group relative">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-300">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <!-- Admin Dropdown -->
            <li class="group relative">
                <x-dropdown align="left" menu-width="full">
                    <x-slot name="trigger">
                        <button class="text-white hover:text-gray-300">
                            {{ __('Admin') }} >
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @if (env('FEATURE_APPROVE_USER', true))
                            <!-- Unapproved Users -->
                            <x-dropdown-link :href="route('admin.unapproved')" :active="request()->routeIs('admin.unapproved')">
                                {{ __('Unapproved Users') }}
                            </x-dropdown-link>
                        @endif
                        <!-- Registration Responses -->
                        <x-dropdown-link :href="route('admin.registration-responses')" :active="request()->routeIs('admin.registration-responses')">
                            {{ __('Registrations') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </li>

            <li class="group relative">
                <x-dropdown align="left" menu-width="full">
                    <x-slot name="trigger">
                        <button class="text-white hover:text-gray-300">
                            {{ __('Registration') }} >
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('registration.quiz')" :active="request()->routeIs('registration.quiz')">
                            {{ __('Registration') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </li>

            <!-- Settings Dropdown -->
            <li class="group relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="text-white hover:text-gray-300">
                            {{ Auth::user()->username }} >
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </li>
        </ul>
    </nav>
</div>
