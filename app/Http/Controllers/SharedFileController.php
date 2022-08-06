<?php

namespace App\Http\Controllers;

use App\Models\SharedFile;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class SharedFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharedFiles = SharedFile::all();
        return view('sharedFiles.liste', ['sharedFiles' => $sharedFiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sharedFiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = Etudiant::select('id')->where('users_id', '=', Auth::user()->id)->get();
        $etudiant = $etudiant[0];
        $request->validate([
            'titre' => 'required|min:2|max:100',
            'file'  => 'required|mimes:pdf,zip,doc,docx|max:2048'
        ]);
        $sharedFile = new sharedFile;
        $sharedFileName = time() . '_' . $request->file->getClientOriginalName();
        $sharedFilePath = $request->file('file')->storeAs('uploads/' . $etudiant->id, $sharedFileName, 'public');
        $sharedFile->fill([
            'titre'         => $request->titre,
            'file_path'     => $sharedFilePath,
            'etudiants_id'  => $etudiant->id
        ]);
        $sharedFile->save();
        return redirect(route('sharedFiles'))->with('success', 'File had been uploaded');
    }

    public function downloadSharedFile(SharedFile $sharedFile) {
        $sharedFilePath = storage_path('app/public') . "/" . $sharedFile->file_path;
        $sharedFileName = explode('/', $sharedFile->file_path);
        $sharedFileName = end($sharedFileName);
        $headers = [
            'Content-Description' => 'File Transfer',
            'Content-Type' => 'application/pdf',
        ];

         return response()->download($sharedFilePath, $sharedFileName, $headers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SharedFile  $sharedFile
     * @return \Illuminate\Http\Response
     */
    public function show(SharedFile $sharedFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SharedFile  $sharedFile
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedFile $sharedFile)
    {
        return view('sharedFiles.edit', ['sharedFile' => $sharedFile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SharedFile  $sharedFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SharedFile $sharedFile)
    {
        $request->validate([
            'titre' => 'required|min:2|max:100',
            'file'  => 'required|mimes:pdf,zip,doc,docx|max:2048'
        ]);
        $sharedFilePath = storage_path('app/public') . "/" . $sharedFile->file_path;
        if(is_file($sharedFilePath)) {
            unlink($sharedFilePath);
            $etudiant = Etudiant::select('id')->where('users_id', '=', Auth::user()->id)->get();
            $etudiant = $etudiant[0];
            $sharedFileName = time() . '_' . $request->file->getClientOriginalName();
            $sharedFilePath = $request->file('file')->storeAs('uploads/' . $etudiant->id, $sharedFileName, 'public');
            $sharedFile->update([
                'titre'     => $request->titre,
                'file_path' => $sharedFilePath
            ]);
            return redirect(route('sharedFiles'))->with('success', 'File updated with success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedFile  $sharedFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(SharedFile $sharedFile)
    {
        $sharedFilePath = storage_path('app/public') . "/" . $sharedFile->file_path;
        if(is_file($sharedFilePath)) {
            unlink($sharedFilePath);
            $sharedFile->delete();
        }
        return redirect(route('sharedFiles'))->with('success', 'File deleted from system');
    }
}