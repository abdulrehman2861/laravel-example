<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Console\Command;

class AddProductImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::get();
        $bar = $this->output->createProgressBar(count($products));

        $bar->start();

        foreach ($products as $key => $product) {
            $images = [];

            if (Str::startsWith($product->part_number, ['FW', 'DW'])) {
                // WINDSHIELD
                $image = new ProductImage;
                $image->img_url = '/storage/images/windshield.jpeg';
                $images[] = $image;
            } else if (Str::startsWith($product->part_number, ['FB', 'DB'])){
                $image = new ProductImage;
                $image->img_url = '/storage/images/backglass.jpeg';
                $images[] = $image;
            }

            $image = new ProductImage;
            $image->img_url = '/storage/images/car1.jpeg';
            $images[] = $image;

            $image = new ProductImage;
            $image->img_url = '/storage/images/car2.jpeg';
            $images[] = $image;



            $product->images()->saveMany($images);

            $bar->advance();
        }
        $bar->finish();
        $this->info('Done.');
    }
}
