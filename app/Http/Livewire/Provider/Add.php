<?php

namespace App\Http\Livewire\Provider;
use Masmerise\Toaster\Toaster;

use Livewire\Component;
use App\Models\Provider;
use Illuminate\Support\Str;

class Add extends Component
{
    public $name;
    public $provider;
    public $code;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {

        $this->isOpen = false;
    }

    public function add()
    {
        $this->validate();

        $this->provider=Provider::create([
            'id' => (string) Str::uuid(),
             'name' => strtoupper($this->name),
            'code' => strtoupper($this->code),

        ]);

        $this->reset(['name', 'code', 'isOpen']);

        return redirect()->route('provider.index');
    }

    public function render()
    {

        return view('livewire.provider.add');
    }
}
