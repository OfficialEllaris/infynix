<?php

namespace App\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $num_one;
    public $num_two;
    public $operator;
    public $result;

    public function mount()
    {
        $this->operator = "+";
    }

    public function evaluateOperation()
    {
        switch ($this->operator) {
            case '+':
                $this->result = $this->num_one + $this->num_two;
                break;
            case '-':
                $this->result = $this->num_one - $this->num_two;
                break;
            case '*':
                $this->result = $this->num_one * $this->num_two;
                break;
            case '/':
                switch ($this->num_two) {
                    case '0':
                        $this->result = "Cannot Divide by Zero!";
                        break;
                    default:
                        $this->result = $this->num_one / $this->num_two;
                        break;
                }
                break;
        }
    }

    public function render()
    {
        return view('livewire.calculator');
    }
}
