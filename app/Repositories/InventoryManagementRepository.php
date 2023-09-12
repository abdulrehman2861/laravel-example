<?php

namespace App\Repositories;

use App\Models\Car;
use Laracsv\Export;
use App\Models\Year;
use App\Models\Glass;
use App\Models\Feature;
use App\Models\Product;
use App\Models\BodyStyle;
use App\Models\CarCompany;
use Illuminate\Support\Str;
use App\Models\ProductFitting;
use Illuminate\Http\UploadedFile;
use App\Jobs\ProcessInvImportFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\InventoryManagementRepositoryInterface;

class InventoryManagementRepository implements InventoryManagementRepositoryInterface
{

    public function allInventory()
    {
        $products = Product::all();
        return $products;
    }

    public function exportInventory()
    {
        $productFittings = ProductFitting::all();
        $csvExporter = new Export();
        $csvExporter->beforeEach(function ($productFittings) {
            $productFittings->feature_name  = $productFittings->feature->name ?? '';
        });
        return $csvExporter->build($productFittings, ['yearFrom.name' => 'Year', 'car.carCompany.name' => 'Make', 'car.name' => 'Model', 'bodyStyle.name' => 'Style', 'glass.name' => 'Glass', 'product.part_number' => 'PartNumber','feature_name' => 'Feature','product.price' => 'TotalPrice'])->download();
    }

    public function importInventory($data)
    {
        $file = $data['file'];

        if (!$file instanceof UploadedFile || !$file->isValid()) {
            return false;
        }

        //$filePath = $file->getRealPath();
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/images', $filename);
        //$filePath = $file->store('public/uploads');

        ProcessInvImportFile::dispatch(Storage::path($filePath));
        // dd('done');

    }

    public function clearInventoryColumn($operation_type, $id_arr = [],$operation_on,$column_name = '')
    {

        if ($operation_type == 'fullRecord')
        {
            if ($operation_on == 'all')
            {
                Product::where('id', '!=', 0)->delete();
            } else {
                Product::whereIn('id', $id_arr)->delete();
            }

        }
        else
        {
            $str_col = ['shelf', 'warehouse_id'];
            $col_type = in_array($column_name, $str_col) ? null : 0;

            if ($operation_on == 'all')
            {
                Product::where('id', '!=', 0)->update([
                    "$column_name" => $col_type
                ]);
            } else {
                Product::whereIn('id', $id_arr)->update([
                    "$column_name" => $col_type
                ]);
            }
        }
        // $str_col = ['part_name', 'part_number', 'inter_number', 'shelf', 'unit', 'note'];
        // $col_type = in_array($column_name, $str_col) ? 'N/A' : 0;

        // if (!in_array($column_name, ['warehouse_id', 'supplier_id'])) {
        //     if (count($id_arr) == 0) {
        //         // update all to null with column name
        //         Product::where('id', '!=', 0)->update([
        //             "$column_name" => $col_type
        //         ]);
        //     } else {
        //         Product::whereIn('id', $id_arr)->update([
        //             "$column_name" => $col_type
        //         ]);
        //     }
        // }
    }
}
