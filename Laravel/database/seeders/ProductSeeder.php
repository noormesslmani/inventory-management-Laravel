<?php

namespace Database\Seeders;
use App\Models\Model;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $product = new Product;
        $product->type = 'Leather Jacket';
        $product->image = '753e91b62fab2.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=1;
        $product->save();

        $product = new Product;
        $product->type = 'Dior Purse';
        $product->image = '635e91c47fab2.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=1;
        $product->save();

        $product = new Product;
        $product->type = 'Barbie Doll';
        $product->image = '63f8b12d7f18e.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=2;
        $product->save();

        $product = new Product;
        $product->type = 'Channel Perfume';
        $product->image = '63fb4f1fca63d.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=3;
        $product->save();

        $product = new Product;
        $product->type = 'LEGO City Fire Rescue Helicopter';
        $product->image = '63f8b8acc8e78.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=4;
        $product->save();

        $product = new Product;
        $product->type = 'Themal Coffee Mug';
        $product->image = '63f8f89139cb2.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=5;
        $product->save();

        $product = new Product;
        $product->type = 'Teddy Bear';
        $product->image = '63fb4b3bce817.png';
        $product->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
        $product->owner_id=6;
        $product->save();


    }
}
