<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Pengajuan::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'user',
            'kolom ',
            // Tambahkan header kolom sesuai dengan model Anda
        ];
    }
}
