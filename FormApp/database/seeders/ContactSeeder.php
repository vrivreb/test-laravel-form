<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Hello, this is a test message!'
        ]);

        Contact::create([
            'name' => 'Yamada Tarou',
            'email' => 'yamadatarou@example.jp',
            'message' => '問い合わせテスト'
        ]);
    }
}
