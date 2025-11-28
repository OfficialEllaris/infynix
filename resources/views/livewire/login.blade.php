<div class="flex flex-col gap-10">
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-bold text-primary">Admin Onboarding Form</h2>

        <form wire:submit.prevent="loginUser" class="space-y-4">
            {{-- Flash Message --}}
            @if (session()->has('feedback'))
                <div role="alert" class="alert alert-primary alert-soft">
                    <span>{{ session('feedback') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email Address</legend>
                    <input type="email" wire:model="email_address" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('email_address')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Password</legend>
                    <input type="password" wire:model="password" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('password')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>
            </div>

            <button class="btn btn-primary">Validate Credentials</button>
        </form>
    </div>
</div>