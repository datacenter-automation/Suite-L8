<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SoftwareCategoryController;
use App\Http\Requests\SoftwareCategoryStoreRequest;
use App\Http\Requests\SoftwareCategoryUpdateRequest;
use App\Models\SoftwareCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SoftwareCategoryController
 */
class SoftwareCategoryControllerTest extends TestCase
{

    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $softwareCategories = SoftwareCategory::factory()->count(3)->create();

        $response = $this->get(route('software-category.index'));

        $response->assertOk();
        $response->assertViewIs('softwareCategory.index');
        $response->assertViewHas('softwareCategories');
    }

    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('software-category.create'));

        $response->assertOk();
        $response->assertViewIs('softwareCategory.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareCategoryController::class, 'store', SoftwareCategoryStoreRequest::class);
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('software-category.store'), [
            'name' => $name,
        ]);

        $softwareCategories = SoftwareCategory::query()->where('name', $name)->get();
        $this->assertCount(1, $softwareCategories);
        $softwareCategory = $softwareCategories->first();

        $response->assertRedirect(route('softwareCategory.index'));
        $response->assertSessionHas('softwareCategory.id', $softwareCategory->id);
    }

    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $softwareCategory = SoftwareCategory::factory()->create();

        $response = $this->get(route('software-category.show', $softwareCategory));

        $response->assertOk();
        $response->assertViewIs('softwareCategory.show');
        $response->assertViewHas('softwareCategory');
    }

    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $softwareCategory = SoftwareCategory::factory()->create();

        $response = $this->get(route('software-category.edit', $softwareCategory));

        $response->assertOk();
        $response->assertViewIs('softwareCategory.edit');
        $response->assertViewHas('softwareCategory');
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(SoftwareCategoryController::class, 'update', SoftwareCategoryUpdateRequest::class);
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $softwareCategory = SoftwareCategory::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('software-category.update', $softwareCategory), [
            'name' => $name,
        ]);

        $softwareCategory->refresh();

        $response->assertRedirect(route('softwareCategory.index'));
        $response->assertSessionHas('softwareCategory.id', $softwareCategory->id);

        $this->assertEquals($name, $softwareCategory->name);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $softwareCategory = SoftwareCategory::factory()->create();

        $response = $this->delete(route('software-category.destroy', $softwareCategory));

        $response->assertRedirect(route('softwareCategory.index'));

        $this->assertSoftDeleted($softwareCategory);
    }
}
