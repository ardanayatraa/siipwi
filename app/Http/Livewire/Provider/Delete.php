<?php

namespace App\Http\Livewire\Provider;


use Livewire\Component;
use App\Models\Provider;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use MAS\Toaster\Toaster;

class Delete extends Component
{
    use LivewireAlert;
    public $providerId;
    public $provider;
    public $isOpen = false;

    public function mount($providerId)
    {
        $this->providerId = $providerId;
        $this->provider = Provider::find($this->providerId);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function delete()
    {
        Provider::find($this->providerId )
            ->delete();

        $this->reset(['providerId', 'provider', 'isOpen']);
        $this->alert('success', 'Provider Deleted !');
         return redirect()->route('provider.index');
    }

    public function render()
    {
        return view('livewire.provider.delete');
    }
}
