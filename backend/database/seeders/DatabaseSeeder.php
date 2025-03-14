<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SupportTicket;
use Illuminate\Database\Seeder;
use App\Models\transactionStatus;
use Database\Seeders\OrderStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // register role seed klg nis
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            eventCategorySeeder::class,
            OrderStatus::class,
            PartnershipDetailSeeder::class,
            paymentMethodSeeder::class,
            transactionStatusSeeder::class,
            PayoutSeeder::class,
            EventSeeder::class,
            EventTicketSeeder::class,
            CouponsSeeder::class,
            OrderSeeder::class,
            TransactionsSeeder::class,
            SupportTicketSeeder::class
        ]);

    }
}
