<?php

use App\Models\Shipment;
use Livewire\Volt\Component;

new class extends Component {
    public $tracking_number;
    public $shipment;

    public function search()
    {
        $this->shipment = Shipment::where('tracking_number', $this->tracking_number)->first();

        if (!$this->shipment) {
            session()->flash('error', 'Tracking number not found.');
        }
    }
};

?>

<div class="max-w-xl mx-auto p-6 space-y-6">
    <h1 class="text-2xl font-bold">Track Shipment</h1>

    <input type="text" wire:model="tracking_number" placeholder="Enter Tracking Number" class="w-full border p-2 rounded">

    <button wire:click="search" class="px-6 py-2 bg-blue-600 text-white rounded">Track</button>

    @if(session('error'))
        <div class="p-3 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if($shipment)
        <div class="p-4 bg-white shadow rounded space-y-2">
            <p><strong>Status:</strong> {{ $shipment->status }}</p>
            <p><strong>From:</strong> {{ $shipment->origin }}</p>
            <p><strong>To:</strong> {{ $shipment->destination }}</p>
            <p><strong>Item:</strong> {{ $shipment->item_description }}</p>
            <p><strong>Receiver:</strong> {{ $shipment->receiver_name }}</p>
        </div>
    @endif
</div>
