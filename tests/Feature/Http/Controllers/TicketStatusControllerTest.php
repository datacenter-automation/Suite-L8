<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TicketStatusController;
use App\Http\Requests\TicketStatusStoreRequest;
use App\Http\Requests\TicketStatusUpdateRequest;
use App\Models\TicketStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketStatusController
 */
class TicketStatusControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ticketStatuses = TicketStatus::factory()->count(3)->create();

        $response = $this->get(route('ticket-status.index'));

        $response->assertOk();
        $response->assertViewIs('ticketStatus.index');
        $response->assertViewHas('ticketStatuses');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ticket-status.create'));

        $response->assertOk();
        $response->assertViewIs('ticketStatus.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketStatusController::class, 'store', TicketStatusStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $color = $this->faker->word;

        $response = $this->post(route('ticket-status.store'), [
            'name'  => $name,
            'color' => $color,
        ]);

        $ticketStatuses = TicketStatus::query()->where('name', $name)->where('color', $color)->get();
        $this->assertCount(1, $ticketStatuses);
        $ticketStatus = $ticketStatuses->first();

        $response->assertRedirect(route('ticketStatus.index'));
        $response->assertSessionHas('ticketStatus.id', $ticketStatus->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ticketStatus = TicketStatus::factory()->create();

        $response = $this->get(route('ticket-status.show', $ticketStatus));

        $response->assertOk();
        $response->assertViewIs('ticketStatus.show');
        $response->assertViewHas('ticketStatus');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ticketStatus = TicketStatus::factory()->create();

        $response = $this->get(route('ticket-status.edit', $ticketStatus));

        $response->assertOk();
        $response->assertViewIs('ticketStatus.edit');
        $response->assertViewHas('ticketStatus');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(TicketStatusController::class, 'update', TicketStatusUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ticketStatus = TicketStatus::factory()->create();
        $name = $this->faker->name;
        $color = $this->faker->word;

        $response = $this->put(route('ticket-status.update', $ticketStatus), [
            'name'  => $name,
            'color' => $color,
        ]);

        $ticketStatus->refresh();

        $response->assertRedirect(route('ticketStatus.index'));
        $response->assertSessionHas('ticketStatus.id', $ticketStatus->id);

        $this->assertEquals($name, $ticketStatus->name);
        $this->assertEquals($color, $ticketStatus->color);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ticketStatus = TicketStatus::factory()->create();

        $response = $this->delete(route('ticket-status.destroy', $ticketStatus));

        $response->assertRedirect(route('ticketStatus.index'));

        $this->assertDeleted($ticketStatus);
    }
}
