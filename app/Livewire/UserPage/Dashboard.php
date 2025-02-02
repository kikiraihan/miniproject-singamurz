<?php

namespace App\Livewire\UserPage;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user-page.dashboard')->layout('landing.layout-user');
    }
}
