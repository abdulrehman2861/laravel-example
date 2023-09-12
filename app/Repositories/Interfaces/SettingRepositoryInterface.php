<?php
namespace App\Repositories\Interfaces;

Interface SettingRepositoryInterface{

    public function update($data);
    public function getSetting();
    public function setSmtpSetting($data);
    public function getSmtpSetting();
    public function setShippingSetting($data);
    public function setUpsSetting($data);
    public function getUpsSetting();
    public function setFedexSetting($data);
    public function getFedexSetting();
    public function setStripeSetting($data);
    public function getStripeSetting();
    public function setPaypalSetting($data);
    public function getPaypalSetting();
}
