@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ( Auth::user()->jabatan->name == "ADMIN" || Auth::user()->jabatan->name == "MARKETING")
            <div class="col-md-12">
                <div class="card mt-3 tab-card">
                    <div class="card-header tab-card-header">
                        <ul class="nav nav-tabs nav-pills card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Jadwal Marketing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Buat Jadwal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                            @include('jadwal.list')
                        </div>
                        <div class="tab-pane fade p-3 show active" active id="two" role="tabpanel" aria-labelledby="two-tab">
                            @include('jadwal.create')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
