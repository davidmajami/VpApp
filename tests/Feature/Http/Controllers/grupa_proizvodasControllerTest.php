<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GrupaProizvoda;
use App\Models\grupa_proizvodas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\grupa_proizvodasController
 */
final class grupa_proizvodasControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $grupaProizvodas = grupa_proizvodas::factory()->count(3)->create();

        $response = $this->get(route('grupa_proizvodas.index'));

        $response->assertOk();
        $response->assertViewIs('grupaProizvoda.index');
        $response->assertViewHas('grupaProizvodas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('grupa_proizvodas.create'));

        $response->assertOk();
        $response->assertViewIs('grupaProizvoda.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\grupa_proizvodasController::class,
            'store',
            \App\Http\Requests\grupa_proizvodasStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('grupa_proizvodas.store'));

        $response->assertRedirect(route('grupaProizvodas.index'));
        $response->assertSessionHas('grupaProizvoda.id', $grupaProizvoda->id);

        $this->assertDatabaseHas(grupaProizvodas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $grupaProizvoda = grupa_proizvodas::factory()->create();

        $response = $this->get(route('grupa_proizvodas.show', $grupaProizvoda));

        $response->assertOk();
        $response->assertViewIs('grupaProizvoda.show');
        $response->assertViewHas('grupaProizvoda');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $grupaProizvoda = grupa_proizvodas::factory()->create();

        $response = $this->get(route('grupa_proizvodas.edit', $grupaProizvoda));

        $response->assertOk();
        $response->assertViewIs('grupaProizvoda.edit');
        $response->assertViewHas('grupaProizvoda');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\grupa_proizvodasController::class,
            'update',
            \App\Http\Requests\grupa_proizvodasUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $grupaProizvoda = grupa_proizvodas::factory()->create();

        $response = $this->put(route('grupa_proizvodas.update', $grupaProizvoda));

        $grupaProizvoda->refresh();

        $response->assertRedirect(route('grupaProizvodas.index'));
        $response->assertSessionHas('grupaProizvoda.id', $grupaProizvoda->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $grupaProizvoda = grupa_proizvodas::factory()->create();
        $grupaProizvoda = GrupaProizvoda::factory()->create();

        $response = $this->delete(route('grupa_proizvodas.destroy', $grupaProizvoda));

        $response->assertRedirect(route('grupaProizvodas.index'));

        $this->assertModelMissing($grupaProizvoda);
    }
}
