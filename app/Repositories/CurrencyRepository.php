<?php

namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{

    /**
     * allCurrency
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @return LengthAwarePaginator
     */
    public function allCurrency($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Currency::where('name', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate($perpage);
    }

    /**
     * allCurrencyNonpaginated
     *
     * @return Collection
     */
    public function allCurrencyNonpaginated(): Collection
    {
        return Currency::get();
    }

    /**
     * Store currency
     * @param array $data
     * @return Model
     */
    public function store($data)
    {
        return Currency::create($data);
    }

    /**
     * Update currency
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update($data, $id)
    {
        $currency = Currency::find($id);
        $currency->update($data);
        return $currency;
    }

    /**
     * Find currency
     * @param int $id
     * @return Model
     */
    public function findCurrency($id)
    {
        return Currency::find($id);
    }

    /**
     * Delete currency
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
        return true;
    }
}
