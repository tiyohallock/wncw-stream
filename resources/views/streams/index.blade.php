@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
          
            
            <form id="" class="pull-right raw-margin-top-24 raw-margin-left-24" method="post" action="admin/streams/search">
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            </form>
             <a class="btn btn-primary pull-right raw-margin-top-24" style="margin-top: 25px" href="{!! route('streams.create') !!}">Add New</a>
            <h1>Stream Admin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           @if($streams->isEmpty())
            <div class="well text-center">No streams found.</div>
        @else
            <table class="table table-striped raw-margin-top-24">

                <thead>
                    <th>Name</th>
                    <th class="text-right">Actions</th>
                </thead>
                <tbody>
                     @foreach($streams as $stream)
                            <tr>
                                <td><a href="{!! route('streams.edit', [$stream->id]) !!}">{{ $stream->title }}</a></td>
                                <td>

                             <form method="post" action="{!! url('streams/'.$stream->id) !!}">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger btn-xs pull-right" type="submit" onclick="return confirm('Are you sure you want to delete this stream?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                    <a class="btn btn-warning btn-xs pull-right raw-margin-right-16" href="{!! route('streams.edit', [$stream->id]) !!}"><span class="fa fa-edit"></span> Edit</a>


                                </td>
                            </tr>
                        

                    @endforeach
                    @endif

                </tbody>

            </table>
        </div>
    </div>

@stop




