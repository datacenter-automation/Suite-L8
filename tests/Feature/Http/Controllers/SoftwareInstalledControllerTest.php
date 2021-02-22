<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SoftwareInstalledController;
use App\Http\Requests\SoftwareInstalledStoreRequest;
use App\Http\Requests\SoftwareInstalledUpdateRequest;
use App\Models\Machine;
use App\Models\Software;
use App\Models\SoftwareInstalled;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SoftwareInstalledController
 */
class SoftwareInstalledControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $softwareInstalleds = SoftwareInstalled::factory()->count(3)->create();

        $response = $this->get(route('software-installed.index'));

        $response->assertOk();
        $response->assertViewIs('softwareInstalled.index');
        $response->assertViewHas('softwareInstalleds');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('software-installed.create'));

        $response->assertOk();
        $response->assertViewIs('softwareInstalled.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareInstalledController::class, 'store', SoftwareInstalledStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $software = Software::factory()->create();
        $machine = Machine::factory()->create();

        $response = $this->post(route('software-installed.store'), [
            'software_id' => $software->id,
            'machine_id'  => $machine->id,
        ]);

        $softwareInstalleds = SoftwareInstalled::query()->where('software_id', $software->id)->where('machine_id', $machine->id)->get();
        $this->assertCount(1, $softwareInstalleds);
        $softwareInstalled = $softwareInstalleds->first();

        $response->assertRedirect(route('softwareInstalled.index'));
        $response->assertSessionHas('softwareInstalled.id', $softwareInstalled->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $softwareInstalled = SoftwareInstalled::factory()->create();

        $response = $this->get(route('software-installed.show', $softwareInstalled));

        $response->assertOk();
        $response->assertViewIs('softwareInstalled.show');
        $response->assertViewHas('softwareInstalled');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $softwareInstalled = SoftwareInstalled::factory()->create();

        $response = $this->get(route('software-installed.edit', $softwareInstalled));

        $response->assertOk();
        $response->assertViewIs('softwareInstalled.edit');
        $response->assertViewHas('softwareInstalled');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareInstalledController::class, 'update', SoftwareInstalledUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $softwareInstalled = SoftwareInstalled::factory()->create();
        $software = Software::factory()->create();
        $machine = Machine::factory()->create();

        $response = $this->put(route('software-installed.update', $softwareInstalled), [
            'software_id' => $software->id,
            'machine_id'  => $machine->id,
        ]);

        $softwareInstalled->refresh();

        $response->assertRedirect(route('softwareInstalled.index'));
        $response->assertSessionHas('softwareInstalled.id', $softwareInstalled->id);

        $this->assertEquals($software->id, $softwareInstalled->software_id);
        $this->assertEquals($machine->id, $softwareInstalled->machine_id);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $softwareInstalled = SoftwareInstalled::factory()->create();

        $response = $this->delete(route('software-installed.destroy', $softwareInstalled));

        $response->assertRedirect(route('softwareInstalled.index'));

        $this->assertSoftDeleted($softwareInstalled);
    }
}
