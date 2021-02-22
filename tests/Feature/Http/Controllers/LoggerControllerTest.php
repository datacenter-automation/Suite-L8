<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Logger;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LoggerController
 */
class LoggerControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $loggers = Logger::factory()->count(3)->create();

        $response = $this->get(route('logger.index'));

        $response->assertOk();
        $response->assertViewIs('logger.index');
        $response->assertViewHas('loggers');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('logger.create'));

        $response->assertOk();
        $response->assertViewIs('logger.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\LoggerController::class, 'store', \App\Http\Requests\LoggerStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $method = $this->faker->word;
        $controller = $this->faker->word;
        $action = $this->faker->word;
        $parameter = null;
        $headers = null;
        $origin_ip_address = $this->faker->word;
        $user = User::factory()->create();

        $response = $this->post(route('logger.store'), [
            'method'            => $method,
            'controller'        => $controller,
            'action'            => $action,
            'parameter'         => $parameter,
            'headers'           => $headers,
            'origin_ip_address' => $origin_ip_address,
            'user_id'           => $user->id,
        ]);

        $loggers = Logger::query()->where('method', $method)->where('controller', $controller)->where('action', $action)->where('parameter', $parameter)->where('headers', $headers)->where('origin_ip_address', $origin_ip_address)->where('user_id', $user->id)->get();
        $this->assertCount(1, $loggers);
        $logger = $loggers->first();

        $response->assertRedirect(route('logger.index'));
        $response->assertSessionHas('logger.id', $logger->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $logger = Logger::factory()->create();

        $response = $this->get(route('logger.show', $logger));

        $response->assertOk();
        $response->assertViewIs('logger.show');
        $response->assertViewHas('logger');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $logger = Logger::factory()->create();

        $response = $this->get(route('logger.edit', $logger));

        $response->assertOk();
        $response->assertViewIs('logger.edit');
        $response->assertViewHas('logger');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(\App\Http\Controllers\LoggerController::class, 'update', \App\Http\Requests\LoggerUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $logger = Logger::factory()->create();
        $method = $this->faker->word;
        $controller = $this->faker->word;
        $action = $this->faker->word;
        $parameter = $this->faker->text;
        $headers = $this->faker->text;
        $origin_ip_address = $this->faker->word;
        $user = User::factory()->create();

        $response = $this->put(route('logger.update', $logger), [
            'method'            => $method,
            'controller'        => $controller,
            'action'            => $action,
            'parameter'         => $parameter,
            'headers'           => $headers,
            'origin_ip_address' => $origin_ip_address,
            'user_id'           => $user->id,
        ]);

        $logger->refresh();

        $response->assertRedirect(route('logger.index'));
        $response->assertSessionHas('logger.id', $logger->id);

        $this->assertEquals($method, $logger->method);
        $this->assertEquals($controller, $logger->controller);
        $this->assertEquals($action, $logger->action);
        $this->assertEquals($parameter, $logger->parameter);
        $this->assertEquals($headers, $logger->headers);
        $this->assertEquals($origin_ip_address, $logger->origin_ip_address);
        $this->assertEquals($user->id, $logger->user_id);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $logger = Logger::factory()->create();

        $response = $this->delete(route('logger.destroy', $logger));

        $response->assertRedirect(route('logger.index'));

        $this->assertDeleted($logger);
    }
}
