<?php

namespace Tests\Feature;

use App\Models\Biodata;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BiodataDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_rejects_duplicate_nim_values(): void
    {
        Biodata::create([
            'nama' => 'Nama Pertama',
            'nim' => '123456',
        ]);

        $this->expectException(QueryException::class);

        Biodata::create([
            'nama' => 'Nama Kedua',
            'nim' => '123456',
        ]);
    }

    public function test_nim_must_be_unique_when_creating_biodata(): void
    {
        Biodata::create([
            'nama' => 'Nama Pertama',
            'nim' => '123456',
        ]);

        $response = $this->from(route('biodata.create'))
            ->post(route('biodata.store'), [
                'nama' => 'Nama Kedua',
                'nim' => '123456',
            ]);

        $response->assertRedirect(route('biodata.create'))
            ->assertSessionHasErrors('nim');

        $this->assertDatabaseCount('biodatas', 1);
    }

    public function test_biodata_can_keep_its_nim_when_updated(): void
    {
        $biodata = Biodata::create([
            'nama' => 'Nama Awal',
            'nim' => '123456',
        ]);

        $response = $this->put(route('biodata.update', $biodata), [
            'nama' => 'Nama Diperbarui',
            'nim' => '123456',
        ]);

        $response->assertRedirect(route('biodata.index'));
        $this->assertDatabaseHas('biodatas', [
            'id' => $biodata->id,
            'nama' => 'Nama Diperbarui',
            'nim' => '123456',
        ]);
    }
}
