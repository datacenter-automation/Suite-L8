<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MachineController;
use App\Http\Requests\MachineStoreRequest;
use App\Http\Requests\MachineUpdateRequest;
use App\Models\Machine;
use App\Models\MachineType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MachineController
 */
class MachineControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $machines = Machine::factory()->count(3)->create();

        $response = $this->get(route('machine.index'));

        $response->assertOk();
        $response->assertViewIs('machine.index');
        $response->assertViewHas('machines');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('machine.create'));

        $response->assertOk();
        $response->assertViewIs('machine.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineController::class, 'store', MachineStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $machine_type = MachineType::factory()->create();
        $name = $this->faker->name;

        $response = $this->post(route('machine.store'), [
            'machine_type_id' => $machine_type->id,
            'name'            => $name,
        ]);

        $machines = Machine::query()->where('machine_type_id', $machine_type->id)->where('name', $name)->get();
        $this->assertCount(1, $machines);
        $machine = $machines->first();

        $response->assertRedirect(route('machine.index'));
        $response->assertSessionHas('machine.id', $machine->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $machine = Machine::factory()->create();

        $response = $this->get(route('machine.show', $machine));

        $response->assertOk();
        $response->assertViewIs('machine.show');
        $response->assertViewHas('machine');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $machine = Machine::factory()->create();

        $response = $this->get(route('machine.edit', $machine));

        $response->assertOk();
        $response->assertViewIs('machine.edit');
        $response->assertViewHas('machine');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineController::class, 'update', MachineUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $machine = Machine::factory()->create();
        $machine_type = MachineType::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('machine.update', $machine), [
            'machine_type_id' => $machine_type->id,
            'name'            => $name,
        ]);

        $machine->refresh();

        $response->assertRedirect(route('machine.index'));
        $response->assertSessionHas('machine.id', $machine->id);

        $this->assertEquals($machine_type->id, $machine->machine_type_id);
        $this->assertEquals($name, $machine->name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $machine = Machine::factory()->create();

        $response = $this->delete(route('machine.destroy', $machine));

        $response->assertRedirect(route('machine.index'));

        $this->assertSoftDeleted($machine);
    }
}
