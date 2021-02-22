<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class StatesUS
{

    protected $items = [
        'Alabama'        => 'AL',
        'Alaska'         => 'AK',
        'Arizona'        => 'AZ',
        'Arkansas'       => 'AR',
        'California'     => 'CA',
        'Colorado'       => 'CO',
        'Connecticut'    => 'CT',
        'Delaware'       => 'DE',
        'Florida'        => 'FL',
        'Georgia'        => 'GA',
        'Hawaii'         => 'HI',
        'Idaho'          => 'ID',
        'Illinois'       => 'IL',
        'Indiana'        => 'IN',
        'Iowa'           => 'IA',
        'Kansas'         => 'KS',
        'Kentucky'       => 'KY',
        'Louisiana'      => 'LA',
        'Maine'          => 'ME',
        'Maryland'       => 'MD',
        'Massachusetts'  => 'MA',
        'Michigan'       => 'MI',
        'Minnesota'      => 'MN',
        'Mississippi'    => 'MS',
        'Missouri'       => 'MO',
        'Montana'        => 'MT',
        'Nebraska'       => 'NE',
        'Nevada'         => 'NV',
        'New Hampshire'  => 'NH',
        'New Jersey'     => 'NJ',
        'New Mexico'     => 'NM',
        'New York'       => 'NY',
        'North Carolina' => 'NC',
        'North Dakota'   => 'ND',
        'Ohio'           => 'OH',
        'Oklahoma'       => 'OK',
        'Oregon'         => 'OR',
        'Pennsylvania'   => 'PA',
        'Rhode Island'   => 'RI',
        'South Carolina' => 'SC',
        'South Dakota'   => 'SD',
        'Tennessee'      => 'TN',
        'Texas'          => 'TX',
        'Utah'           => 'UT',
        'Vermont'        => 'VT',
        'Virginia'       => 'VA',
        'Washington'     => 'WA',
        'West Virginia'  => 'WV',
        'Wisconsin'      => 'WI',
        'Wyoming'        => 'WY',
    ];

    public function __construct($items = [])
    {
        $this->items = $this->getArrayableItems($items);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function keys()
    {
        return collect(array_keys($this->items));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function values()
    {
        return collect(array_values($this->items));
    }

    public function toArray(): array {

    }

    public function find(string $key): string
    {

    }
}
