<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;

/**
 * Class UpdateDocumentationFromGitHub
 *
 * @package App\Console\Commands
 *
 * @todo Finish this command.
 *
 * @see https://beyondco.de/blog/automated-documentation-deployment-laravel-webhooks
 */
class UpdateDocumentationFromGitHub extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // clone the GitHub repository into the temporary directory
        $process = new Process(
            [
                'git',
                'clone',
                'git@github.com:' . $this->argument('repository') . '.git'
            ],
            $this->commandStorage);

        $process->run();

        $this->commandFolder = "/tmp/" . uniqid("tmp_");
        $this->commandStorage = storage_path("app" . $this->commandFolder);

        File::makeDirectory($this->commandStorage);

        $assumedDocsFolder = $repositoryFolder . "/docs";

        $repositoryDirectories = collect(Storage::directories($repositoryFolder));

        if (!$repositoryDirectories->contains(Str::substr($assumedDocsFolder, 1))) {
            throw new \Exception("docs folder not detected");
        }

        $copyDocsTo = resource_path('views/docs/' . $this->getDocsFolderName());
        $this->comment('📑 Moving documents into resource storage ' . $copyDocsTo);
        File::copyDirectory($localRepositoryDocsFolder, $copyDocsTo);

        return storage_path("app" . $assumedDocsFolder);
    }
}
