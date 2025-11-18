<div>
    <input type="text" placeholder="Username" wire:model="username">
    <input type="text" placeholder="Email Address" wire:model="email_address">
    <input type="text" placeholder="********" wire:model="password">
    <button type="button" wire:click="registerUser">Register</button>
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