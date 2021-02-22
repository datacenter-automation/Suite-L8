<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AuthLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AuthLogController
 */
class AuthLogControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $authLogs = AuthLog::factory()->count(3)->create();

        $response = $this->get(route('auth-log.index'));

        $response->assertOk();
        $response->assertViewIs('authLog.index');
        $response->assertViewHas('authLogs');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('auth-log.create'));

        $response->assertOk();
        $response->assertViewIs('authLog.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\AuthLogController::class, 'store', \App\Http\Requests\AuthLogStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $killed_from_console = $this->faker->boolean;

        $response = $this->post(route('auth-log.store'), [
            'user_id'             => $user->id,
            'killed_from_console' => $killed_from_console,
        ]);

        $authLogs = AuthLog::query()->where('user_id', $user->id)->where('killed_from_console', $killed_from_console)->get();
        $this->assertCount(1, $authLogs);
        $authLog = $authLogs->first();

        $response->assertRedirect(route('authLog.index'));
        $response->assertSessionHas('authLog.id', $authLog->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $authLog = AuthLog::factory()->create();

        $response = $this->get(route('auth-log.show', $authLog));

        $response->assertOk();
        $response->assertViewIs('authLog.show');
        $response->assertViewHas('authLog');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $authLog = AuthLog::factory()->create();

        $response = $this->get(route('auth-log.edit', $authLog));

        $response->assertOk();
        $response->assertViewIs('authLog.edit');
        $response->assertViewHas('authLog');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\AuthLogController::class, 'update', \App\Http\Requests\AuthLogUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $authLog = AuthLog::factory()->create();
        $user = User::factory()->create();
        $killed_from_console = $this->faker->boolean;

        $response = $this->put(route('auth-log.update', $authLog), [
            'user_id'             => $user->id,
            'killed_from_console' => $killed_from_console,
        ]);

        $authLog->refresh();

        $response->assertRedirect(route('authLog.index'));
        $response->assertSessionHas('authLog.id', $authLog->id);

        $this->assertEquals($user->id, $authLog->user_id);
        $this->assertEquals($killed_from_console, $authLog->killed_from_console);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $authLog = AuthLog::factory()->create();

        $response = $this->delete(route('auth-log.destroy', $authLog));

        $response->assertRedirect(route('authLog.index'));

        $this->assertDeleted($authLog);
    }
}
