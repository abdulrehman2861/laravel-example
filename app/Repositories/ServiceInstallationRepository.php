<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\CarCompany;
use App\Models\Feature;
use App\Models\Glass;
use App\Models\ProductFitting;
use App\Models\Quotation;
use App\Models\Year;
use App\Models\ZipCode;
use App\Repositories\Interfaces\ServiceInstallationRepositoryInterface;

class ServiceInstallationRepository implements ServiceInstallationRepositoryInterface
{
    public function getAllYear()
    {
        return Year::get() ?? [];
    }

    public function getAllMake()
    {
        return CarCompany::get() ?? [];
    }

    public function getModel($make_id)
    {
        return CarCompany::find($make_id)->cars ?? [];
    }

    public function getBodyStyle($model_id)
    {
        return Car::find($model_id)->bodyStyles ?? [];
    }

    public function checkZipCode($zip_code)
    {
        return ZipCode::where('zip_code', $zip_code)->first() ?? [];
    }

    public function getGlasses($data)
    {
        $product_fittings = ProductFitting::where('year_from_id', $data['year_id'])
            ->whereOr('year_to_id', $data['year_id'])
            ->where('car_id', $data['model_id'])
            ->where('body_style_id', $data['style_id'])
            ->get()
            ->pluck(['glass_id']);

        $calibration = ProductFitting::where('year_from_id', $data['year_id'])
            ->whereOr('year_to_id', $data['year_id'])
            ->where('car_id', $data['model_id'])
            ->where('body_style_id', $data['style_id'])
            ->whereHas('glass' ,function($q)
            {
                $q->where('type',Glass::TYPE_WINDSHIELD);
            })
            ->first()
            ?->calibration;

        // Get year, make, model, body style
        $quotation['year'] = Year::find($data['year_id'])->name;
        $quotation['make'] = CarCompany::find($data['make_id'])->name;
        $quotation['model'] = Car::find($data['model_id'])->name;
        $quotation['body_style'] = Car::find($data['model_id'])->bodyStyles->find($data['style_id'])->name;
        $quotation['name'] = $data['name'] ?? 'Unknown';
        $quotation['email'] = $data['email'];
        $quotation['phone'] = $data['phone'];
        $quotation['zip_code'] = $data['zip_code'];
        $quotation['deductible'] = $data['deductible'];

        // create pending quotation
        $quotation = Quotation::create($quotation);

        $glasses = Glass::whereIn('id', $product_fittings)->get()->each->append('has_feature') ?? [];
        foreach ($glasses as $key => $glass)
        {
            $glass->has_calibration = $calibration;
        }
        $result['glass'] = $glasses;

        return $result;
    }

    public function getFeature($data)
    {
        $product_fittings = ProductFitting::where('year_from_id', $data['year_id'])
            ->whereOr('year_to_id', $data['year_id'])
            ->where('car_id', $data['model_id'])
            ->where('body_style_id', $data['style_id'])
            ->whereIn('glass_id', $data['glass_ids'])
            ->get();

        $response['product_fittings'] = $product_fittings->pluck(['id']);
        $response['products'] = $product_fittings->pluck(['product_id']);
        $response['feature'] = Glass::whereIn('id', $data['glass_ids'])->with('features')->get() ?? [];

        return $response;
    }
}
