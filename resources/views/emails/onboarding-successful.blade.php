<x-mail::message>
    # Account Onboarding Successful

    Dear {{ $user->username }},

    Thank you for signing up to {{ config('app.name') }}. We are excited to have you on board.

    <x-mail::button :url="route('login')">
        Login to your account
    </x-mail::button>

    Best regards, {{ config('app.name') }}
</x-mail::message>