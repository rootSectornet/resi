@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3 tab-card">
                    <div class="card-header tab-card-header">
                        <ul class="nav nav-tabs nav-pills card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Jadwal</a>
                            </li>
                            @if (Auth::user()->jabatan->name == "MARKETING")
                                <li class="nav-item">
                                    <a class="nav-link " id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Buat Jadwal</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active  p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                            @include('jadwal.list')
                        </div>
                        @if (Auth::user()->jabatan->name == "MARKETING")
                            <div class="tab-pane fade p-3 show " active id="two" role="tabpanel" aria-labelledby="two-tab">
                                @include('jadwal.create')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
