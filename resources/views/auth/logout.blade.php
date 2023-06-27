<form id="logout-form" method="POST" action="{{ route('logout') }}" name="logout-form">
    @csrf
</form>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        document.getElementById('logout-form').submit();
    });
</script>

@php
    return redirect()->to('/');
@endphp
