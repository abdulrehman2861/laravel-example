<?php

namespace App\Repositories;

use App\Models\FedexSetting;
use App\Models\PaypalSetting;
use App\Models\Setting;
use App\Models\SmtpSetting;
use App\Models\StripeSetting;
use App\Models\UpsSetting;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Interfaces\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    public function update($data)
    {
        $setting = Setting::first();
        if ($setting) {
            if (isset($data['site_logo'])) {
                if ($setting->site_logo != null) {
                    Storage::delete('public/' . $setting->site_logo);
                }
                $data['site_logo'] = Storage::put('uploads', $data['site_logo']);
            }
            $setting->update($data);
        } else {
            if (isset($data['site_logo'])) {
                $data['site_logo'] = Storage::put('uploads', $data['site_logo']);
            }
            Setting::create($data);
        }
    }

    public function getSetting()
    {
        return Setting::first();
    }

    public function setSmtpSetting($data)
    {
        $mail = SmtpSetting::first();
        if ($mail) {
            $mail->update($data);
        } else {
            SmtpSetting::create($data);
        }
    }

    public function getSmtpSetting()
    {
        return SmtpSetting::first();
    }

    public function setShippingSetting($data)
    {
        $shipping = Setting::first();
        if ($shipping) {
            $shipping->update($data);
        } else {
            Setting::create($data);
        }
    }

    public function setUpsSetting($data)
    {
        $ups = UpsSetting::first();
        if ($ups) {
            $ups->update($data);
        } else {
            UpsSetting::create($data);
        }
    }

    public function getUpsSetting()
    {
        return UpsSetting::first();
    }

    public function setFedexSetting($data)
    {
        $fedex = FedexSetting::first();
        if ($fedex) {
            $fedex->update($data);
        } else {
            FedexSetting::create($data);
        }
    }

    public function getFedexSetting()
    {
        return FedexSetting::first();
    }

    public function setStripeSetting($data)
    {
        $stripe = StripeSetting::first();
        if ($stripe) {
            $stripe->update($data);
        } else {
            StripeSetting::create($data);
        }
    }

    public function getStripeSetting()
    {
        return StripeSetting::first();
    }

    public function setPaypalSetting($data)
    {
        $paypal = PaypalSetting::first();
        if ($paypal) {
            $paypal->update($data);
        } else {
            PaypalSetting::create($data);
        }
    }

    public function getPaypalSetting()
    {
        return PaypalSetting::first();
    }
}