<?php

use App\Models\Shipment;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;

new
#[Layout('layouts.app-new')]
#[Title('Shipment Track | FreightDNA')]

class extends Component
{
    public $tracking_number="TRK-QGLGNEV0J6";
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


<div class="max-w-xl mx-auto p-12 space-y-8">
    <style>
@keyframes ping {
    0% {
        transform: scale(1);
        opacity: .8;
    }

    50%, 100% {
        transform: scale(2);
        opacity: 0;
    }
}
</style>
    <h1 class="text-2xl font-bold">Track Shipment</h1>

    <input type="text" wire:model="tracking_number" placeholder="Enter Tracking Number" class="w-full border p-2 rounded">

    <button wire:click="search" class="px-6 py-2 bg-[#1649A2] text-white rounded">Track</button>

    @if(session('error'))
        <div class="p-3 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if($shipment)
        <div class="p-4 shadow-lg rounded sm:flex space-y-4 justify-between">
            <div class="space-y-2">
                <p class="text-xs">{{ $tracking_number }}</p>
                <p class="text-2xl text-black fw-bold">{{ $shipment->item_description }}</p>
                <p class="text-xs">Open Carrier ~ Booked {{ date('d M, Y') }}</p>
            </div>
            <div>
                    <span class="bg-green-100 py-1 px-3 text-xs" style="color: green"> IN TRANSIT</span>
                    <!-- Expanding pulse -->
                    <span
                        style="
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            border-radius: 9999px;
                            background: green;
                            opacity: .7;
                            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
                        "
                    ></span>

                    <!-- Center dot -->
                    <span
                        style="
                            position: relative;
                            display: inline-block;
                            width: 12px;
                            height: 12px;
                            border-radius: 9999px;
                            background: green;
                            top: 2px;
                            left: 6px;
                        "
                    ></span>

                </div>
                    <div style="position: relative; width: 24px; height: 24px;">
                </div>
            </div>
        </div>
        <div class="p-4 bg-white shadow rounded space-y-2">
            <p><strong>Status:</strong> {{ $shipment->status }}</p>
            <p><strong>From:</strong> {{ $shipment->origin }}</p>
            <p><strong>To:</strong> {{ $shipment->destination }}</p>
            <p><strong>Item:</strong> {{ $shipment->item_description }}</p>
            <p><strong>Receiver:</strong> {{ $shipment->receiver_name }}</p>
            <p><strong>Sender:</strong> {{ $shipment->sender_name }}</p>
        </div>
    @endif
</div>
