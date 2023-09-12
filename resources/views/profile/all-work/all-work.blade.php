@extends('profile.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" type="text/css"
    href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
@endpush
@section('content')

<div class="c-body">

    <main class="c-main">

        <div style="padding:20px">
            <div style="background:white;padding:20px 10px;border: 1px solid #d8dbe0;border-radius: 0.25rem;">

                <livewire:website.customer.workorder-list />

            </div>
        </div>

    </main>

</div>







@endsection
@push('scripts')


<script></script>
@endpush
