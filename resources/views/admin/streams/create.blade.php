@extends('dashboard')

@section('content')
<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::open(['route' => 'admin.streams.store']) !!}

    @form_maker_table("streams")

    {!! Form::submit('Save') !!}

    {!! Form::close() !!}

</div>
@stop