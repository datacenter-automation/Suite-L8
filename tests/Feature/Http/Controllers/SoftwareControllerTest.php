<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SoftwareController;
use App\Http\Requests\SoftwareStoreRequest;
use App\Http\Requests\SoftwareUpdateRequest;
use App\Models\Software;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SoftwareController
 */
class SoftwareControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $software = Software::factory()->count(3)->create();

        $response = $this->get(route('software.index'));

        $response->assertOk();
        $response->assertViewIs('software.index');
        $response->assertViewHas('software');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('software.create'));

        $response->assertOk();
        $response->assertViewIs('software.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareController::class, 'store', SoftwareStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $key = $this->faker->text;

        $response = $this->post(route('software.store'), [
            'name' => $name,
            'key'  => $key,
        ]);

        $software = Software::query()->where('name', $name)->where('key', $key)->get();
        $this->assertCount(1, $software);
        $software = $software->first();

        $response->assertRedirect(route('software.index'));
        $response->assertSessionHas('software.id', $software->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $software = Software::factory()->create();

        $response = $this->get(route('software.show', $software));

        $response->assertOk();
        $response->assertViewIs('software.show');
        $response->assertViewHas('software');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $software = Software::factory()->create();

        $response = $this->get(route('software.edit', $software));

        $response->assertOk();
        $response->assertViewIs('software.edit');
        $response->assertViewHas('software');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareController::class, 'update', SoftwareUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $software = Software::factory()->create();
        $name = $this->faker->name;
        $key = $this->faker->text;

        $response = $this->put(route('software.update', $software), [
            'name' => $name,
            'key'  => $key,
        ]);

        $software->refresh();

        $response->assertRedirect(route('software.index'));
        $response->assertSessionHas('software.id', $software->id);

        $this->assertEquals($name, $software->name);
        $this->assertEquals($key, $software->key);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $software = Software::factory()->create();

        $response = $this->delete(route('software.destroy', $software));

        $response->assertRedirect(route('software.index'));

        $this->assertSoftDeleted($software);
    }
}
