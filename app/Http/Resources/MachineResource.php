<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Machine */
class MachineResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'type_id'      => $this->type_id,
            'location_id'  => $this->location_id,
            'user_id'      => $this->user_id,
            'machine_name' => $this->machine_name,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            'deleted_at'   => $this->deleted_at,
        ];
    }
}
