<div>

    <div class="padding-class card" wire:loading.delay.longer wire:loading.flex>
        <div  class="spinner-border justify-content-center mx-auto"
            role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    @if (!empty($products))


        <div class="padding-class card">


            <table wire:loading.remove class="table my-search-button-table" style="margin-top:30px;">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Part No</th>
                        {{-- <th scope="col">Inter.No</th> --}}
                        <th scope="col">Shelf</th>
                        <th scope="col">Shop</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Year</th>
                        <th scope="col">Maker</th>
                        <th scope="col">Model</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        @foreach ($product->productFittings as $productFitting)
                            <tr class="background-body-color">
                                <th scope="row" class="align-middle">
                                    {{ $productFitting->yearFrom->name }},{{ $productFitting->car->carCompany->name }},{{ $productFitting->car->name }},{{ $productFitting->glass->name }}
                                </th>
                                <td class="align-middle">{{ $product->part_number }} </td>
                                {{-- <td class="align-middle">N/A</td> --}}
                                <td class="align-middle">{{ $product->shelf }}</td>

                                <td class="align-middle">{{ $product->warehouse->name ?? ''}} </td>

                                <td class="align-middle">$ {{ $product->price }}</td>
                                <td class="align-middle">{{ $product->quantity }}</td>
                                <td class="align-middle">{{ $productFitting->yearFrom->name }}</td>
                                <td class="align-middle">{{ $productFitting->car->carCompany->name }}</td>
                                <td class="align-middle">{{ $productFitting->car->name }}</td>
                                <td class="align-middle">{{ $product->supplier->name ?? 'N/A' }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('dashboard.product.edit', $product->id) }}" class="btn  btn-primary mr-2 mb-1"> <span class="fas fa-pen"></span></a>
                                    {{-- <button type="button" class="btn btn-dark">
                                        <span class="fas fa-eye"></span>
                                    </button> --}}
                                    <a onclick="confirmDelete(`{{ route('dashboard.product.destroy', $product->id) }}`)" class=" mr-2 mb-1 btn btn-danger"><span class="fas fa-trash"></span></a>
                                    <a href="{{ route('dashboard.sale.create') }}"  class="mr-2 mb-1 btn btn-info">Create Invoice</a>
                                    <a href="{{ route('dashboard.workorder.create') }}"  class=" mr-2 mb-1 btn btn-info" style="padding: 9px 17px"> Work Order</a>


                                </td>


                            </tr>
                        @endforeach

                    @empty
                        <tr class="background-body-color">
                            <td class="text-center" colspan="11">
                                No Data Available
                            </td>
                        </tr>
                    @endforelse

                    <tr>
                        <td class="text-center" colspan="11">
                            <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                Load More <i class="bi bi-arrow-down-circle"></i>
                            </a>
                        </td>
                    </tr>


                </tbody>
            </table>


        </div>
    @endif
</div>
