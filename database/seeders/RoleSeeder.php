<?php

namespace Database\Seeders;

use Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    /**
     * Base permissions for roles.
     *
     * @uses create-user, read-user, delete-user.
     *
     * @var array|string[]
     */
    protected array $basePermissions = [
        'create',
        'read',
        'delete',
    ];

    /**
     * @var array
     */
    protected array $primePermList = [];

    /**
     * @var array
     */
    protected array $filteredTables = [];

    /**
     * @var int|void
     */
    protected int $tableCount;

    /**
     * RoleSeeder constructor.
     *
     * @throws \Doctrine\DBAL\Exception
     */
    public function __construct()
    {
        $this->filteredTables = $this->filteredTables();

        $this->tableCount = count($this->filteredTables());
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission($this->filteredTables()[0], ['list']);
        //$this->createPermission("create-user");
        //$this->createPermission("read-user");
        //$this->createPermission("edit-user");
        //$this->createPermission("delete-user");
        //$this->createPermission("lock-user");
        //$this->createPermission("unlock-user");
        //
        //$this->createPermission("create-location-groups");
        //$this->createPermission("read-location-groups");
        //$this->createPermission("edit-location-groups");
        //$this->createPermission("delete-location-groups");
        //
        //$this->createPermission("create-locations");
        //$this->createPermission("read-locations");
        //$this->createPermission("edit-locations");
        //$this->createPermission("delete-locations");
        //
        //$this->createPermission("archive-machine-log");
        //$this->createPermission("cycle-machine-log");
        //$this->createPermission("read-machine-log");
        //
        //$this->createPermission("create-machine-note-attachments");
        //$this->createPermission("lock-machine-note-attachments");
        //$this->createPermission("read-machine-note-attachments");
        //$this->createPermission("delete-machine-note-attachments");
        //
        //$this->createPermission("create-machine-notes");
        //$this->createPermission("read-machine-notes");
        //$this->createPermission("edit-machine-notes");
        //$this->createPermission("delete-machine-notes");
        //
        //$this->createPermission("create-machine-types");
        //$this->createPermission("read-machine-types");
        //$this->createPermission("edit-machine-types");
        //$this->createPermission("delete-machine-types");
        //
        //$this->createPermission("create-machine");
        //$this->createPermission("read-machine");
        //$this->createPermission("edit-machine");
        //$this->createPermission("delete-machine");
        //
        //$this->createPermission("create-software");
        //$this->createPermission("read-software");
        //$this->createPermission("edit-software");
        //$this->createPermission("delete-software");
        //$this->createPermission("archive-software");
        //$this->createPermission("unarchive-software");
        //
    }

    /**
     * Filtered tables.
     *
     * @return array
     * @throws \Doctrine\DBAL\Exception
     */
    function filteredTables(): array
    {
        return collect(DB::connection()->getDoctrineSchemaManager()->listTableNames())->map(function (
            $item
        ) {
            if (! in_array($item, array_combine($k = [
                'migrations',
                'cache',
                'failed_jobs',
                'jobs',
                'notifications',
                'password_resets',
                'sessions',
                'subscriptions',
                'subscription_items',
                'telescope_entries',
                'telescope_entries_tags',
                'telescope_monitoring',
                'permissions',
                'roles',
                'model_has_permissions',
                'model_has_roles',
                'role_has_permissions',
            ], $k))) {
                return $item;
            }
        })->filter(fn($value) => $value != null)->values()->all();
    }

    /**
     * \Artisan::call() helper.
     *
     * @param      $model
     * @param null $permissions
     *
     * @return int
     */
    function createPermission($model, $permissions = null): int
    {
        $perms = is_null($permissions) ? $this->basePermissions : Arr::flatten(array_merge([
            $permissions,
            $this->basePermissions,
        ]));

        foreach ($perms as $permission) {
            dump(['name' => $permission . '-' . $model]);
            //\Artisan::call(command: 'permission:create-permission', parameters: ['name' => $permission[$key] . '-' . $model]);
        }

        return 1;
    }
}
