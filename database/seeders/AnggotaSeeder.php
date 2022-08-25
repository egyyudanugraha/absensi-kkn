<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = [
            [   "created_at" => now(),
                "nama" => "Vera Nanda Inayah",
                "nim" => "1961201209",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Ahmad Mulyana",
                "nim" => "19612011092",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Muhammad andreas dwi nugroho",
                "nim" => "1961201910",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Serina Devriani",
                "nim" => "1961201756",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Suci putri Priyadi",
                "nim" => "1961201681",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Dodi dwi arlan",
                "nim" => "1961201115",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Risma Adzaniastuti",
                "nim" => "1961201835",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Ade Kristian",
                "nim" => "1961201114",
                "prodi" => "Manajemen",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Egy Yuda Nugraha",
                "nim" => "1955201232",
                "prodi" => "Teknik Informatika",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Bagus Farhan Kirana",
                "nim" => "1955201258",
                "prodi" => "Teknik Informatika",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Maulana Anwar",
                "nim" => "1955201211",
                "prodi" => "Teknik Informatika",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Chandra Darmawan",
                "nim" => "1955201249",
                "prodi" => "Teknik Informatika",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Azi Miftahul Mubarok",
                "nim" => "1821201029",
                "prodi" => "Teknik Mesin",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Way Halom Putri Pahonaan",
                "nim" => "1986208032",
                "prodi" => "Pend. Agama Islam",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Siti Julaeha",
                "nim" => "1986208208",
                "prodi" => "Pend. Agama Islam",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Alifatu Zahidah",
                "nim" => "1970201092",
                "prodi" => "Ilmu Komunikasi",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Ramadhan M",
                "nim" => "1970201197",
                "prodi" => "Ilmu Komunikasi",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Muhammad insan kamil prastya budi utomo",
                "nim" => "1970201112",
                "prodi" => "Ilmu Komunikasi",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Ernawati Listian",
                "nim" => "1988201116",
                "prodi" => "Pend. Bahasa Indonesia",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Intan Alvianty",
                "nim" => "1988203077",
                "prodi" => "Pend. Bahasa Inggris",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Tuti Hamidatu",
                "nim" => "1988203069",
                "prodi" => "Pend. Bahasa Inggris",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Dea Oktaviani Yoranda",
                "nim" => "1986206172",
                "prodi" => "PGSD",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Salsa Billah",
                "nim" => "1986206182",
                "prodi" => "PGSD",
                "updated_at" => now()
            ],
            [   "created_at" => now(),
                "nama" => "Universitas Muhammadiyah Tangerang",
                "nim" => "1912",
                "prodi" => "UMT",
                "updated_at" => now()
            ]
        ];

        DB::table('anggotas')->insert($anggota);
    }
}
