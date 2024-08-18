<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider;
use Masmerise\Toaster\Toaster;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    public $providerId;
    public $name;
    public $code;

    public function mount($id)
    {
        $provider = Provider::findOrFail($id);

        $this->providerId = $provider->id;
        $this->name = $provider->name;
        $this->code = $provider->code;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        $provider = Provider::findOrFail($this->providerId);
        $provider->update([
            'name' => $this->name,
            'code' => $this->code,
        ]);
        $this->alert('success', 'Provider Updated !');
        return redirect()->route('provider.index');
    }

    public function render()
    {
        return view('livewire.provider.edit');
    }
}
