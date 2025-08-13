<?php 
 
namespace Database\Seeders; 
 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents; 
use Illuminate\Database\Seeder; 
use App\Models\User; 
use App\Models\Kategori; 
 
class DatabaseSeeder extends Seeder 
{ 
    /** 
     * Seed the application's database. 
     */ 
    public function run(): void 
    { 
        User::create([ 
            'nama' => 'Administrator', 
            'email' => 'admin@gmail.com', 
            'role' => '0',  
            'status' => 1, 
            'hp' => '0812345678901', 
            'password' => bcrypt('admin1212'), 
        ]); 
       
        User::create([ 
            'nama' => 'Bizar Malik', 
            'email' => 'Bizarmalik@gmail.com', 
            'role' => '1', 
            'status' => 1, 
            'hp' => '081234567892', 
            'password' => bcrypt('bizarmalik24'), 
        ]); 
        
        User::create([
            'nama' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'role' => '1', // 1 = SuperAdmin
            'status' => 1,
            'hp' => '081234567893',
            'password' => bcrypt('superadmin1212'),
        ]);

        #data kategori
        Kategori::create([
            'nama_kategori' => 'Kue Basah Tradisional',
        ]);

        Kategori::create([
            'nama_kategori' => 'Kue Kering & Cookies',
        ]);

        Kategori::create([
            'nama_kategori' => 'Roti Manis',
        ]);

        Kategori::create([
            'nama_kategori' => 'Roti Tawar',
        ]);

        Kategori::create([
            'nama_kategori' => 'Dessert Box',
        ]);

        Kategori::create([
            'nama_kategori' => 'Cakes',
        ]);

        Kategori::create([
            'nama_kategori' => 'Donat',
        ]);

        Kategori::create([
            'nama_kategori' => 'Brownies',
        ]);
    } 
} 
