<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Proizvod;
use App\Models\proizvods;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\proizvodsController
 */
final class proizvodsControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $proizvods = proizvods::factory()->count(3)->create();

        $response = $this->get(route('proizvods.index'));

        $response->assertOk();
        $response->assertViewIs('proizvod.index');
        $response->assertViewHas('proizvods');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('proizvods.create'));

        $response->assertOk();
        $response->assertViewIs('proizvod.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\proizvodsController::class,
            'store',
            \App\Http\Requests\proizvodsStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('proizvods.store'));

        $response->assertRedirect(route('proizvods.index'));
        $response->assertSessionHas('proizvod.id', $proizvod->id);

        $this->assertDatabaseHas(proizvods, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $proizvod = proizvods::factory()->create();

        $response = $this->get(route('proizvods.show', $proizvod));

        $response->assertOk();
        $response->assertViewIs('proizvod.show');
        $response->assertViewHas('proizvod');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $proizvod = proizvods::factory()->create();

        $response = $this->get(route('proizvods.edit', $proizvod));

        $response->assertOk();
        $response->assertViewIs('proizvod.edit');
        $response->assertViewHas('proizvod');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\proizvodsController::class,
            'update',
            \App\Http\Requests\proizvodsUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $proizvod = proizvods::factory()->create();

        $response = $this->put(route('proizvods.update', $proizvod));

        $proizvod->refresh();

        $response->assertRedirect(route('proizvods.index'));
        $response->assertSessionHas('proizvod.id', $proizvod->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $proizvod = proizvods::factory()->create();
        $proizvod = Proizvod::factory()->create();

        $response = $this->delete(route('proizvods.destroy', $proizvod));

        $response->assertRedirect(route('proizvods.index'));

        $this->assertModelMissing($proizvod);
    }
}
