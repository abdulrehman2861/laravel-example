<?php

namespace App\Http\Livewire\Dashboard\Widget;

use App\Models\Car;
use App\Models\Year;
use App\Models\Glass;
use App\Models\Product;
use Livewire\Component;
use App\Models\BodyStyle;
use App\Models\CarCompany;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class SearchProduct extends Component
{
    use WithPagination;

    public $year = '',
        $make = '',
        $model = '',
        $bodyStyle = '',
        $glass = '',
        $feature = '',
        $searchKey = '',
        $products_id = [],
        $yearList,
        $makeList,
        $modelList = [],
        $bodyStyleList = [],
        $glassList = [],
        $featureList = [];

    protected $products;

    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['LoadMoreGlobalItems' => 'getProducts'];

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
     * render
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.dashboard.widget.search-product');
    }

    /**
     * updatedYear
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedYear($field)
    {
        $this->resetPage();
        $this->getProducts();
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

        $this->getProducts();
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

        $this->getProducts();
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

        $this->getProducts();
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

        $this->getProducts();
    }

    /**
     * updatedFeature
     *
     * @param  mixed $field
     * @return void
     */
    public function updatedFeature($field)
    {
        $this->resetPage();

        $this->getProducts();
    }

    public function updatedSearchKey($field)
    {
        $this->resetPage();

        $this->getProducts();
    }


    /**
     * getProducts
     *
     * @return void
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
            // dd("%{$this->searchKey}%");
            // $q->whereRaw("CONCAT(part_name, ' ', ) LIKE ?", ["%{$this->searchKey}%"]);

            $q->where(function ($q) {

                $q->where('part_name', 'like', '%' . $this->searchKey . '%')
                    ->orWhere('part_number', 'like', '%' . $this->searchKey . '%');
            });

        });


        $this->products = $query->paginate(10, ['*'], 'page', $this->products?->currentPage() ?? 0 + 1);

        if ($concate) {
            $this->products_id = array_merge($this->products_id, $this->products->pluck('id')->toArray());
        } else {
            $this->products_id = $this->products->pluck('id')->toArray();
        }

        $this->emit('globalWidgetProducts', $this->products_id);
    }
}
