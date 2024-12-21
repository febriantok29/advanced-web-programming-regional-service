<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Models\Master\Customer;
use Carbon\Carbon;

class ContentExport implements FromCollection, WithColumnWidths, WithHeadings, WithColumnFormatting
{
    protected $headerTitle = [
        'Kode',
        'Nama',
        'Regional',
        'Alamat',
        'No. Telepon',
        'Email',
        'Dibuat Pada',
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $customers = Customer::all();

        $data = [];

        foreach ($customers as $customer) {
            $data[] = [
                $this->headerTitle[0] => $customer->code,
                $this->headerTitle[1] => $customer->name,
                $this->headerTitle[2] => $customer->regional ? $customer->regional->name : 'N/A',
                $this->headerTitle[3] => $customer->address,
                $this->headerTitle[4] => $customer->phone,
                $this->headerTitle[5] => $customer->email,
                $this->headerTitle[6] => Carbon::parse($customer->created_at)->format('l, d F Y H:i:s'),
            ];
        }

        return collect($data);
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 15,
            'D' => 30,
            'E' => 15,
            'F' => 25,
            'G' => 20,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return $this->headerTitle;
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
