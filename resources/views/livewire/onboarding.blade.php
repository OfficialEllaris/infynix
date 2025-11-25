<div>
    <input type="text" placeholder="Username" wire:model.live="username" @error('username') style="border-color:red;"
    @enderror>
    <br>
    @error('username')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br>

    <input type="email" placeholder="Email" wire:model.live="email_address" @error('email_address')
    style="border-color:red;" @enderror>
    <br>
    @error('email_address')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br>

    <input type="password" placeholder="Password" wire:model.live="password" @error('password')
    style="border-color:red;" @enderror>
    <br>
    @error('password')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br>

    <button wire:click="registerUser" wire:loading.attr="disabled">
        <span wire:loading.remove>Register</span>
        <span wire:loading>Processing...</span>
    </button>

    <br>
    <br>
    <span>{{ $feedback }}</span>
    <br>
    <span>{{ $username_value }}</span>
    <br>
    <span>{{ $email_address_value }}</span>
    <br>
    <span>{{ $password_value }}</span>
</div>