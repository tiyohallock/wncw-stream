@extends('dashboard')

@section('content')
<div class="container">

    <div class="">
        {{ Session::get('message') }}
    </div>

    <div class="row">
        <div class="pull-right">
            {!! Form::open(['url' => 'admin/streams/search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Streams</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.streams.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($streams->isEmpty())
            <div class="well text-center">No streams found.</div>
        @else
            <table class="table table-striped raw-margin-top-24">
                <thead>
                    <th>Name</th>
                    <th >Action</th>
                </thead>
                <tbody>
                @foreach($streams as $stream)
                    <tr>
                        <td>
                        
                            <a href="{!! route('admin.streams.edit', [$stream->id]) !!}">{{ $stream->title }}</a>
                        </td>
                        <td>

                            <form method="post" action="{!! url('admin/streams/'.$stream->id) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure you want to delete this stream?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>

                                <a href="{!! route('admin.streams.edit', [$stream->id]) !!}" class="btn btn-warning btn-xs raw-margin-right-16"><i class="fa fa-pencil"></i> Edit</a>
                              
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $streams; !!}
            </div>
        @endif
    </div>
</div>
@stop