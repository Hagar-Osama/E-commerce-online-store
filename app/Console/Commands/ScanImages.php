<?php

namespace App\Console\Commands;

use App\Http\Traits\ImageTrait;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use TheSeer\Tokenizer\Exception;

class ScanImages extends Command
{
    use ImageTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan Images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $allowTypes = ['jpeg', 'png', 'jpg', 'webp'];
            foreach (Storage::files('public/images') as $file)
            {
                $baseFile = Storage::path($file);
                $fileContent = explode('/',$file);
                $fileName = end($fileContent);
                $fileDetails = explode('.', $fileName);
                $fileType = $fileDetails[1];
                $fileProductId = $fileDetails[0];
                $uploaded = false;


                if (in_array($fileType, $allowTypes)) {
                    $product = Product::find($fileProductId);

                    if ($product) {
                        $unlinkOldImage = null;

                        if (!empty($product->main_image)) {
                            $unlinkOldImage = Storage::path($product->main_image);
                        }
                        $newFileName = 'product_' . $product->id . '_' . time() . '.' . $fileType;
                        $this->scanImage($baseFile, 'products/' . $newFileName, $unlinkOldImage);

                        $product->update([
                            'main_image' => $newFileName
                        ]);
                        $uploaded = true;
                    }
                    if ($uploaded == true) {
                        unlink($baseFile);
                    }
                }
            }
            $this->info('images was scan');
            return self::SUCCESS;
        }catch (Exception $e) {
            return self::FAILURE;
        }

    }
}
