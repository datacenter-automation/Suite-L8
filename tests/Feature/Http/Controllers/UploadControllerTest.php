<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UploadController
 */
class UploadControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $uploads = Upload::factory()->count(3)->create();

        $response = $this->get(route('upload.index'));

        $response->assertOk();
        $response->assertViewIs('upload.index');
        $response->assertViewHas('uploads');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('upload.create'));

        $response->assertOk();
        $response->assertViewIs('upload.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UploadController::class,
            'store',
            \App\Http\Requests\UploadStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $filename_uniqid = \Str::random(20);
        $user = User::factory()->create();
        $filename = $this->faker->word;
        $file_attibutes = $this->faker->text;
        $uploader_ip_address = $this->faker->ipv4;

        $response = $this->post(route('upload.store'), [
            'filename_uniqid' => $filename_uniqid,
            'user_id' => $user->id,
            'filename' => $filename,
            'file_attibutes' => $file_attibutes,
            'uploader_ip_address' => $uploader_ip_address,
        ]);

        $uploads = Upload::query()
            ->where('filename_uniqid', $filename_uniqid)
            ->where('user_id', $user->id)
            ->where('filename', $filename)
            ->where('file_attibutes', $file_attibutes)
            ->where('uploader_ip_address', $uploader_ip_address)
            ->get();
        $this->assertCount(1, $uploads);
        $upload = $uploads->first();

        $response->assertRedirect(route('upload.index'));
        $response->assertSessionHas('upload.id', $upload->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $upload = Upload::factory()->create();

        $response = $this->get(route('upload.show', $upload));

        $response->assertOk();
        $response->assertViewIs('upload.show');
        $response->assertViewHas('upload');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $upload = Upload::factory()->create();

        $response = $this->get(route('upload.edit', $upload));

        $response->assertOk();
        $response->assertViewIs('upload.edit');
        $response->assertViewHas('upload');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UploadController::class,
            'update',
            \App\Http\Requests\UploadUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $upload = Upload::factory()->create();
        $filename_uniqid = \Str::random(20);
        $user = User::factory()->create();
        $filename = $this->faker->word;
        $file_attibutes = $this->faker->text;
        $uploader_ip_address = $this->faker->ipv4;

        $response = $this->put(route('upload.update', $upload), [
            'filename_uniqid' => $filename_uniqid->id,
            'user_id' => $user->id,
            'filename' => $filename,
            'file_attibutes' => $file_attibutes,
            'uploader_ip_address' => $uploader_ip_address,
        ]);

        $upload->refresh();

        $response->assertRedirect(route('upload.index'));
        $response->assertSessionHas('upload.id', $upload->id);

        $this->assertEquals($filename_uniqid->id, $upload->filename_uniqid);
        $this->assertEquals($user->id, $upload->user_id);
        $this->assertEquals($filename, $upload->filename);
        $this->assertEquals($file_attibutes, $upload->file_attibutes);
        $this->assertEquals($uploader_ip_address, $upload->uploader_ip_address);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $upload = Upload::factory()->create();

        $response = $this->delete(route('upload.destroy', $upload));

        $response->assertRedirect(route('upload.index'));

        $this->assertSoftDeleted($upload);
    }
}
