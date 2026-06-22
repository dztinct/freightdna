<?php

use App\Models\Shipment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('layouts.app-new')]
#[Title('Shipment Track | FreightDNA')]

class extends Component
{
    public $tracking_number;
    public $shipment = null;

    public function search()
    {
        $this->shipment = Shipment::where('tracking_number', $this->tracking_number)->first();

        if (!$this->shipment) {
            session()->flash('error', 'Tracking number not found.');
        }
    }

    public function statusConfig($status)
    {
        return match ($status) {
            'Picked Up' => ['label' => 'PICKED UP', 'color' => '#f59e0b'],
            'In Transit' => ['label' => 'IN TRANSIT', 'color' => '#ef4444'],
            'Delivered' => ['label' => 'DELIVERED', 'color' => '#22c55e'],
            default => ['label' => 'SHIPMENT BOOKED', 'color' => '#3b82f6'],
        };
    }
};

?>

<div class="max-w-3xl mx-auto p-10 space-y-8">

    <style>
        @keyframes ping {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }
            75% {
                transform: scale(2.2);
                opacity: 0;
            }
            100% {
                transform: scale(2.2);
                opacity: 0;
            }
        }
    </style>

    <h1 class="text-2xl font-bold">Track Shipment</h1>

    <input
        type="text"
        wire:model="tracking_number"
        placeholder="Enter Tracking Number"
        class="w-full border p-2 rounded"
    >

    <button
        wire:click="search"
        class="px-6 py-2 bg-[#1649A2] text-white rounded"
    >
        Track
    </button>

    @if (session('error'))
        <div class="p-3 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if ($shipment)

        @php
            $status = $this->statusConfig($shipment->status);
        @endphp

        <!-- SHIPMENT CARD -->
        <div class="p-3 shadow-lg rounded sm:flex items-center justify-between space-y-4">

            <div class="space-y-2">
                <p class="text-xs text-gray-500">{{ $tracking_number }}</p>
                <p class="text-2xl font-bold text-black">{{ $shipment->item_description }}</p>
                <p class="text-xs text-gray-500">
                    Open Carrier ~ Booked {{ date('d M, Y') }}
                </p>
            </div>

            <div class="flex items-center gap-4">

                <!-- STATUS BADGE -->
                <span
                    class="text-xs px-3 py-1 rounded text-white"
                    style="background: {{ $status['color'] }}"
                >
                    {{ $status['label'] }}
                </span>
                <!-- BLINKING MARKER -->
                <div class="relative w-6 h-6">

                    <span
                        style="
                            position:absolute;
                            inset:0;
                            border-radius:9999px;
                            background: {{ $status['color'] }};
                            opacity:0.5;
                            animation: ping 1.5s infinite;
                        "
                    ></span>

                    <span
                        style="
                            position:absolute;
                            top:50%;
                            left:50%;
                            width:10px;
                            height:10px;
                            border-radius:9999px;
                            background: {{ $status['color'] }};
                            transform: translate(-50%, -50%);
                        "
                    ></span>

                </div>


            </div>
        </div>

        {{-- ROUTE CARDS --}}
        <div class="sm:flex justify-between space-y-3">
            <div class="p-4 bg-white shadow rounded space-y-3 ">
                <p>ORIGIN</p>
                <p>{{ $shipment->origin }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded space-y-3">
                <p>DESTINATION</p>
                <p>{{ $shipment->destination }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded space-y-3">
                <p>WEIGHT</p>
                <p>{{ $shipment->weight }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded space-y-3">
                <p>RECEIVER'S ADDRESS</p>
                <p>{{ $shipment->receiver_address }}</p>
            </div>
        </div>

        <!-- ROUTE PROGRESS -->
        <div class="p-4 bg-white shadow rounded space-y-3">

            <p class="text-sm font-semibold">Shipment Progress</p>

            <div class="flex justify-between text-xs">
                <p>{{ $shipment->origin }}</p><p>{{ $shipment->destination }}</p>
            </div>
            <div class="relative w-full h-2 bg-gray-200 rounded">
                <div
                    class="absolute top-0 left-0 h-2 rounded transition-all duration-700"
                    style="width: {{ $shipment->shipping_progress }}%; background: {{ $status['color']; }}"
                ></div>

                <div
                    class="absolute -top-2 text-xl"
                    style="left: {{ $shipment->shipping_progress }}%; transform: translateX(-50%);"
                >
                    🚚
                </div>

            </div>
                        <div class="flex justify-between text-xs">
                <p>Departed {{ $shipment->created_at->format('M d') }}</p><p>{{ $shipment->shipping_progress }}%</p><p>ETA {{ $shipment->created_at->addDays(5)->format('M d') }}</p>
            </div>

        </div>

        <!-- SHIPMENT TIMELINE -->
        <div class="w-full rounded shadow">

@php

$timeline = [
[
'label' => 'Shipment Booked',
'description' => 'Shipment was created and registered.',
'status' => true,
],
[
'label' => 'Picked Up',
'description' => 'Carrier received shipment.',
'status' => in_array(($shipment->status), [
'Picked Up',
'In Transit',
'delivered'
]),
],
[
'label' => 'In Transit',
'description' => 'Shipment is currently moving.',
'status' => in_array(($shipment->status), [
'In Transit',
'Delivered'
]),
],
[
'label' => 'Delivered',
'description' => 'Shipment delivered successfully.',
'status' => ($shipment->status) === 'Delivered',
],

];

@endphp

<div class="bg-white shadow rounded p-6">

<h2 class="text-lg font-semibold mb-6">
    Shipment Timeline
</h2>

<div class="space-y-6">

    @foreach($timeline as $index => $step)

        <div class="flex gap-4">

            <!-- Indicator -->
            <div class="relative">

                <div
                    class="w-5 h-5 rounded-full flex items-center justify-center"
                    style="
                        background:
                        {{ $step['status']
                            ? '#22c55e'
                            : '#d1d5db'
                        }};
                    "
                >

                    @if($step['status'])

                        <div
                            class="w-2 h-2 rounded-full bg-white"
                        ></div>

                    @endif

                </div>

                @if(!$loop->last)

                    <div
                        style="
                            width:2px;
                            height:55px;
                            margin:auto;
                            background:
                            {{ $step['status']
                                ? '#22c55e'
                                : '#e5e7eb'
                            }};
                        "
                    ></div>

                @endif

            </div>

            <!-- Content -->
            <div class="pb-6">

                <p
                    class="font-semibold"
                    style="
                        color:
                        {{ $step['status']
                            ? '#111827'
                            : '#9ca3af'
                        }};
                    "
                >
                    {{ $step['label'] }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $step['description'] }}
                </p>

                @if(
                    $step['status']
                    && !$loop->last
                )
                    <p class="text-xs text-green-600 mt-1">
                        Completed
                    </p>
                @endif

            </div>

        </div>

    @endforeach

</div>

</div>

        </div>


    @endif
{{-- 
    <!-- LEAFLET -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    
        const map = L.map('map').setView([9.0765, 7.3986], 6);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);
    
        const origin = [9.0765, 7.3986];
        const destination = [6.5244, 3.3792];
    
        L.marker(origin).addTo(map).bindPopup("Origin");
        L.marker(destination).addTo(map).bindPopup("Destination");
    
        const route = L.polyline([origin, destination], {
            color: 'blue'
        }).addTo(map);
    
        map.fitBounds(route.getBounds());
    
    });
    </script> --}}
</div>
