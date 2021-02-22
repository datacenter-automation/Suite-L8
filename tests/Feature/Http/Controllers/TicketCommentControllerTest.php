<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketCommentController;
use App\Http\Requests\TicketCommentStoreRequest;
use App\Http\Requests\TicketCommentUpdateRequest;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketCommentController
 */
class TicketCommentControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketComments = TicketComment::factory()->count(3)->create();

        $response = $this->get(route('ticket-comment.index'));

        $response->assertOk();
        $response->assertViewIs('ticketComment.index');
        $response->assertViewHas('ticketComments');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-comment.create'));

        $response->assertOk();
        $response->assertViewIs('ticketComment.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketCommentController::class, 'store', TicketCommentStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->post(route('ticket-comment.store'), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'content'   => $content,
        ]);

        $ticketComments = TicketComment::query()->where('ticket_id', $ticket->id)->where('user_id', $user->id)->where('content', $content)->get();
        $this->assertCount(1, $ticketComments);
        $ticketComment = $ticketComments->first();

        $response->assertRedirect(route('ticketComment.index'));
        $response->assertSessionHas('ticketComment.id', $ticketComment->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketComment = TicketComment::factory()->create();

        $response = $this->get(route('ticket-comment.show', $ticketComment));

        $response->assertOk();
        $response->assertViewIs('ticketComment.show');
        $response->assertViewHas('ticketComment');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketComment = TicketComment::factory()->create();

        $response = $this->get(route('ticket-comment.edit', $ticketComment));

        $response->assertOk();
        $response->assertViewIs('ticketComment.edit');
        $response->assertViewHas('ticketComment');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketCommentController::class, 'update', TicketCommentUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketComment = TicketComment::factory()->create();
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->put(route('ticket-comment.update', $ticketComment), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'content'   => $content,
        ]);

        $ticketComment->refresh();

        $response->assertRedirect(route('ticketComment.index'));
        $response->assertSessionHas('ticketComment.id', $ticketComment->id);

        $this->assertEquals($ticket->id, $ticketComment->ticket_id);
        $this->assertEquals($user->id, $ticketComment->user_id);
        $this->assertEquals($content, $ticketComment->content);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketComment = TicketComment::factory()->create();

        $response = $this->delete(route('ticket-comment.destroy', $ticketComment));

        $response->assertRedirect(route('ticketComment.index'));

        $this->assertSoftDeleted($ticketComment);
    }
}
