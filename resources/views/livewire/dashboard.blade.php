<div class="flex flex-col gap-10">
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-bold text-primary">Dashboard</h2>

        {{-- Flash Message --}}
        @if (session()->has('feedback'))
            <div role="alert" class="alert alert-primary alert-soft">
                <span>{{ session('feedback') }}</span>
            </div>
        @endif

        <p>Welcome to the dashboard! You are successfully logged in.</p>

        <div class="inline-block">
            <p class="text-primary font-bold">Username: {{ auth()->user()->username }}</p>
            <p class="text-primary font-bold">Email: {{ auth()->user()->email_address }}</p>
        </div>
    </div>
</div>