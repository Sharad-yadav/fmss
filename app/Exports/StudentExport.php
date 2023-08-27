<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport  implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect();
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'faculty',
            'batch',
            'semester',
            'section',
            'phone'
        ];
    }
}
