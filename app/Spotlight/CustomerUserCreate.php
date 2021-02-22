<?php

namespace App\Spotlight;

use App\Models\User;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;

class CustomerUserCreate extends SpotlightCommand
{

    protected string $name = 'Create customer user';

    protected string $description = 'Create a new customer user';

    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()->add(SpotlightCommandDependency::make('name')->setPlaceholder('How do you want to name this user?')->setType(SpotlightCommandDependency::INPUT))->add(SpotlightCommandDependency::make('email')->setPlaceholder('What is the user\'s email?')->setType(SpotlightCommandDependency::INPUT))->add(SpotlightCommandDependency::make('password')->setPlaceholder('What is the user\'s password?')->setType(SpotlightCommandDependency::INPUT));
    }

    public function execute(Spotlight $spotlight, string $name, string $email, string $password)
    {
        User::forceCreate($user = [
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
        ]);

        $spotlight->emit('created-customer-user', $user);
        $spotlight->redirect('/');
    }
}
