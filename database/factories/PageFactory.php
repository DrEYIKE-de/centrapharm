<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "page_name" => $this->faker->name(),
           "page_banner"=>$this->faker->url(),
           "page_avatar"=>$this->faker->url(),
           "page_holder"=>$this->faker->text(200),
           "page_members"=>$this->faker->text(200),
           "page_description"=>$this->faker->text(200)
        ];
    }
}
