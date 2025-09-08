<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\narudzbinas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\narudzbinasController
 */
final class narudzbinasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $narudzbinas = narudzbinas::factory()->count(3)->create();

        $response = $this->get(route('narudzbinas.index'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.index');
        $response->assertViewHas('narudzbinas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('narudzbinas.create'));

        $response->assertOk();
        $response->assertViewIs('narudzbina.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\narudzbinasController::class,
            'store',
            \App\Http\Requests\narudzbinasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('narudzbinas.store'));

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);

        $this->assertDatabaseHas(narudzbinas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $narudzbina = narudzbinas::factory()->create();

        $response = $this->get(route('narudzbinas.show', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.show');
        $response->assertViewHas('narudzbina');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $narudzbina = narudzbinas::factory()->create();

        $response = $this->get(route('narudzbinas.edit', $narudzbina));

        $response->assertOk();
        $response->assertViewIs('narudzbina.edit');
        $response->assertViewHas('narudzbina');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\narudzbinasController::class,
            'update',
            \App\Http\Requests\narudzbinasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $narudzbina = narudzbinas::factory()->create();

        $response = $this->put(route('narudzbinas.update', $narudzbina));

        $narudzbina->refresh();

        $response->assertRedirect(route('narudzbinas.index'));
        $response->assertSessionHas('narudzbina.id', $narudzbina->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $narudzbina = narudzbinas::factory()->create();
        $narudzbina = Narudzbina::factory()->create();

        $response = $this->delete(route('narudzbinas.destroy', $narudzbina));

        $response->assertRedirect(route('narudzbinas.index'));

        $this->assertModelMissing($narudzbina);
    }
}
