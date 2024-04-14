<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJsonUploadRequest;
use App\Jobs\ExportJsonToExcel;
use App\Models\JsonUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class JsonUploadController extends Controller
{
    public function index(): View
    {
        $jsonfiles = JsonUpload::query()
            ->with('user')
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
        return view('pages.jsonuploader.index', compact('jsonfiles'));
    }

    public function create(): View
    {
        return view('pages.jsonuploader.add');
    }

    public function store(StoreJsonUploadRequest $request): RedirectResponse
    {
        // Get the original filename
        $originalFilename = $request->file('jsonfile')->getClientOriginalName();
        // Generate a unique filename
        do {
            $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $request->file('jsonfile')->getClientOriginalExtension();
        } while (JsonUpload::query()->where('file_name', $filename)->exists());
        $path = $request->file('jsonfile')->storeAs('jsonfile', $filename);
        JsonUpload::create([
            'user_id' => auth()->id(),
            'file_name' => $filename,
            'path' => $path,
        ]);

        return to_route('json-upload.index')->with('success', 'File uploaded');
    }

    public function export(JsonUpload $json): RedirectResponse
    {
        ExportJsonToExcel::dispatch($json);
        return to_route('json-upload.index')->with('success', 'File added in queue to download');
    }

    public function download(JsonUpload $json)
    {
        $name = Str::replace('.json', '.xlsx', $json->file_name);
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $name . '"',
        ];
        return Storage::download("jsonfile/{$name}", $name, $headers);
    }
}
