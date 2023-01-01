<?php

namespace App\Exports;

use App\Models\NstTicket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class NstExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NstTicket::with('user')->get();
    }


    /**
     * ! param di fungsi jangan ditambah tipe, nanti tidak
     * ! kompatibel dengan interface
     * 
     * @param NstTicket $tickets
     *
     * @return array
     */
    public function map($tickets): array
    {
        return [
            $tickets->user_id,
            $tickets->user->name,
            $tickets->user->email,
            $tickets->user->phone,
            $tickets->created_at,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'user_id',
            'name',
            'email',
            'phone',
            'created_at',
        ];
    }

    /**
     * Bind value to a cell.
     *
     * @param Cell $cell Cell to bind value to
     * @param mixed $value Value to bind in cell
     *
     * @return bool
     */
    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }
}
