<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketAttachmentController;
use App\Http\Requests\TicketAttachmentStoreRequest;
use App\Http\Requests\TicketAttachmentUpdateRequest;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketAttachmentController
 */
class TicketAttachmentControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketAttachments = TicketAttachment::factory()->count(3)->create();

        $response = $this->get(route('ticket-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('ticketAttachment.index');
        $response->assertViewHas('ticketAttachments');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('ticketAttachment.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketAttachmentController::class, 'store', TicketAttachmentStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->post(route('ticket-attachment.store'), [
            'ticket_id' => $ticket->id,
            'file_name' => $file_name,
        ]);

        $ticketAttachments = TicketAttachment::query()->where('ticket_id', $ticket->id)->where('file_name', $file_name)->get();
        $this->assertCount(1, $ticketAttachments);
        $ticketAttachment = $ticketAttachments->first();

        $response->assertRedirect(route('ticketAttachment.index'));
        $response->assertSessionHas('ticketAttachment.id', $ticketAttachment->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketAttachment = TicketAttachment::factory()->create();

        $response = $this->get(route('ticket-attachment.show', $ticketAttachment));

        $response->assertOk();
        $response->assertViewIs('ticketAttachment.show');
        $response->assertViewHas('ticketAttachment');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketAttachment = TicketAttachment::factory()->create();

        $response = $this->get(route('ticket-attachment.edit', $ticketAttachment));

        $response->assertOk();
        $response->assertViewIs('ticketAttachment.edit');
        $response->assertViewHas('ticketAttachment');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketAttachmentController::class, 'update', TicketAttachmentUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketAttachment = TicketAttachment::factory()->create();
        $ticket = Ticket::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->put(route('ticket-attachment.update', $ticketAttachment), [
            'ticket_id' => $ticket->id,
            'file_name' => $file_name,
        ]);

        $ticketAttachment->refresh();

        $response->assertRedirect(route('ticketAttachment.index'));
        $response->assertSessionHas('ticketAttachment.id', $ticketAttachment->id);

        $this->assertEquals($ticket->id, $ticketAttachment->ticket_id);
        $this->assertEquals($file_name, $ticketAttachment->file_name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketAttachment = TicketAttachment::factory()->create();

        $response = $this->delete(route('ticket-attachment.destroy', $ticketAttachment));

        $response->assertRedirect(route('ticketAttachment.index'));

        $this->assertDeleted($ticketAttachment);
    }
}
