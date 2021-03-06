@extends('dashboard.sheared.form')


@section('form-body')



@push('css')

{{-- remove scroll from the page --}}
<style>
    body {
        overflow-y: hidden;
    }
</style>
@endpush

<div class="overflow-hidden container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                @csrf

                @php

                $input = "title";

                @endphp

                <label for="{{$input}}">Subject</label>

                <input type="text" name="{{$input}}" value="{{  old($input)!==null  ? old($input) :  $mail->{$input} }}"
                    class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter subject">

                @error($input)
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">

                @php

                $input = "content";

                @endphp

                <label for="{{$input}}">Description</label>

                <textarea id="{{$input}}" class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                    rows="3"
                    placeholder="Enter Description">{{ old($input)!==null  ? old($input) :  $mail->{$input} }}</textarea>

                @error($input)
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    {{-- hide the status select in the create page , number 2 for the check the segment 2 is create or not --}}
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label>Chose a newsletter</label>
                <div></div>
                <select class="custom-select form-control " name="newsletter_id">

                    <option disabled selected>select newsletter</option>
                    @foreach($newsletters as $newsletter)
                    <option {{$mail->newsletter_id == $newsletter->id ? 'selected' : '' }} value="{{$newsletter->id}}">
                        {{$newsletter->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
</div>
@endsection