<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="generateReport">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">From </label>
                                    <input wire:model="from" type="date"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="category_id">To </label>
                                    <input wire:model="to" type="date"
                                        class="form-control">
                                </div>

                            </div>
                        {{-- <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <span wire:target="generateReport" wire:loading=""
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i wire:target="generateReport" wire:loading.remove="" class="bi bi-shuffle"></i>
                                Filter Report
                            </button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-receipt font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$saleAmount}}</div>
                        <div class="text-uppercase font-weight-bold small ">{{$saleCount}} Sales</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-arrow-return-left font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$saleReturnAmount}}</div>
                        <div class="text-uppercase font-weight-bold small">{{$saleReturnCount}} Sale Returns</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-trophy font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$profit}}</div>
                        <div class="text-uppercase font-weight-bold small">Profit</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-bag font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$purchaseAmount}}</div>
                        <div class="text-uppercase font-weight-bold small">{{$purchaseCount}} Purchases</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-arrow-return-right font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$purchaseReturnAmount}}</div>
                        <div class="text-uppercase font-weight-bold small">{{$purchaseReturnCount}} Purchase Returns</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-wallet2 font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">${{$expense}}</div>
                        <div class="text-uppercase font-weight-bold small">Expenses</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">$616.00</div>
                        <div class="text-uppercase font-weight-bold small">Payments Received</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">$13,163.00</div>
                        <div class="text-uppercase font-weight-bold small">Payments Sent</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">$-12,547.00</div>
                        <div class="text-uppercase font-weight-bold small">Payments Net</div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
