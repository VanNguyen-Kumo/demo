<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {

        $ext    = $request->thumbnail_url->getClientOriginalName();
        $request->thumbnail_url->move(public_path('images'),$ext);
        $image = $request->validated();
        $image['thumbnail_url'] = $ext;
        Video::query()->create($image);
        return redirect(config('constants.locale').'/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale,$id)
    {

        $video = Video::query()->where('id',$id)->first();
        return view('video.edit')->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request,$locale, $id)
    {

        $ext    = $request->thumbnail_url->getClientOriginalName();
        $request->thumbnail_url->move(public_path('images'),$ext);
        $image = $request->validated();
        $image['thumbnail_url'] = $ext;
         Video::query()->where('id',$id)->update($image);
        return Redirect(config('constants.locale').'/admin')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$id)
    {

        $video = Video::query()->find($id);
        $video->delete();
        //Video::where('id',$id)->delete();
        return redirect(config('constants.locale').'/admin');
    }
}
