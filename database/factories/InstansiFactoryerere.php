<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instansi;


class InstansiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instansi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'institusi' => $this->faker->word(),
            'subinstitusi' => $this->faker->word(),
            'institusi' => $this->faker->word(),
            'status' => $this->faker->word(),
            'akreditasi' => $this->faker->word(),
            'alamat' => $this->faker->text(),
            'kepala_instansi' => $this->faker->word(),
            'nip_kepala' => $this->faker->word(),
            'website' => $this->faker->word(),
            'email' => $this->faker->safeEmail(),
            'telepon' => $this->faker->word(),
            'logo_institusi' => $this->faker->word(),
            'logo_instansi' => $this->faker->word(),
            'tte' => $this->faker->word(),
        ];
    }
}
