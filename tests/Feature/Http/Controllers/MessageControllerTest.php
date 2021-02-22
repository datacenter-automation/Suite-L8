<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MessageController
 */
class MessageControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $messages = Message::factory()->count(3)->create();

        $response = $this->get(route('message.index'));

        $response->assertOk();
        $response->assertViewIs('message.index');
        $response->assertViewHas('messages');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('message.create'));

        $response->assertOk();
        $response->assertViewIs('message.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\MessageController::class, 'store', \App\Http\Requests\MessageStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $type = $this->faker->word;
        $body = $this->faker->text;
        $seen = $this->faker->boolean;

        $response = $this->post(route('message.store'), [
            'type' => $type,
            'body' => $body,
            'seen' => $seen,
        ]);

        $messages = Message::query()->where('type', $type)->where('body', $body)->where('seen', $seen)->get();
        $this->assertCount(1, $messages);
        $message = $messages->first();

        $response->assertRedirect(route('message.index'));
        $response->assertSessionHas('message.id', $message->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $message = Message::factory()->create();

        $response = $this->get(route('message.show', $message));

        $response->assertOk();
        $response->assertViewIs('message.show');
        $response->assertViewHas('message');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $message = Message::factory()->create();

        $response = $this->get(route('message.edit', $message));

        $response->assertOk();
        $response->assertViewIs('message.edit');
        $response->assertViewHas('message');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\MessageController::class, 'update', \App\Http\Requests\MessageUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $message = Message::factory()->create();
        $type = $this->faker->word;
        $body = $this->faker->text;
        $seen = $this->faker->boolean;

        $response = $this->put(route('message.update', $message), [
            'type' => $type,
            'body' => $body,
            'seen' => $seen,
        ]);

        $message->refresh();

        $response->assertRedirect(route('message.index'));
        $response->assertSessionHas('message.id', $message->id);

        $this->assertEquals($type, $message->type);
        $this->assertEquals($body, $message->body);
        $this->assertEquals($seen, $message->seen);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $message = Message::factory()->create();

        $response = $this->delete(route('message.destroy', $message));

        $response->assertRedirect(route('message.index'));

        $this->assertSoftDeleted($message);
    }
}
