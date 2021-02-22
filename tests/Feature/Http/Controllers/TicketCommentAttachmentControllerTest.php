<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketCommentAttachmentController;
use App\Http\Requests\TicketCommentAttachmentStoreRequest;
use App\Http\Requests\TicketCommentAttachmentUpdateRequest;
use App\Models\TicketComment;
use App\Models\TicketCommentAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketCommentAttachmentController
 */
class TicketCommentAttachmentControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketCommentAttachments = TicketCommentAttachment::factory()->count(3)->create();

        $response = $this->get(route('ticket-comment-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('ticketCommentAttachment.index');
        $response->assertViewHas('ticketCommentAttachments');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-comment-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('ticketCommentAttachment.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketCommentAttachmentController::class, 'store', TicketCommentAttachmentStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket_comment = TicketComment::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->post(route('ticket-comment-attachment.store'), [
            'ticket_comment_id' => $ticket_comment->id,
            'file_name'         => $file_name,
        ]);

        $ticketCommentAttachments = TicketCommentAttachment::query()->where('ticket_comment_id', $ticket_comment->id)->where('file_name', $file_name)->get();
        $this->assertCount(1, $ticketCommentAttachments);
        $ticketCommentAttachment = $ticketCommentAttachments->first();

        $response->assertRedirect(route('ticketCommentAttachment.index'));
        $response->assertSessionHas('ticketCommentAttachment.id', $ticketCommentAttachment->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketCommentAttachment = TicketCommentAttachment::factory()->create();

        $response = $this->get(route('ticket-comment-attachment.show', $ticketCommentAttachment));

        $response->assertOk();
        $response->assertViewIs('ticketCommentAttachment.show');
        $response->assertViewHas('ticketCommentAttachment');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketCommentAttachment = TicketCommentAttachment::factory()->create();

        $response = $this->get(route('ticket-comment-attachment.edit', $ticketCommentAttachment));

        $response->assertOk();
        $response->assertViewIs('ticketCommentAttachment.edit');
        $response->assertViewHas('ticketCommentAttachment');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketCommentAttachmentController::class, 'update', TicketCommentAttachmentUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketCommentAttachment = TicketCommentAttachment::factory()->create();
        $ticket_comment = TicketComment::factory()->create();
        $file_name = $this->faker->word;

        $response = $this->put(route('ticket-comment-attachment.update', $ticketCommentAttachment), [
            'ticket_comment_id' => $ticket_comment->id,
            'file_name'         => $file_name,
        ]);

        $ticketCommentAttachment->refresh();

        $response->assertRedirect(route('ticketCommentAttachment.index'));
        $response->assertSessionHas('ticketCommentAttachment.id', $ticketCommentAttachment->id);

        $this->assertEquals($ticket_comment->id, $ticketCommentAttachment->ticket_comment_id);
        $this->assertEquals($file_name, $ticketCommentAttachment->file_name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketCommentAttachment = TicketCommentAttachment::factory()->create();

        $response = $this->delete(route('ticket-comment-attachment.destroy', $ticketCommentAttachment));

        $response->assertRedirect(route('ticketCommentAttachment.index'));

        $this->assertDeleted($ticketCommentAttachment);
    }
}
