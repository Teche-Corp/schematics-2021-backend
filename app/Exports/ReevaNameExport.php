<?php


namespace App\Exports;


use DateTime;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ReevaNameExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithCustomValueBinder
{

    public function collection(): Collection
    {
        return DB::table('reeva_name')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'created_at'
        ];
    }

    /**
     * @throws Exception
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            (new DateTime($row->created_at))->format('d/M/y')
        ];
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function bindValue(Cell $cell, $value): bool
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }
}
