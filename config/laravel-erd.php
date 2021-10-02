<?php

return [
    'url'         => 'erd',
    'middlewares' => [
        //Example
        //\App\Http\Middleware\NotFoundWhenProduction::class,
    ],
    'namespace'   => 'App\Models\\',
    'models_path' => base_path('app/Models'),
    'docs_path'   => base_path('docs/erd/'),

    "display" => [
        "show_data_type" => true,
    ],

    "from_text" => [
        "BelongsTo"     => "1..1\nBelongs To",
        "BelongsToMany" => "1..*\nBelongs To Many",
        "HasMany"       => "1..*\nHas Many",
        "HasOne"        => "1..1\nHas One",
        "ManyToMany"    => "*..*\nMany To Many",
        "ManyToOne"     => "*..1\nMany To One",
        "OneToMany"     => "1..*\nOne To Many",
        "OneToOne"      => "1..1\nOne To One",
        "MorphTo"       => "1..1\n",
        "MorphToMany"   => "1..*\n",
    ],
    "to_text"   => [
        "BelongsTo"     => "",
        "BelongsToMany" => "",
        "HasMany"       => "",
        "HasOne"        => "",
        "ManyToMany"    => "",
        "ManyToOne"     => "",
        "OneToMany"     => "",
        "OneToOne"      => "",
        "MorphTo"       => "",
        "MorphToMany"   => "",
    ],
];
