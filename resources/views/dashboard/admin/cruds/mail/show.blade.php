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
                    <i class=" far fa-envelope"></i> &nbsp {{$mail->title}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-8 invoice-col box1">

                <div class="text-md mt-3">
                    {{$mail->getTitle()}}
                </div>


                <div class="text-md mt-3">
                    
                    <img width="250" height="300" src="{{ asset( "/storage/imgs/".$mail->getLogo())}}" alt="" srcset=""> 


                </div>


                <div class="text-md mt-3">
                   <img width="250" height="300" src="{{ asset( "/storage/imgs/".$mail->getImage())}}" alt="" srcset=""> 
                </div>

                <div class="text-md mt-3">
                    {!!$mail->getText() !!}
                </div>

                <div class="text-md mt-3">
                      <a  class="btn btn-primary" href="{{$mail->getButton()}}">Button </a>
                </div>
               


                <div class="text-left mt-3">

                    <a class="btn btn-outline-primary"
                        href="{{route('mails.component' , ['mail'=>$mail->id])}}">Add Compoent</a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection