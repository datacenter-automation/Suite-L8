<?php
declare(strict_types=1);

use ElasticAdapter\Indices\Mapping;
use ElasticAdapter\Indices\Settings;
use ElasticMigrations\Facades\Index;
use ElasticMigrations\MigrationInterface;

final class CreateUserIndex implements MigrationInterface
{

    /**
     * Run the migration.
     */
    public function up(): void
    {
        Index::create('users-index', function (Mapping $mapping, Settings $settings) {
            $mapping->integer('id');
            $mapping->text('name');
            $mapping->text('username');
            $mapping->text('email');
            $mapping->date('email_verified_at');
            $mapping->text('api_token');
            $mapping->ip('register_ip');
            $mapping->text('active_token');
            $mapping->date('blocked_at');
            $mapping->binary('blocked');
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Index::dropIfExists('users-index');
    }
}
