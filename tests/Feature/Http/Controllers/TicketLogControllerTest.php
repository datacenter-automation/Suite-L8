<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketLogController;
use App\Http\Requests\TicketLogStoreRequest;
use App\Http\Requests\TicketLogUpdateRequest;
use App\Models\Ticket;
use App\Models\TicketLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketLogController
 */
class TicketLogControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketLogs = TicketLog::factory()->count(3)->create();

        $response = $this->get(route('ticket-log.index'));

        $response->assertOk();
        $response->assertViewIs('ticketLog.index');
        $response->assertViewHas('ticketLogs');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-log.create'));

        $response->assertOk();
        $response->assertViewIs('ticketLog.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketLogController::class, 'store', TicketLogStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->post(route('ticket-log.store'), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'content'   => $content,
        ]);

        $ticketLogs = TicketLog::query()->where('ticket_id', $ticket->id)->where('user_id', $user->id)->where('content', $content)->get();
        $this->assertCount(1, $ticketLogs);
        $ticketLog = $ticketLogs->first();

        $response->assertRedirect(route('ticketLog.index'));
        $response->assertSessionHas('ticketLog.id', $ticketLog->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketLog = TicketLog::factory()->create();

        $response = $this->get(route('ticket-log.show', $ticketLog));

        $response->assertOk();
        $response->assertViewIs('ticketLog.show');
        $response->assertViewHas('ticketLog');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketLog = TicketLog::factory()->create();

        $response = $this->get(route('ticket-log.edit', $ticketLog));

        $response->assertOk();
        $response->assertViewIs('ticketLog.edit');
        $response->assertViewHas('ticketLog');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketLogController::class, 'update', TicketLogUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketLog = TicketLog::factory()->create();
        $ticket = Ticket::factory()->create();
        $user = User::factory()->create();
        $content = $this->faker->paragraphs(3, true);

        $response = $this->put(route('ticket-log.update', $ticketLog), [
            'ticket_id' => $ticket->id,
            'user_id'   => $user->id,
            'content'   => $content,
        ]);

        $ticketLog->refresh();

        $response->assertRedirect(route('ticketLog.index'));
        $response->assertSessionHas('ticketLog.id', $ticketLog->id);

        $this->assertEquals($ticket->id, $ticketLog->ticket_id);
        $this->assertEquals($user->id, $ticketLog->user_id);
        $this->assertEquals($content, $ticketLog->content);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketLog = TicketLog::factory()->create();

        $response = $this->delete(route('ticket-log.destroy', $ticketLog));

        $response->assertRedirect(route('ticketLog.index'));

        $this->assertSoftDeleted($ticketLog);
    }
}
