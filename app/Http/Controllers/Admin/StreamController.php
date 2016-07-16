<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StreamService;
use App\Http\Requests\StreamRequest;

class StreamController extends Controller
{
    public function __construct(StreamService $streamService)
    {
        $this->service = $streamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $streams = $this->service->paginated();
        return view('admin.streams.index')->with('streams', $streams);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $streams = $this->service->search($request->search);
        return view('admin.streams.index')->with('streams', $streams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.streams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StreamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StreamRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('admin.streams.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect('streams')->with('message', 'Failed to create');
    }

    /**
     * Display the streams.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stream = $this->service->find($id);
        return view('admin.streams.show')->with('stream', $stream);
    }

    /**
     * Show the form for editing the streams.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stream = $this->service->find($id);
        return view('admin.streams.edit')->with('stream', $stream);
    }

    /**
     * Update the streams in storage.
     *
     * @param  \Illuminate\Http\StreamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StreamRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the streams from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect('admin/streams')->with('message', 'Successfully deleted');
        }

        return redirect('admin/streams')->with('message', 'Failed to delete');
    }
}
