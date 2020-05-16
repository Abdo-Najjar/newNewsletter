@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')

<div class="py-4 m-3">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title??"Dashboard"}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="invoice p-3 mb-5">

        

        <div id="app">



            <div class="text-center">

                <typebutton v-for="btn in buttons"  :key="btn.id" :button="btn"></typebutton>


            </div>
            {{-- incldue the modals section --}}
            @include('dashboard.admin.cruds.mail.modals')

        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary my-4">
                    <div class="card-header ">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $dataTable->table([
                                    'class'=>'table table-bordered table-hover dataTable dtr-inline'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@push('js')

<script src="{{asset('js/app.js')}}"></script>


{!! $dataTable->scripts() !!}

@endpush