<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MachineNoteAttachmentController;
use App\Http\Requests\MachineNoteAttachmentStoreRequest;
use App\Http\Requests\MachineNoteAttachmentUpdateRequest;
use App\Models\MachineNote;
use App\Models\MachineNoteAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MachineNoteAttachmentController
 */
class MachineNoteAttachmentControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $machineNoteAttachments = MachineNoteAttachment::factory()->count(3)->create();

        $response = $this->get(route('machine-note-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('machineNoteAttachment.index');
        $response->assertViewHas('machineNoteAttachments');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('machine-note-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('machineNoteAttachment.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineNoteAttachmentController::class, 'store', MachineNoteAttachmentStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $machine_note = MachineNote::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->post(route('machine-note-attachment.store'), [
            'machine_note_id' => $machine_note->id,
            'file_name'       => $file_name,
        ]);

        $machineNoteAttachments = MachineNoteAttachment::query()->where('machine_note_id', $machine_note->id)->where('file_name', $file_name)->get();
        $this->assertCount(1, $machineNoteAttachments);
        $machineNoteAttachment = $machineNoteAttachments->first();

        $response->assertRedirect(route('machineNoteAttachment.index'));
        $response->assertSessionHas('machineNoteAttachment.id', $machineNoteAttachment->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $machineNoteAttachment = MachineNoteAttachment::factory()->create();

        $response = $this->get(route('machine-note-attachment.show', $machineNoteAttachment));

        $response->assertOk();
        $response->assertViewIs('machineNoteAttachment.show');
        $response->assertViewHas('machineNoteAttachment');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $machineNoteAttachment = MachineNoteAttachment::factory()->create();

        $response = $this->get(route('machine-note-attachment.edit', $machineNoteAttachment));

        $response->assertOk();
        $response->assertViewIs('machineNoteAttachment.edit');
        $response->assertViewHas('machineNoteAttachment');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(MachineNoteAttachmentController::class, 'update', MachineNoteAttachmentUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $machineNoteAttachment = MachineNoteAttachment::factory()->create();
        $machine_note = MachineNote::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->put(route('machine-note-attachment.update', $machineNoteAttachment), [
            'machine_note_id' => $machine_note->id,
            'file_name'       => $file_name,
        ]);

        $machineNoteAttachment->refresh();

        $response->assertRedirect(route('machineNoteAttachment.index'));
        $response->assertSessionHas('machineNoteAttachment.id', $machineNoteAttachment->id);

        $this->assertEquals($machine_note->id, $machineNoteAttachment->machine_note_id);
        $this->assertEquals($file_name, $machineNoteAttachment->file_name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $machineNoteAttachment = MachineNoteAttachment::factory()->create();

        $response = $this->delete(route('machine-note-attachment.destroy', $machineNoteAttachment));

        $response->assertRedirect(route('machineNoteAttachment.index'));

        $this->assertDeleted($machineNoteAttachment);
    }
}
