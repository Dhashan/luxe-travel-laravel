<?php

namespace App\Livewire\Admin;

use App\Models\Destination;
use Livewire\Component;
use Livewire\WithPagination;

class Destinations extends Component
{
    use WithPagination;

    public $name, $description, $base_price, $image_url, $destinationId;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'base_price' => 'required|numeric|min:0',
        'image_url' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.destination-crud', [
            'destinations' => Destination::latest()->paginate(10)
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function toggleForm()
    {
        $this->isOpen = !$this->isOpen;
        if (!$this->isOpen) {
            $this->resetInputFields();
        }
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->base_price = '';
        $this->image_url = '';
        $this->destinationId = '';
    }

    public function store()
    {
        $this->validate();

        Destination::updateOrCreate(['id' => $this->destinationId], [
            'name' => $this->name,
            'description' => $this->description,
            'base_price' => $this->base_price,
            'image_url' => $this->image_url,
        ]);

        session()->flash('message', 
            $this->destinationId ? 'Destination Updated Successfully.' : 'Destination Created Successfully.');

        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        $this->destinationId = $id;
        $this->name = $destination->name;
        $this->description = $destination->description;
        $this->base_price = $destination->base_price;
        $this->image_url = $destination->image_url;

        $this->isOpen = true;
    }

    public function delete($id)
    {
        Destination::find($id)->delete();
        session()->flash('message', 'Destination Deleted Successfully.');
    }
}
