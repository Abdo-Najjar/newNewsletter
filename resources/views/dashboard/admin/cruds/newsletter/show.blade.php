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
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-copy"></i> &nbsp {{$newsletter->name}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-8 invoice-col">

                <div class="text-md mt-3">
                    <strong>Name:</strong>
                    <article>{{$newsletter->name}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Description:</strong>
                    <article>{{$newsletter->description}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Status:</strong>
                    <article>{{$newsletter->active}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Created at:</strong>
                    <p>{{$newsletter->created_at}}</p>
                </div>

                <div class="text-md mt-2">
                    <strong>Updated at:</strong>
                    <article>{{$newsletter->updated_at}}</article>
                </div>



                <div class="mt-3">
                    <div class="d-inline-block m-2">
                        <a href="{{  route('newsletters.users' , ['newsletter'=>$newsletter->id]) }}"
                            class="btn btn-outline-primary note-btn-primary">Show Users</a>
                    </div>

                    <div class="d-inline-block m-2">
                        <a href="{{ route('newsletters.mails' , ['newsletter'=>$newsletter->id]) }}"
                            class="btn btn-outline-primary note-btn-primary">Show mails</a>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>
</div>

@endsection