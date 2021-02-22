<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketController;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\TicketStatus as Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketController
 */
class TicketControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $tickets = Ticket::factory()->count(3)->create();

        $response = $this->get(route('ticket.index'));

        $response->assertOk();
        $response->assertViewIs('ticket.index');
        $response->assertViewHas('tickets');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket.create'));

        $response->assertOk();
        $response->assertViewIs('ticket.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketController::class, 'store', TicketStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $status = Status::factory()->create();
        $content = $this->faker->paragraphs(3, true);
        $read = $this->faker->numberBetween(- 8, 8);

        $response = $this->post(route('ticket.store'), [
            'user_id'   => $user->id,
            'status_id' => $status->id,
            'content'   => $content,
            'read'      => $read,
        ]);

        $tickets = Ticket::query()->where('user_id', $user->id)->where('status_id', $status->id)->where('content', $content)->where('read', $read)->get();
        $this->assertCount(1, $tickets);
        $ticket = $tickets->first();

        $response->assertRedirect(route('ticket.index'));
        $response->assertSessionHas('ticket.id', $ticket->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('ticket.show', $ticket));

        $response->assertOk();
        $response->assertViewIs('ticket.show');
        $response->assertViewHas('ticket');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('ticket.edit', $ticket));

        $response->assertOk();
        $response->assertViewIs('ticket.edit');
        $response->assertViewHas('ticket');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketController::class, 'update', TicketUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();
        $status = Status::factory()->create();
        $content = $this->faker->paragraphs(3, true);
        $read = $this->faker->numberBetween(- 8, 8);

        $response = $this->put(route('ticket.update', $ticket), [
            'user_id'   => $user->id,
            'status_id' => $status->id,
            'content'   => $content,
            'read'      => $read,
        ]);

        $ticket->refresh();

        $response->assertRedirect(route('ticket.index'));
        $response->assertSessionHas('ticket.id', $ticket->id);

        $this->assertEquals($user->id, $ticket->user_id);
        $this->assertEquals($status->id, $ticket->status_id);
        $this->assertEquals($content, $ticket->content);
        $this->assertEquals($read, $ticket->read);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();

        $response = $this->delete(route('ticket.destroy', $ticket));

        $response->assertRedirect(route('ticket.index'));

        $this->assertSoftDeleted($ticket);
    }
}
