<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketWorkerController;
use App\Http\Requests\TicketWorkerStoreRequest;
use App\Http\Requests\TicketWorkerUpdateRequest;
use App\Models\Ticket;
use App\Models\TicketWorker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketWorkerController
 */
class TicketWorkerControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketWorkers = TicketWorker::factory()->count(3)->create();

        $response = $this->get(route('ticket-worker.index'));

        $response->assertOk();
        $response->assertViewIs('ticketWorker.index');
        $response->assertViewHas('ticketWorkers');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-worker.create'));

        $response->assertOk();
        $response->assertViewIs('ticketWorker.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketWorkerController::class, 'store', TicketWorkerStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();

        $response = $this->post(route('ticket-worker.store'), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
        ]);

        $ticketWorkers = TicketWorker::query()->where('ticket_id', $ticket->id)->where('user_id', $user->id)->get();
        $this->assertCount(1, $ticketWorkers);
        $ticketWorker = $ticketWorkers->first();

        $response->assertRedirect(route('ticketWorker.index'));
        $response->assertSessionHas('ticketWorker.id', $ticketWorker->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketWorker = TicketWorker::factory()->create();

        $response = $this->get(route('ticket-worker.show', $ticketWorker));

        $response->assertOk();
        $response->assertViewIs('ticketWorker.show');
        $response->assertViewHas('ticketWorker');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketWorker = TicketWorker::factory()->create();

        $response = $this->get(route('ticket-worker.edit', $ticketWorker));

        $response->assertOk();
        $response->assertViewIs('ticketWorker.edit');
        $response->assertViewHas('ticketWorker');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketWorkerController::class, 'update', TicketWorkerUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketWorker = TicketWorker::factory()->create();
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('ticket-worker.update', $ticketWorker), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
        ]);

        $ticketWorker->refresh();

        $response->assertRedirect(route('ticketWorker.index'));
        $response->assertSessionHas('ticketWorker.id', $ticketWorker->id);

        $this->assertEquals($ticket->id, $ticketWorker->ticket_id);
        $this->assertEquals($user->id, $ticketWorker->user_id);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketWorker = TicketWorker::factory()->create();

        $response = $this->delete(route('ticket-worker.destroy', $ticketWorker));

        $response->assertRedirect(route('ticketWorker.index'));

        $this->assertSoftDeleted($ticketWorker);
    }
}
