<?php namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Administrator',
            'email' => 'admin@qadrlabs.com',
            'password' => password_hash('rahasia', PASSWORD_BCRYPT),
        ];

        $this->db->table('users')->insert($data);
    }
}