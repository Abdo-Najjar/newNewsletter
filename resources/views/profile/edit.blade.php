@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")
@section('content')
<div class="card-body ">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <div class="card-body">


            <form action="{{route('profile.update')}}" method="POST" role="form" id="quickForm" novalidate="novalidate"
               enctype="multipart/form-data">
                @method('PATCH')

                <div class="form-group">
                    <div class="col-12">
                        @csrf

                        @php

                        $input = "name";

                        @endphp

                        <label for="{{$input}}">Nom </label>

                        <input type="text" name="{{$input}}" value="{{Auth::user()->$input}}"
                            class="form-control @error($input) is-invalid @enderror" id="{{$input}}"
                            placeholder="Enter name">

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-12">
                        @csrf

                        @php

                        $input = "last_name";

                        @endphp

                        <label for="{{$input}}">Prenom </label>

                        <input type="text" name="{{$input}}" value="{{Auth::user()->$input}}"
                            class="form-control @error($input) is-invalid @enderror" id="{{$input}}"
                            placeholder="Enter name">

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        @csrf

                        @php

                        $input = "dob";

                        @endphp

                        <label for="{{$input}}">Date de naissance </label>

                        <input type="date" name="{{$input}}" value="{{Auth::user()->$input}}"
                            class="form-control @error($input) is-invalid @enderror" id="{{$input}}"
                            placeholder="Enter ">

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-12">
                        @csrf

                        @php

                        $input = "email";

                        @endphp

                        <label for="{{$input}}">E-mail </label>

                        <input type="text" name="{{$input}}" value="{{Auth::user()->$input}}"
                            class="form-control @error($input) is-invalid @enderror" id="{{$input}}"
                            placeholder="Enter ">

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-12">
                        @csrf

                        @php

                        $input = "picture_url";

                        @endphp

                        <label for="profileImage">Profile Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profileImage" name="{{$input}}">
                                <label class="custom-file-label" for="profileImage">Choose file</label>
                            </div>
                        </div>

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Modifier" class="btn btn-primary">
                </div>



            </form>
        </div>
    </div>
</div>
@endsection


@push('js')


<script>

    $('#profileImage').on('change',function(){

        var fileName = $(this).val();

        fileName = fileName.replace("C:\\fakepath\\", "");
        
        $(this).next('.custom-file-label').html(fileName);
    });

</script>


@endpush