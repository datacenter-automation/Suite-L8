<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\LocationController;
use App\Http\Requests\LocationStoreRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LocationController
 */
class LocationControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $locations = Location::factory()->count(3)->create();

        $response = $this->get(route('location.index'));

        $response->assertOk();
        $response->assertViewIs('location.index');
        $response->assertViewHas('locations');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('location.create'));

        $response->assertOk();
        $response->assertViewIs('location.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(LocationController::class, 'store', LocationStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('location.store'), [
            'name' => $name,
        ]);

        $locations = Location::query()->where('name', $name)->get();
        $this->assertCount(1, $locations);
        $location = $locations->first();

        $response->assertRedirect(route('location.index'));
        $response->assertSessionHas('location.id', $location->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $location = Location::factory()->create();

        $response = $this->get(route('location.show', $location));

        $response->assertOk();
        $response->assertViewIs('location.show');
        $response->assertViewHas('location');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $location = Location::factory()->create();

        $response = $this->get(route('location.edit', $location));

        $response->assertOk();
        $response->assertViewIs('location.edit');
        $response->assertViewHas('location');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(LocationController::class, 'update', LocationUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $location = Location::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('location.update', $location), [
            'name' => $name,
        ]);

        $location->refresh();

        $response->assertRedirect(route('location.index'));
        $response->assertSessionHas('location.id', $location->id);

        $this->assertEquals($name, $location->name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $location = Location::factory()->create();

        $response = $this->delete(route('location.destroy', $location));

        $response->assertRedirect(route('location.index'));

        $this->assertSoftDeleted($location);
    }
}
