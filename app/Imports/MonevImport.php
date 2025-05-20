<?php

namespace App\Imports;

use App\Models\IsiMonev;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MonevImport implements ToCollection, WithStartRow
{
    protected $staf, $tahun, $form;

    public function __construct(string $staf, $tahun, $form)
    {
        $this->staf  = $staf;
        $this->tahun = $tahun;
        $this->form  = $form;
    }

    public function startRow(): int
    {
        return 3;
    }

    public function collection(Collection $rows)
    {
        $query = IsiMonev::where([
            ['form', $this->form],
            ['unit_id', $this->staf],
        ])->whereYear('tahun', date('Y', strtotime($this->tahun)))
            ->whereMonth('tahun', date('m', strtotime($this->tahun)));

        if ($query->exists()) {
            $query->delete();
        }

        foreach ($rows as $row) {
            IsiMonev::create([
                'aspek'         => $row[0]  ?? '-',
                'indikator'     => $row[1]  ?? '-',
                'kategori'      => $row[2]  ?? '-',
                'satuan'        => $row[3]  ?? '-',
                'bahan'         => $row[4]  ?? '-',
                'metode'        => $row[5]  ?? '-',
                'kriteria'      => $row[6]  ?? '-',
                'januari'       => $row[7]  ?? '-',
                'februari'      => $row[8]  ?? '-',
                'maret'         => $row[9]  ?? '-',
                'hasil_tw_I'    => $row[10] ?? '-',
                'april'         => $row[11] ?? '-',
                'mei'           => $row[12] ?? '-',
                'juni'          => $row[13] ?? '-',
                'hasil_tw_II'   => $row[14] ?? '-',
                'juli'          => $row[15] ?? '-',
                'agustus'       => $row[16] ?? '-',
                'september'     => $row[17] ?? '-',
                'hasil_tw_III'  => $row[18] ?? '-',
                'oktober'       => $row[19] ?? '-',
                'november'      => $row[20] ?? '-',
                'desember'      => $row[21] ?? '-',
                'hasil_tw_IV'   => $row[22] ?? '-',
                'catatan'       => $row[23] ?? '-',
                'pic'           => $row[24] ?? '-',
                'form'          => $this->form,
                'tahun'         => $this->tahun,
                'unit_id'       => $this->staf,
            ]);
        }
    }
}
