<form action="enhanced-results.html">


    <div class="pt-2">
        <div class="">
            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input wire:model="searchKey" type="text" class="form-control" placeholder="Type product name or code" aria-label="Product"
                    aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="border p-4 mb-2">

            <h6 style="color:black">Vehicle Information</h6>
            <div class="row row-sm mg-b-20">
                <div class="col-lg-4">
                    <p class="mg-b-10">years</p>
                    <select wire:model="year" class="form-control select2">

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
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">Make</p>
                    <select wire:model="make" class="form-control select2-with-search">

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
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">Model </p>
                    <select wire:model="model" class="form-control select2">

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
                </div><!-- col-4 -->


            </div>

            <div class="row row-sm mg-b-20 mg-t-20" style="margin-top:30px;">
                <div class="col-lg-4">
                    <p class="mg-b-10">Body Style</p>
                    <select wire:model="bodyStyle" class="form-control select2">

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
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-50 mg-lg-t-0">
                    <p class="mg-b-10">Glass</p>
                    <select wire:model="glass" class="form-control select2-with-search">
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
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">Feature </p>
                    <select wire:model="feature" class="form-control select2">

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
                </div><!-- col-4 -->




            </div>

        </div>
    </div>




</form>
