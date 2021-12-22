<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $file, $type, $model)
    {

        $filenameWithExt = preg_replace("/[^a-zA-Z]+/", "_", $file->getClientOriginalName());
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get size
        $size = number_format($file->getSize() * 0.000001, 2);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = trim(preg_replace('/\s+/', ' ', $filename . '_' . time() . '.' . $extension));
        // Upload File
        $path = $file->storeAs('public/' . $type, $fileNameToStore);
        $path = asset('storage/' . $type . '/' . $fileNameToStore);
        $uuid = Str::uuid()->toString();

        //upload the receipt
        $file = Files::updateOrCreate(
            [
                'name' => $fileNameToStore,
                'path' => $path,
                'ext' => $extension,
                'size' => $size,
                'type' => $type,
            ],
            [
                'uuid' => $uuid,
                'name' => $fileNameToStore,
                'path' => $path,
                'ext' => $extension,
                'author' => $request->author ?? Auth::user()->name,
                'date_posted' => $request->date_posted ?? date('Y-m-d'),
                'size' => $size,
                'type' => $type,
                'modal_id' => $model->id ,
                'modal_uuid' => $model->uuid ?? $model->id ,
                'model_type' =>  get_class($model),
            ]
        );

        return $file ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $files)
    {
        //
    }
}
