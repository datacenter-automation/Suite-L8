<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MachineTypeController;
use App\Http\Requests\MachineTypeStoreRequest;
use App\Http\Requests\MachineTypeUpdateRequest;
use App\Models\MachineType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MachineTypeController
 */
class MachineTypeControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $machineTypes = MachineType::factory()->count(3)->create();

        $response = $this->get(route('machine-type.index'));

        $response->assertOk();
        $response->assertViewIs('machineType.index');
        $response->assertViewHas('machineTypes');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('machine-type.create'));

        $response->assertOk();
        $response->assertViewIs('machineType.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineTypeController::class, 'store', MachineTypeStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('machine-type.store'), [
            'name' => $name,
        ]);

        $machineTypes = MachineType::query()->where('name', $name)->get();
        $this->assertCount(1, $machineTypes);
        $machineType = $machineTypes->first();

        $response->assertRedirect(route('machineType.index'));
        $response->assertSessionHas('machineType.id', $machineType->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $machineType = MachineType::factory()->create();

        $response = $this->get(route('machine-type.show', $machineType));

        $response->assertOk();
        $response->assertViewIs('machineType.show');
        $response->assertViewHas('machineType');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $machineType = MachineType::factory()->create();

        $response = $this->get(route('machine-type.edit', $machineType));

        $response->assertOk();
        $response->assertViewIs('machineType.edit');
        $response->assertViewHas('machineType');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineTypeController::class, 'update', MachineTypeUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $machineType = MachineType::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('machine-type.update', $machineType), [
            'name' => $name,
        ]);

        $machineType->refresh();

        $response->assertRedirect(route('machineType.index'));
        $response->assertSessionHas('machineType.id', $machineType->id);

        $this->assertEquals($name, $machineType->name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $machineType = MachineType::factory()->create();

        $response = $this->delete(route('machine-type.destroy', $machineType));

        $response->assertRedirect(route('machineType.index'));

        $this->assertSoftDeleted($machineType);
    }
}
