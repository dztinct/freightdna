<?php

use App\Models\Shipment;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;

new
#[Layout('layouts.app-new')]
#[Title('Shipment Form | FreightDNA')]

class extends Component
{
    public $sender_name;
    public $sender_phone;
    public $sender_email;

    public $receiver_name;
    public $receiver_phone;
    public $receiver_address;

    public $item_description;
    public $weight;
    public $origin;
    public $destination;
    public $shipping_cost;

    public function submit()
    {
        $this->validate([
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_email' => 'required|email',

            'receiver_name' => 'required|string',
            'receiver_phone' => 'required|string',
            'receiver_address' => 'required|string',

            'item_description' => 'required|string',
            'weight' => 'required|numeric',
            'origin' => 'required|string',
            'destination' => 'required|string',
            'shipping_cost' => 'required|numeric',
        ]);

        $trackingNumber = 'TRK-' . strtoupper(Str::random(10));

   

        Shipment::create([
            'tracking_number' => $trackingNumber,
            'sender_name' => $this->sender_name,
            'sender_phone' => $this->sender_phone,
            'sender_email' => $this->sender_email,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'receiver_address' => $this->receiver_address,
            'item_description' => $this->item_description,
            'weight' => $this->weight,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'shipping_cost' => $this->shipping_cost,
            'status' => 'Created',
        ]);

        session()->flash('success', "Shipment created! Tracking Number: $trackingNumber");
        $this->reset();
    }
};

?>

<div class="max-w-3xl mx-auto p-6 space-y-6">
    <h1 class="text-2xl font-bold">Create Shipment</h1>

    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">

        <h2 class="font-semibold text-lg">Sender Information</h2>
        <input type="text" wire:model="sender_name" placeholder="Sender Name" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('sender_name')" class="mb-4 text-gray-800"/>
        <input type="text" wire:model="sender_phone" placeholder="Sender Phone" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('sender_phone')" class="mb-4"/>
        <input type="email" wire:model="sender_email" placeholder="Sender Email" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('sender_email')" class="mb-4"/>

        <h2 class="font-semibold text-lg">Receiver Information</h2>
        <input type="text" wire:model="receiver_name" placeholder="Receiver Name" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('receiver_name')" class="mb-4"/>
        <input type="text" wire:model="receiver_phone" placeholder="Receiver Phone" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('receiver_phone')" class="mb-4"/>
        <textarea wire:model="receiver_address" placeholder="Receiver Address" class="w-full border p-2 rounded"></textarea>
        <x-input-error :messages="$errors->get('receiver_address')" class="mb-4"/>

        <h2 class="font-semibold text-lg">Shipment Details</h2>

        <input type="text" wire:model="item_description" placeholder="Item Description" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('item_description')" class="mb-4"/>
        <input type="number" wire:model="weight" placeholder="Weight (kg)" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('weight')" class="mb-4"/>
        <input type="text" wire:model="origin" placeholder="Origin" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('origin')" class="mb-4"/>
        <input type="text" wire:model="destination" placeholder="Destination" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('destination')" class="mb-4"/>
        <input type="number" wire:model="shipping_cost" placeholder="Shipping Cost" class="w-full border p-2 rounded">
        <x-input-error :messages="$errors->get('shipping_cost')" class="mb-4"/>

            <div class="buttons flex">
                <button type="submit"
                class="px-6 py-2 bg-[#1649A2] text-white"
                wire:loading.attr="disabled">
                <svg wire:loading wire:target="submit"
                    class="animate-spin h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                   <circle class="opacity-25" cx="12" cy="12" r="10"
                           stroke="currentColor" stroke-width="4"></circle>
                   <path class="opacity-75" fill="currentColor"
                         d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                   </path>
                </svg>
                <span wire:loading.remove wire:target="submit">Submit</span>
            </button>
            
            </div>
        {{-- <button class="px-6 py-2 bg-blue-600 text-white rounded" type="submit">Submit</button> --}}
    </form>
</div>