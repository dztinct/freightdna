<?php

use App\Models\Shipment;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app-new')] class extends Component
{
    public $shipments;
    public $statusOptions = ["Created", "In Transit", "Out for Delivery", "Delivered"];

    public function mount()
    {
        $this->shipments = Shipment::latest()->get();
    }

    public function updateStatus($id, $status)
    {
        $s = Shipment::find($id);
        $s->status = $status;
        $s->save();

        $this->mount(); // refresh list
    }
};

?>

<div class="max-w-4xl mx-auto p-6 space-y-6">
    <h1 class="text-2xl font-bold">All Shipments</h1>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2 border">Tracking</th>
                <th class="p-2 border">Sender</th>
                <th class="p-2 border">Receiver</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($shipments as $s)
            <tr>
                <td class="border p-2">{{ $s->tracking_number }}</td>
                <td class="border p-2">{{ $s->sender_name }}</td>
                <td class="border p-2">{{ $s->receiver_name }}</td>
                <td class="border p-2">{{ $s->status }}</td>
                <td class="border p-2">
                    <select wire:change="updateStatus({{ $s->id }}, $event.target.value)" class="border rounded p-1">
                        @foreach($statusOptions as $opt)
                            <option value="{{ $opt }}" @selected($opt == $s->status)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
