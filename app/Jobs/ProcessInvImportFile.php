<?php

namespace App\Jobs;

use App\Models\Car;
use App\Models\Year;
use App\Models\Glass;
use App\Models\Feature;
use App\Models\Product;
use App\Models\BodyStyle;
use App\Models\CarCompany;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\ProductFitting;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessInvImportFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $spreadsheet = IOFactory::load($this->filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $header = [];
        $csvData = [];

        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                if ($row->getRowIndex() === 1) {
                    $header[] = $cell->getValue();
                } else {
                    $rowData[] = $cell->getValue();
                }
            }

            if ($row->getRowIndex() !== 1) {
                $csvData[] = array_combine($header, $rowData);
            }
        }

        foreach ($csvData as $dataRow) {

            if (isset($dataRow['PartNumber']) && !empty($dataRow['PartNumber'])) {

                $product = Product::where('part_number', trim($dataRow['PartNumber']))->first();
                if ($product == null) {

                    $product = new Product();
                    $product->part_number = trim($dataRow['PartNumber']);
                    $product->price = trim($dataRow['TotalPrice'] ?? $dataRow['Sale Price']);
                    $product->save();
                    $product->refresh();
                }

                $year = Year::where('name', trim($dataRow['Year']))->first();
                if ($year == null) {
                    $year = new Year();
                    $year->name = trim($dataRow['Year']);
                    $year->save();
                    $year->refresh();
                }

                $make = CarCompany::where('name', trim($dataRow['Make']))->first();
                if ($make == null) {
                    $make = new CarCompany();
                    $make->name = trim($dataRow['Make']);
                    $make->save();
                    $make->refresh();
                }

                $model = Car::where('name', trim($dataRow['Model']))->first();
                if ($model == null) {
                    $model = new Car();
                    $model->name = trim($dataRow['Model']);
                    $model->car_company_id = $make->id;
                    $model->save();
                    $model->refresh();
                }

                $style = BodyStyle::where('name', trim($dataRow['Style']))->first();
                if ($style == null) {
                    $style = new BodyStyle();
                    $style->name = trim($dataRow['Style']);
                    $style->save();
                    $style->refresh();
                }

                //$style->cars()->attach($model->id);

                if (!$style->cars()->wherePivot('car_id', $model->id)->exists()) {
                    $style->cars()->attach($model->id);
                }

                $glass = Glass::where('name', trim($dataRow['Glass']))->first();
                if ($glass == null) {

                    if (Str::contains($dataRow['Glass'], 'Door Glass')) {
                        $glass_Type = Glass::TYPE_DOOR;
                    } elseif (Str::contains($dataRow['Glass'], 'Windshield')) {
                        $glass_Type = Glass::TYPE_WINDSHIELD;
                    } elseif (Str::contains($dataRow['Glass'], 'Quarter')) {
                        $glass_Type = Glass::TYPE_QUARTER;
                    } elseif (Str::contains($dataRow['Glass'], 'Vent')) {
                        $glass_Type = Glass::TYPE_VENT;
                    } else {
                        $glass_Type = Glass::TYPE_OTHER;
                    }

                    $glass = new Glass();
                    $glass->name = trim($dataRow['Glass']);
                    $glass->type = $glass_Type;
                    $glass->save();
                    $glass->refresh();
                }

                //$glass->bodyStyles()->attach($style->id);

                if (!$glass->bodyStyles()->wherePivot('body_style_id', $style->id)->exists()) {
                    $glass->bodyStyles()->attach($style->id);
                }

                $feature = null;
                if (isset($dataRow['Feature']) && !empty($dataRow['Feature']) && trim($dataRow['Feature']) != "No Data Available") {
                    $feature = Feature::where('name', trim($dataRow['Feature']))
                        ->where('glass_id', $glass->id)->first();
                    if ($feature == null) {
                        $feature = new Feature();
                        $feature->name = trim($dataRow['Feature']);
                        $feature->glass_id = $glass->id;
                        $feature->save();
                        $feature->refresh();
                    }
                }

                $productFitting = new ProductFitting();
                $productFitting->product_id = $product->id;
                $productFitting->year_from_id = $year->id;
                $productFitting->car_id = $model->id;
                $productFitting->body_style_id = $style->id;
                $productFitting->glass_id = $glass->id;
                $productFitting->feature_id = $feature?->id;
                $productFitting->save();
            }
        }

        Storage::delete($this->filePath);
    }
}
