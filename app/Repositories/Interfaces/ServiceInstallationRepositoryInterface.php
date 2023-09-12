<?php
namespace App\Repositories\Interfaces;

Interface ServiceInstallationRepositoryInterface{
        public function getAllYear();
        public function getAllMake();
        public function getModel($make_id);
        public function getBodyStyle($model_id);
        public function getGlasses($data);
        public function getFeature($data);
}
