<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MachineLogController;
use App\Http\Requests\MachineLogStoreRequest;
use App\Http\Requests\MachineLogUpdateRequest;
use App\Models\Machine;
use App\Models\MachineLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MachineLogController
 */
class MachineLogControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $machineLogs = MachineLog::factory()->count(3)->create();

        $response = $this->get(route('machine-log.index'));

        $response->assertOk();
        $response->assertViewIs('machineLog.index');
        $response->assertViewHas('machineLogs');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('machine-log.create'));

        $response->assertOk();
        $response->assertViewIs('machineLog.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineLogController::class, 'store', MachineLogStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $machine = Machine::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->post(route('machine-log.store'), [
            'machine_id' => $machine->id,
            'user_id'    => $user->id,
            'content'    => $content,
        ]);

        $machineLogs = MachineLog::query()->where('machine_id', $machine->id)->where('user_id', $user->id)->where('content', $content)->get();
        $this->assertCount(1, $machineLogs);
        $machineLog = $machineLogs->first();

        $response->assertRedirect(route('machineLog.index'));
        $response->assertSessionHas('machineLog.id', $machineLog->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $machineLog = MachineLog::factory()->create();

        $response = $this->get(route('machine-log.show', $machineLog));

        $response->assertOk();
        $response->assertViewIs('machineLog.show');
        $response->assertViewHas('machineLog');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $machineLog = MachineLog::factory()->create();

        $response = $this->get(route('machine-log.edit', $machineLog));

        $response->assertOk();
        $response->assertViewIs('machineLog.edit');
        $response->assertViewHas('machineLog');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineLogController::class, 'update', MachineLogUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $machineLog = MachineLog::factory()->create();
        $machine = Machine::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->put(route('machine-log.update', $machineLog), [
            'machine_id' => $machine->id,
            'user_id'    => $user->id,
            'content'    => $content,
        ]);

        $machineLog->refresh();

        $response->assertRedirect(route('machineLog.index'));
        $response->assertSessionHas('machineLog.id', $machineLog->id);

        $this->assertEquals($machine->id, $machineLog->machine_id);
        $this->assertEquals($user->id, $machineLog->user_id);
        $this->assertEquals($content, $machineLog->content);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $machineLog = MachineLog::factory()->create();

        $response = $this->delete(route('machine-log.destroy', $machineLog));

        $response->assertRedirect(route('machineLog.index'));

        $this->assertSoftDeleted($machineLog);
    }
}
