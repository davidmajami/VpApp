<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Stavkenarudzbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\stavkenarudzbineController
 */
final class stavkenarudzbineControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $stavkenarudzbines = Stavkenarudzbine::factory()->count(3)->create();

        $response = $this->get(route('stavkenarudzbines.index'));

        $response->assertOk();
        $response->assertViewIs('stavkenarudzbine.index');
        $response->assertViewHas('stavkenarudzbines');
    }

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('stavkenarudzbines.create'));

        $response->assertOk();
        $response->assertViewIs('stavkenarudzbine.create');
    }

    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stavkenarudzbineController::class,
            'store',
            \App\Http\Requests\stavkenarudzbineStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $data = [
            'kolicina' => 5,
            'proizvod_id' => 1,
            'narudzbina_id' => 1,
        ];

        $response = $this->post(route('stavkenarudzbines.store'), $data);

        $stavka = Stavkenarudzbine::latest()->first();

        $response->assertRedirect(route('stavkenarudzbines.index'));
        $response->assertSessionHas('stavkenarudzbine.id', $stavka->id);

        $this->assertDatabaseHas('stavkenarudzbine', $data);
    }

    #[Test]
    public function show_displays_view(): void
    {
        $stavka = Stavkenarudzbine::factory()->create();

        $response = $this->get(route('stavkenarudzbines.show', $stavka));

        $response->assertOk();
        $response->assertViewIs('stavkenarudzbine.show');
        $response->assertViewHas('stavkenarudzbine');
    }

    #[Test]
    public function edit_displays_view(): void
    {
        $stavka = Stavkenarudzbine::factory()->create();

        $response = $this->get(route('stavkenarudzbines.edit', $stavka));

        $response->assertOk();
        $response->assertViewIs('stavkenarudzbine.edit');
        $response->assertViewHas('stavkenarudzbine');
    }

    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\stavkenarudzbineController::class,
            'update',
            \App\Http\Requests\stavkenarudzbineUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $stavka = Stavkenarudzbine::factory()->create();

        $data = [
            'kolicina' => 10,
            'proizvod_id' => $stavka->proizvod_id,
            'narudzbina_id' => $stavka->narudzbina_id,
        ];

        $response = $this->put(route('stavkenarudzbines.update', $stavka), $data);

        $stavka->refresh();

        $response->assertRedirect(route('stavkenarudzbines.index'));
        $response->assertSessionHas('stavkenarudzbine.id', $stavka->id);

        $this->assertDatabaseHas('stavkenarudzbine', $data);
    }

    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $stavka = Stavkenarudzbine::factory()->create();

        $response = $this->delete(route('stavkenarudzbines.destroy', $stavka));

        $response->assertRedirect(route('stavkenarudzbines.index'));

        $this->assertModelMissing($stavka);
    }
}
