<?php

namespace App\Exports;

use App\Models\IsiMonev;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class MonevExport implements FromQuery, ShouldAutoSize, WithEvents
{
    use Exportable;

    protected string $staff;
    protected string $tahun;
    protected string $form;
    protected $user;
    protected string $tgl;

    public function __construct(string $staff, $tahun, $form, $user)
    {
        $this->staff = str_replace('Staf', '', $staff);
        $this->tahun = date('Y-m', strtotime($tahun));
        $this->form = $form;
        $this->user = $user;

        $bulanInggris = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $bulanIndonesia = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $this->tgl = str_replace($bulanInggris, $bulanIndonesia, date('F Y', strtotime($tahun)));
    }

    public function query()
    {
        return IsiMonev::select(
            'aspek',
            'indikator',
            'kategori',
            'satuan',
            'bahan',
            'metode',
            'kriteria',
            'januari',
            'februari',
            'maret',
            'hasil_tw_I',
            'april',
            'mei',
            'juni',
            'hasil_tw_II',
            'juli',
            'agustus',
            'september',
            'hasil_tw_III',
            'oktober',
            'november',
            'desember',
            'hasil_tw_IV',
            'catatan',
            'pic'
        )
            ->whereLike('tahun', '%' . $this->tahun . '%')
            ->where([['unit_id', $this->user], ['form', $this->form]])
            ->orderBy('created_at');
    }

    public function registerEvents(): array
    {
        $styleArray = [
            'font' => ['bold' => true],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '020202'],
                ],
            ],
        ];

        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->setCellValue('A1', $this->form);
                $sheet->setCellValue('A2', 'Bulan dan Tahun: ' . $this->tgl);
                $sheet->setCellValue('A3', 'Unit Kerja: ' . $this->staff);
                $sheet->setCellValue('A4', '');

                $headers = [
                    ['A5:A6', 'Aspek / Kegiatan'],
                    ['B5:B6', 'Indikator Kinerja / Sasaran Mutu'],
                    ['C5:C6', 'Kategori (Utama/Tambahan)'],
                    ['D5:D6', 'Satuan'],
                    ['E5:E6', 'Bahan Analisis'],
                    ['F5:F6', 'Metode Analisis'],
                    ['G5:G6', 'Kriteria'],
                    ['H5:W5', 'Hasil Evaluasi'],
                    ['X5:X6', 'Catatan dan Rekomendasi'],
                    ['Y5:Y6', 'PIC'],
                ];

                foreach ($headers as [$range, $value]) {
                    $sheet->mergeCells($range);
                    $sheet->setCellValue(explode(':', $range)[0], $value);
                }

                $bulan = ['Januari', 'Februari', 'Maret', 'TW I', 'April', 'Mei', 'Juni', 'TW II', 'Juli', 'Agustus', 'September', 'TW III', 'Oktober', 'November', 'Desember', 'TW IV'];
                $col = 'H';

                foreach ($bulan as $b) {
                    $sheet->setCellValue($col . '6', $b);
                    $col++;
                }
            },

            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $sheet = $event->sheet->getDelegate();

                $sheet->getStyle('A5:Y5')->applyFromArray($styleArray);
                $sheet->getStyle('A6:Y6')->applyFromArray($styleArray);

                $sheet->getStyle('A5:Y5')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $fillColor = '7FD6FD';

                foreach (['A5:Y5', 'A6:Y6'] as $range) {
                    $sheet->getStyle($range)
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB($fillColor);
                }
            },
        ];
    }
}
