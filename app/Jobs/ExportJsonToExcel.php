<?php

namespace App\Jobs;

use App\Exports\JsonExport;
use App\Models\JsonUpload;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ExportJsonToExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected $json
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $jsonToArray = Storage::json($this->json->path);
        $filename = Str::replace('.json', '.xlsx', $this->json->file_name);
        $export = new JsonExport($jsonToArray);
        Excel::store($export, "jsonfile/{$filename}");
        JsonUpload::findOrFail($this->json->id)->update([
            'status' => 1
        ]);
    }
}
