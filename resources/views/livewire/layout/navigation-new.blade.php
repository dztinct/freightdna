<?php

use Livewire\Volt\Component;
use Illuminate\Contracts\Auth\StatefulGuard;

new class extends Component
{
    public function logout(StatefulGuard $auth): void
    {
        $auth->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
};
?>

<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">

    <li>
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav-link>
    </li>

    <li>
        <x-nav-link :href="route('services')" :active="request()->routeIs('services')">Services</x-nav-link>
    </li>

    <li>
        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">About</x-nav-link>
    </li>

    <li>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">Contact</x-nav-link>
    </li>

    <li>
        <x-nav-link :href="route('shipment.form')" :active="request()->routeIs('shipment.form')">Ship</x-nav-link>
    </li>

    @if(auth()->check())
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
        </li>

        <li>
            <button wire:click="logout" class="btn btn-danger">
                Log Out
            </button>
        </li>
    @endif
</ul>
