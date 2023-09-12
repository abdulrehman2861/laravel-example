<div>

    <div class="padding-class card" wire:loading.delay.longer wire:loading.flex>
        <div  class="spinner-border justify-content-center mx-auto"
            role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    @if (!empty($products))
    <div class="card-body shadow"  wire:loading.remove>
        <ul class="list-group list-group-flush">

            @forelse ($products as $product)
                @foreach ($product->productFittings as $productFitting)
                    <li class="list-group-item list-group-item-action">
                        <a wire:click.prevent="$emit('globalSelectedProduct',{{ $productFitting->id }})" href="#">
                            {{ $productFitting->yearFrom?->name }} - {{ $productFitting->yearFrom?->name }},{{ $productFitting->car?->carCompany?->name }},{{ $productFitting->car?->name }},{{ $productFitting->glass?->name }} | {{ $product->part_number }} ( {{ $productFitting->car?->carCompany?->name }} | {{ $productFitting->car?->carCompany?->name }} | {{ $productFitting->bodyStyle?->name }} | {{ $productFitting->glass?->name }}
                            | {{ $productFitting->feature?->name }})
                        </a>
                        <a href="{{route('dashboard.product.edit',$product->id)}}"
                            class="btn btn-info btn-sm m-1">
                            <img src="\assets\images\dashboard\search\pen (2).png">
                        </a>


                    </li>
                @endforeach

            @empty
                <li class="list-group-item list-group-item-action text-center">
                    No Data Available
                </li>
            @endforelse

            {{-- <li class="list-group-item list-group-item-action">
                <a wire:click="resetQuery"
                    wire:click.prevent=" selectProduct({&quot;id&quot;:12778,&quot;product_name&quot;:&quot;2008,BMW,535,Windshield&quot;,&quot;product_part_number&quot;:&quot;FW02993 GGY  &quot;,&quot;interchange_part_name&quot;:&quot;&quot;,&quot;product_shelf_number&quot;:&quot;&quot;,&quot;product_barcode_symbology&quot;:null,&quot;product_quantity&quot;:5,&quot;product_cost&quot;:0,&quot;product_price&quot;:55,&quot;product_unit&quot;:null,&quot;product_stock_alert&quot;:null,&quot;product_order_tax&quot;:null,&quot;product_tax_type&quot;:null,&quot;product_note&quot;:null,&quot;suppliers_id&quot;:0,&quot;category_id&quot;:0,&quot;subcategories_id&quot;:0,&quot;years_id&quot;:25,&quot;models_id&quot;:333,&quot;makers_id&quot;:20,&quot;bodystyles_id&quot;:8,&quot;glasses_id&quot;:5,&quot;features_id&quot;:963,&quot;part_id&quot;:1961,&quot;product_interchange_part_number&quot;:null,&quot;warehouse_id&quot;:0,&quot;created_at&quot;:&quot;2022-07-19T03:55:38.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-01-08T15:52:07.000000Z&quot;,&quot;media&quot;:[]}) "
                    href="#">
                    2008 - 2008,BMW,535,Windshield | FW02993 GGY ( BMW | 535 | 4 Door Sedan | Windshield
                    | Windshield with
                    Condensation Sensor, Lane Departure Warning System, Rain Sensor and Solar Coated )
                </a><a href="https://inventory.allstateautoglassinc.com/products/12778/edit"
                    class="btn btn-info btn-sm m-1">
                    <img src="\assets\images\dashboard\search\pen (2).png">
                </a>


            </li> --}}





            <li class="list-group-item list-group-item-action text-center">
                <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                    Load More <i class="bi bi-arrow-down-circle"></i>
                </a>
            </li>
        </ul>
    </div>
    @endif
</div>
