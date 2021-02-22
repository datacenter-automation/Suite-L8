<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Location */
class LocationResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                   => $this->id,
            'group_id'             => $this->group_id,
            'location_name'        => $this->location_name,
            'location_description' => $this->location_description,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
            'deleted_at'           => $this->deleted_at,
        ];
    }
}
