<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Ticket */
class TicketResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'ticket_content' => $this->ticket_content,
            'ticket_read'    => $this->ticket_read,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
            'deleted_at'     => $this->deleted_at,
            'status'         => $this->status,
            'user'           => $this->user,

            'user_id'   => $this->user_id,
            'status_id' => $this->status_id,
        ];
    }
}
