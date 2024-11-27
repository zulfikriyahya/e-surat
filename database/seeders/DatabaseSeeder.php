<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'foto' => '',
            'role' => 'superadmin',
        ]);
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'foto' => '',
            'role' => 'administrator',
        ]);
        User::factory()->create([
            'name' => 'Staf',
            'email' => 'staf@admin.com',
            'foto' => '',
            'role' => 'staf',
        ]);
        Instansi::create([
            'institusi' => 'Kementerian Agama Republik Indonesia',
            'subinstitusi' => 'Kantor Kementerian Agama Kabupaten Pandeglang',
            'instansi' => 'Madrasah Tsanawiyah Negeri 1 Pandeglang',
            'status' => 'Negeri',
            'akreditasi' => 'A',
            'alamat' => 'Jl. Raya Labuan Km. 5,7 Desa Palurahan, Kecamatan Kaduhejo, Kabupaten Pandeglang - Banten',
            'kepala_instansi' => 'H. Eman Sulaiman, S.Ag., M.Pd.',
            'nip_kepala' => '197056789012345678',
            'website' => 'www.mtsn1pandeglang.sch.id',
            'email' => 'adm@mtsn1pandeglang.sch.id',
            'telepon' => '+6289612050291',
            'logo_institusi' => '',
            'logo_instansi' => '',
            'tte' => '',
        ]);
        Jabatan::create([
            'jabatan' => 'Wakamad Kurikulum',
        ]);
        Jabatan::create([
            'jabatan' => 'Wakamad Kesiswaan',
        ]);
        Jabatan::create([
            'jabatan' => 'Wakamad Sarpras',
        ]);
        Jabatan::create([
            'jabatan' => 'Wakamad Humas',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru BK',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Matematika',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Bahasa Inggris',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Bahasa Indonesia',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Bahasa Arab',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru IPA',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru IPS',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru PJOK',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru BTQ',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Prakarya',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru PPKN',
        ]);
        Jabatan::create([
            'jabatan' => 'Guru Seni Budaya',
        ]);
        Jabatan::create([
            'jabatan' => 'Laboratorian',
        ]);
        // Pegawai::create([
        //     'nama' => 'Yahya Zulfikri',
        //     'jabatan' => 'Laboratorian',
        //     'nip' => '200001142025051001',
        //     'nuptk' => '1234567890123456',
        //     'nik' => '3601211801000001',
        //     'status' => 'PNS',
        //     'isAktif' => true,
        // ]);
    }
}
