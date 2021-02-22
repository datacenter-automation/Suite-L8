<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\LocationGroupController;
use App\Http\Requests\LocationGroupStoreRequest;
use App\Http\Requests\LocationGroupUpdateRequest;
use App\Models\LocationGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LocationGroupController
 */
class LocationGroupControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $locationGroups = LocationGroup::factory()->count(3)->create();

        $response = $this->get(route('location-group.index'));

        $response->assertOk();
        $response->assertViewIs('locationGroup.index');
        $response->assertViewHas('locationGroups');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('location-group.create'));

        $response->assertOk();
        $response->assertViewIs('locationGroup.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(LocationGroupController::class, 'store', LocationGroupStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('location-group.store'), [
            'name' => $name,
        ]);

        $locationGroups = LocationGroup::query()->where('name', $name)->get();
        $this->assertCount(1, $locationGroups);
        $locationGroup = $locationGroups->first();

        $response->assertRedirect(route('locationGroup.index'));
        $response->assertSessionHas('locationGroup.id', $locationGroup->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $locationGroup = LocationGroup::factory()->create();

        $response = $this->get(route('location-group.show', $locationGroup));

        $response->assertOk();
        $response->assertViewIs('locationGroup.show');
        $response->assertViewHas('locationGroup');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $locationGroup = LocationGroup::factory()->create();

        $response = $this->get(route('location-group.edit', $locationGroup));

        $response->assertOk();
        $response->assertViewIs('locationGroup.edit');
        $response->assertViewHas('locationGroup');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(LocationGroupController::class, 'update', LocationGroupUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $locationGroup = LocationGroup::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('location-group.update', $locationGroup), [
            'name' => $name,
        ]);

        $locationGroup->refresh();

        $response->assertRedirect(route('locationGroup.index'));
        $response->assertSessionHas('locationGroup.id', $locationGroup->id);

        $this->assertEquals($name, $locationGroup->name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $locationGroup = LocationGroup::factory()->create();

        $response = $this->delete(route('location-group.destroy', $locationGroup));

        $response->assertRedirect(route('locationGroup.index'));

        $this->assertSoftDeleted($locationGroup);
    }
}
