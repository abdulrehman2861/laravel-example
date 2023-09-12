<?php
namespace App\Repositories\Interfaces;

Interface FeatureRepositoryInterface{

    public function allFeatures();
    public function store($data);
    public function findFeature($id);
    public function update($data, $id);
    public function destroy($id);
}
