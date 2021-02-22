<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Feedback;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FeedbackController
 */
class FeedbackControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $feedback = Feedback::factory()->count(3)->create();

        $response = $this->get(route('feedback.index'));

        $response->assertOk();
        $response->assertViewIs('feedback.index');
        $response->assertViewHas('feedback');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('feedback.create'));

        $response->assertOk();
        $response->assertViewIs('feedback.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\FeedbackController::class, 'store', \App\Http\Requests\FeedbackStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $ticket = Ticket::factory()->create();
        $stars = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('feedback.store'), [
            'ticket_id' => $ticket->id,
            'stars'     => $stars,
        ]);

        $feedback = Feedback::query()->where('ticket_id', $ticket->id)->where('stars', $stars)->get();
        $this->assertCount(1, $feedback);
        $feedback = $feedback->first();

        $response->assertRedirect(route('feedback.index'));
        $response->assertSessionHas('feedback.id', $feedback->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $feedback = Feedback::factory()->create();

        $response = $this->get(route('feedback.show', $feedback));

        $response->assertOk();
        $response->assertViewIs('feedback.show');
        $response->assertViewHas('feedback');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $feedback = Feedback::factory()->create();

        $response = $this->get(route('feedback.edit', $feedback));

        $response->assertOk();
        $response->assertViewIs('feedback.edit');
        $response->assertViewHas('feedback');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\FeedbackController::class, 'update', \App\Http\Requests\FeedbackUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $feedback = Feedback::factory()->create();
        $ticket = Ticket::factory()->create();
        $stars = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('feedback.update', $feedback), [
            'ticket_id' => $ticket->id,
            'stars'     => $stars,
        ]);

        $feedback->refresh();

        $response->assertRedirect(route('feedback.index'));
        $response->assertSessionHas('feedback.id', $feedback->id);

        $this->assertEquals($ticket->id, $feedback->ticket_id);
        $this->assertEquals($stars, $feedback->stars);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $feedback = Feedback::factory()->create();

        $response = $this->delete(route('feedback.destroy', $feedback));

        $response->assertRedirect(route('feedback.index'));

        $this->assertDeleted($feedback);
    }
}
