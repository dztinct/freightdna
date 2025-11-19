<?php

use Livewire\Volt\Component;
use Laravel\Fortify\Actions\Logout;

new class extends Component {
    public function logout()
    {
        auth()->logout();                     // log the user out
        session()->invalidate();              // invalidate session
        session()->regenerateToken();         // regenerate CSRF token

        $this->redirect('/', navigate: true); // redirect to homepage
    }
};
?>

<button wire:click="logout" class="btn btn-danger ms-2">
    Log Out
</button>
