<?php

namespace App\Http\Livewire\Website\Product;

use App\Models\Car;
use App\Models\CarCompany;
use App\Models\Glass;
use App\Models\Product;
use App\Models\Year;
use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductList extends Component
{
    use WithPagination;

    /**
     * searchKey
     * perPage
     *
     * @var string
     * @var int
     */
    public $searchKey = '',
            $year = '',
            $make = '',
            $model = '',
            $bodyStyle = '',
            $glass = '',
            $feature = '',
            $yearList,
            $makeList,
            $modelList = [],
            $bodyStyleList = [],
            $glassList = [],
            $featureList = [],
            $page = 1,
            $perPage = 10;

    private $productRepository,$products;

    /**
     * boot
     *
     * @return void
     */
    public function boot(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->products = Product::paginate($this->perPage);
    }

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->yearList = Year::get();
        $this->makeList = CarCompany::get();
    }

    /**
     * updatedMake
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedMake($field)
    {
        $this->resetPage();
        $this->reset(['modelList', 'bodyStyleList', 'glassList', 'featureList']);

        $this->modelList = CarCompany::find($this->make)->cars ?? [];
    }

    /**
     * updatedModel
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedModel($field)
    {
        $this->resetPage();
        $this->reset(['bodyStyleList', 'glassList', 'featureList']);

        $this->bodyStyleList = Car::find($this->model)->bodyStyles ?? [];
    }

    /**
     * updatedBodyStyle
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedBodyStyle($field)
    {
        $this->resetPage();
        $this->reset(['glassList', 'featureList']);

        $this->glassList = Glass::get() ?? [];
    }

    /**
     * updatedGlass
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedGlass($field)
    {
        $this->resetPage();
        $this->reset(['featureList']);

        $this->featureList = Glass::find($this->glass)->features ?? [];
    }

    public function render()
    {
        return view('livewire.website.product.product-list', [
            'products' => $this->products
        ]);
    }

    public function search()
    {
        $this->resetPage();
        $this->getProducts();
    }

    /**
     * getProducts
     *
     * @return array
     */
    public function getProducts(bool $concate = false)
    {
        $query = Product::query();

        $query->when(isset($this->year) && !empty($this->year), function ($q) {

            $q->where(function ($q) {

                $q->where(function ($q) {

                    $q->whereHas('productFittings', function ($q2) {
                        $q2->whereHas('yearFrom', function ($q3) {
                            $q3->where('name', $this->year);
                        });
                    });
                })
                    ->orWhere(function ($q) {

                        $q->whereHas('productFittings', function ($q2) {
                            $q2->whereHas('yearFrom', function ($q3) {
                                $q3->where('name', '<=', $this->year);
                            })->whereHas('yearTo', function ($q3) {
                                $q3->where('name', '>=', $this->year);
                            });
                        });
                    });
            });
        });

        $query->when(isset($this->make) && !empty($this->make), function ($q) {
            $q->whereHas('productFittings', function ($q2) {
                $q2->whereHas('car', function ($q3) {
                    $q3->where('car_company_id', $this->make);
                });
            });
        });

        $query->when(isset($this->model) && !empty($this->model), function ($q) {
            $q->whereHas('productFittings', function ($q2) {
                $q2->whereHas('car', function ($q3) {
                    $q3->where('id', $this->model);
                });
            });
        });

        $query->when(isset($this->bodyStyle) && !empty($this->bodyStyle), function ($q) {
            $q->whereHas('productFittings', function ($q2) {
                $q2->whereHas('bodyStyle', function ($q3) {
                    $q3->where('id', $this->bodyStyle);
                });
            });
        });

        $query->when(isset($this->glass) && !empty($this->glass), function ($q) {
            $q->whereHas('productFittings', function ($q2) {
                $q2->whereHas('glass', function ($q3) {
                    $q3->where('id', $this->glass);
                });
            });
        });

        $query->when(isset($this->feature) && !empty($this->feature), function ($q) {
            $q->whereHas('productFittings', function ($q2) {
                $q2->whereHas('feature', function ($q3) {
                    $q3->where('id', $this->feature);
                });
            });
        });

        $query->when(isset($this->searchKey) && !empty($this->searchKey), function ($q) {
            $q->whereRaw("CONCAT(part_name, ' ', part_number) LIKE ?", ["%{$this->searchKey}%"]);
        });

        $query->with('images');

        $this->products = $query->paginate($this->perPage);
    }
}
