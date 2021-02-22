<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'username'                  => $this->username,
            'email'                     => $this->email,
            'email_verified_at'         => $this->email_verified_at,
            'salt'                      => $this->salt,
            'password'                  => $this->password,
            'register_ip'               => $this->register_ip,
            'forget_token'              => $this->forget_token,
            'active_token'              => $this->active_token,
            'remember_token'            => $this->remember_token,
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
            'stripe_id'                 => $this->stripe_id,
            'card_brand'                => $this->card_brand,
            'card_last_four'            => $this->card_last_four,
            'trial_ends_at'             => $this->trial_ends_at,
            'notifications'             => $this->notifications,
            'notifications_count'       => $this->notifications_count,
            'permissions'               => $this->permissions,
            'permissions_count'         => $this->permissions_count,
            'roles'                     => $this->roles,
            'roles_count'               => $this->roles_count,
            'subscriptions'             => $this->subscriptions,
            'subscriptions_count'       => $this->subscriptions_count,
            'tickets'                   => $this->tickets,
            'tickets_count'             => $this->tickets_count,
            'two_factor_secret'         => $this->two_factor_secret,
            'two_factor_recovery_codes' => $this->two_factor_recovery_codes,

            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
        ];
    }
}
