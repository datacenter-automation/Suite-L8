<?php

namespace App\Jobs;

use App\Console\Commands\UpdateDocumentationFromGitHub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class UpdateDocumentationJob implements ShouldQueue
{

    use Dispatchable, Queueable;

    /**
     * UpdateDocumentationJob constructor.
     *
     * @param string $repository
     */
    public function __construct(private string $repository)
    {
        //
    }

    public function handle()
    {
        Artisan::call(UpdateDocumentationFromGitHub::class, ["repository" => $this->repository]);
    }
}
