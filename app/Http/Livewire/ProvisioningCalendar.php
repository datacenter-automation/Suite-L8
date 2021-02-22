<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ProvisioningCalendar extends LivewireCalendar
{

    public function events(): Collection
    {
        // must return a Laravel collection
        return collect([
            [
                'id'          => 1,
                'title'       => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date'        => Carbon::tomorrow(),
            ],
            [
                'id'          => 2,
                'title'       => 'Cochlear Implant Surgery',
                'description' => 'Kit Renner',
                'date'        => Carbon::now()->addDays(3),
            ],
            [
                'id'          => 3,
                'title'       => 'Cochlear Implant Recovery',
                'description' => 'Recovery Starts',
                'date'        => Carbon::now()->addDays(3),
            ],
        ]);
    }
}
