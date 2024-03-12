<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\MerkKendaraan;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\kendaraanController
 */
final class kendaraanControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $kendaraans = kendaraan::factory()->count(3)->create();

        $response = $this->get(route('kendaraan.index'));

        $response->assertOk();
        $response->assertViewIs('post.index');
        $response->assertViewHas('posts');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('kendaraan.create'));

        $response->assertOk();
        $response->assertViewIs('post.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\kendaraanController::class,
            'store',
            \App\Http\Requests\kendaraanStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $Merk_kendaraan = MerkKendaraan::factory()->create();
        $k_plat = $this->faker->word();
        $k_status = $this->faker->randomElement(/** enum_attributes **/);
        $merk_kendaraan = MerkKendaraan::factory()->create();

        $response = $this->post(route('kendaraan.store'), [
            'Merk_kendaraan_id' => $Merk_kendaraan->id,
            'k_plat' => $k_plat,
            'k_status' => $k_status,
            'merk_kendaraan_id' => $merk_kendaraan->id,
        ]);

        $kendaraans = Post::query()
            ->where('Merk_kendaraan_id', $Merk_kendaraan->id)
            ->where('k_plat', $k_plat)
            ->where('k_status', $k_status)
            ->where('merk_kendaraan_id', $merk_kendaraan->id)
            ->get();
        $this->assertCount(1, $kendaraans);
        $kendaraan = $kendaraans->first();

        $response->assertRedirect(route('post.index'));
    }
}
