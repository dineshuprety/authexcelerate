<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class JsonExport implements FromCollection, WithHeadings
{
    public function __construct(
        protected array $data
    )
    {
        //
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'phone',
            'address',
        ];
    }

    public function collection()
    {
        return collect($this->data);
    }
}
