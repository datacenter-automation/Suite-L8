<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MachineNoteController;
use App\Http\Requests\MachineNoteStoreRequest;
use App\Http\Requests\MachineNoteUpdateRequest;
use App\Models\Machine;
use App\Models\MachineNote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MachineNoteController
 */
class MachineNoteControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $machineNotes = MachineNote::factory()->count(3)->create();

        $response = $this->get(route('machine-note.index'));

        $response->assertOk();
        $response->assertViewIs('machineNote.index');
        $response->assertViewHas('machineNotes');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('machine-note.create'));

        $response->assertOk();
        $response->assertViewIs('machineNote.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineNoteController::class, 'store', MachineNoteStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $machine = Machine::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->post(route('machine-note.store'), [
            'machine_id' => $machine->id,
            'content'    => $content,
        ]);

        $machineNotes = MachineNote::query()->where('machine_id', $machine->id)->where('content', $content)->get();
        $this->assertCount(1, $machineNotes);
        $machineNote = $machineNotes->first();

        $response->assertRedirect(route('machineNote.index'));
        $response->assertSessionHas('machineNote.id', $machineNote->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $machineNote = MachineNote::factory()->create();

        $response = $this->get(route('machine-note.show', $machineNote));

        $response->assertOk();
        $response->assertViewIs('machineNote.show');
        $response->assertViewHas('machineNote');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $machineNote = MachineNote::factory()->create();

        $response = $this->get(route('machine-note.edit', $machineNote));

        $response->assertOk();
        $response->assertViewIs('machineNote.edit');
        $response->assertViewHas('machineNote');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineNoteController::class, 'update', MachineNoteUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $machineNote = MachineNote::factory()->create();
        $machine = Machine::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->put(route('machine-note.update', $machineNote), [
            'machine_id' => $machine->id,
            'content'    => $content,
        ]);

        $machineNote->refresh();

        $response->assertRedirect(route('machineNote.index'));
        $response->assertSessionHas('machineNote.id', $machineNote->id);

        $this->assertEquals($machine->id, $machineNote->machine_id);
        $this->assertEquals($content, $machineNote->content);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $machineNote = MachineNote::factory()->create();

        $response = $this->delete(route('machine-note.destroy', $machineNote));

        $response->assertRedirect(route('machineNote.index'));

        $this->assertSoftDeleted($machineNote);
    }
}
