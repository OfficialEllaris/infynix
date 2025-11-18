<div>
    {{-- Num One --}}
    <input type="number" placeholder="Num One" wire:model="num_one">

    {{-- Operators --}}
    <select wire:model="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    {{-- Num Two --}}
    <input type="number" placeholder="Num Two" wire:model="num_two">

    {{-- Evaluation Button --}}
    <button type="button" wire:click="evaluateOperation">=</button>

    {{-- Result from Evaluation --}}
    <span>{{ $result }}</span>
</div>