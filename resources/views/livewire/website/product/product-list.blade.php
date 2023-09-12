<div class="col-xl-12 col-lg-12 order-lg-2 order-1">
    <div class="product-topbar">
        <ul>
            <li  style="background:none;display:flex;align-items:center;" class="my-new-navbar-first-list">
                <img src="/assets/images/product/large-size/sport-car.png">
                <h5 style="color:white;margin-left:5px;font-size: 16px;font-weight: 700;">Select Vehicle</h5>

            </li>
            <li class="short">
                <select wire:model="year" class="nice-select rounded-0">
                    <option selected="true">
                        Select Year
                    </option>

                    @forelse ($yearList as $singleYear)
                        <option value="{{ $singleYear->name }}">
                            {{ $singleYear->name }}
                        </option>
                    @empty
                        <option >
                            No Data Available
                        </option>
                    @endforelse
                </select>
            </li>
            <li class="short">
                <select wire:model="make" class="nice-select rounded-0">
                    <option >
                        Select Make
                    </option>

                    @forelse ($makeList as $singleMake)
                        <option value="{{ $singleMake->id }}">
                            {{ $singleMake->name }}
                        </option>
                    @empty
                        <option >
                            No Data Available
                        </option>
                    @endforelse

                </select>
            </li>
            <li class="short">
                <select wire:model="model" class="nice-select rounded-0">
                    <option >
                        Select Model
                    </option>

                    @forelse ($modelList as $singleModel)
                        <option value="{{ $singleModel->id }}">
                            {{ $singleModel->name }}
                        </option>

                    @empty
                        <option >
                            No Data Available
                        </option>
                    @endforelse

                </select>
            </li>
            <li class="short">
                <select wire:model="bodyStyle" class="nice-select rounded-0">

                    <option >
                        Select Body Style
                    </option>

                    @forelse ($bodyStyleList as $singlebodyStyle)
                        <option value="{{ $singlebodyStyle->id }}">
                            {{ $singlebodyStyle->name }}
                        </option>

                    @empty
                        <option >
                            No Data Available
                        </option>
                    @endforelse

                </select>
            </li>
            <li class="short">
                <select wire:model="glass" class="nice-select rounded-0">
                    <option >
                        Select Glass
                    </option>
                    @forelse ($glassList as $singleGlass)
                        <option value="{{ $singleGlass->id }}">
                            {{ $singleGlass->name }}
                        </option>

                    @empty

                        <option >
                            No Data Available
                        </option>
                    @endforelse
                </select>
            </li>
            <li class="short">
                <select wire:model="feature" class="nice-select rounded-0">
                    <option >
                        Select Feature
                    </option>

                    @forelse ($featureList as $singleFeature)
                        <option value="{{ $singleFeature->id }}">
                            {{ $singleFeature->name }}
                        </option>

                    @empty

                        <option >
                            No Data Available
                        </option>
                    @endforelse
                </select>
            </li>

            <li  style="background:none;display:flex;align-items:center;" >
                <button class="my-new-btn" wire:click="search">
                    <img src="/assets/images/product/large-size/finder.png">
                </button>
            </li>
        </ul>
    </div>
    <div class="tab-content text-charcoal pt-8" wire:loading.remove id="my-all-items">
        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
            <div class="product-grid-view row shop-img-resposive">
                @forelse ($products as $product)
                    @foreach ($product->productFittings as $productFitting)
                        <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4" style="margin-top:80px">
                            <div class="product-item"  data-bs-toggle="modal" data-bs-target="#quickModal" >
                                <div class="product-img img-zoom-effect adjusting-height">
                                    <div style="height:200px;padding:8px">
                                    <a  id="{{ $product->id }}" data-fitting="{{ $productFitting->id }}">
                                        <img  class="img-full " src="{{ $product->images->first()['img_url'] ?? 'assets/images/product/large-size/glass--1.png' }}" alt="{{ $product->part_name }}">
                                    </a>
                                    </div>
                                    <h1>Door Glass</h1>
                                    <p>Front, Passenger Side Door Glass, Green Tint, DD08491 GTYN</p>
                                    <h6>Part Number: REPF480131</h6>
                                    <h5>$34.49</h5>
                                    <div style="text-align: center;">

                                        <button>Add to Cart</button>
                                    </div>
                                </div>
                                <!-- <div class="product-content">
                                    <a class="product-name pb-1" >{{ $product->part_name ?? $product->part_number }}</a>
                                    <div class="price-box">
                                        <div class="price-box-holder">
                                           
                                            <span class="new-price text-primary">${{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <div class="product-add-action">
                                        <ul>
                                            <li>
                                                <a href="{{ route('shopingCart.addToCart', [$product->id, $productFitting->id]) }}" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                    
                                                    <img  src="assets/images/newsletter/shopping-cart (1).png"alt="">
                                                </a>
                                            </li>
                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                <a href="#" class="view-product" id="{{ $product->id }}" data-fitting="{{ $productFitting->id }}" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                   
                                                    <img  src="assets/images/newsletter/view-2.png"alt="">
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    @endforeach
                @empty
                    No Data Available
                @endforelse
                
            </div>
        </div>
    </div>
    {{ $products->links() }}
    {{-- <div class="pagination-area pt-10">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">&laquo;</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">&raquo;</a>
                </li>
            </ul>
        </nav>
    </div> --}}
</div>