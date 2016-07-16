@extends('dashboard')

@section('content')
<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::model($stream, ['route' => ['admin.streams.update', $stream->id], 'method' => 'patch']) !!}

    @form_maker_object($stream, FormMaker::getTableColumns('streams'))

    {!! Form::submit('Update') !!}

    {!! Form::close() !!}
</div>
@stop
