<?php

namespace App\Livewire\Admin;

use App\Models\Experience;
use App\Models\Destination;
use Livewire\Component;
use Livewire\WithPagination;

class Experiences extends Component
{
    use WithPagination;

    public $name, $description, $price, $category, $image_url, $destination_id, $experienceId;
    public $isOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'destination_id' => 'required|exists:destinations,id',
        'image_url' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.experiences', [
            'experiences' => Experience::with('destination')->latest()->paginate(10),
            'destinations' => Destination::all()
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
        $this->category = '';
        $this->description = '';
        $this->price = '';
        $this->image_url = '';
        $this->destination_id = '';
        $this->experienceId = '';
    }

    public function store()
    {
        $this->validate();

        Experience::updateOrCreate(['id' => $this->experienceId], [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image_url' => $this->image_url,
            'destination_id' => $this->destination_id,
        ]);

        session()->flash('message', 
            $this->experienceId ? 'Experience Updated Successfully.' : 'Experience Created Successfully.');

        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->experienceId = $id;
        $this->name = $experience->name;
        $this->category = $experience->category;
        $this->description = $experience->description;
        $this->price = $experience->price;
        $this->image_url = $experience->image_url;
        $this->destination_id = $experience->destination_id;

        $this->isOpen = true;
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        session()->flash('message', 'Experience Deleted Successfully.');
    }
}
