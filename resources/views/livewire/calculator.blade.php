<div class="flex items-center gap-4">
    {{-- Num One --}}
    <input type="number" class="input" placeholder="Num One" wire:model="num_one">

    {{-- Operators --}}
    <select wire:model="operator" class="select w-20">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    {{-- Num Two --}}
    <input type="number" class="input" placeholder="Num Two" wire:model="num_two">

    {{-- Evaluation Button --}}
    <button type="button" class="btn btn-primary" wire:click="evaluateOperation">=</button>

    {{-- Result from Evaluation --}}
    <span class="text-2xl text-primary">{{ $result }}</span>
</div>