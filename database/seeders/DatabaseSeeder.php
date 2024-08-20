<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemType;
use App\Models\Item;
use App\Models\Sale;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $konsumsi = ItemType::create(['type_name' => 'Konsumsi']);
        $pembersih = ItemType::create(['type_name' => 'Pembersih']);

        $kopi1 = Item::create(['name' => 'Kopi', 'stock' => 100, 'type_id' => $konsumsi->id]);
        Sale::create(['item_id' => $kopi1->id, 'sold_amount' => 10, 'transaction_date' => '2021-05-01']);

        $teh1 = Item::create(['name' => 'Teh', 'stock' => 100, 'type_id' => $konsumsi->id]);
        Sale::create(['item_id' => $teh1->id, 'sold_amount' => 19, 'transaction_date' => '2021-05-05']);

        $kopi2 = Item::create(['name' => 'Kopi', 'stock' => 90, 'type_id' => $konsumsi->id]);
        Sale::create(['item_id' => $kopi2->id, 'sold_amount' => 15, 'transaction_date' => '2021-05-10']);

        $pastaGigi = Item::create(['name' => 'Pasta Gigi', 'stock' => 100, 'type_id' => $pembersih->id]);
        Sale::create(['item_id' => $pastaGigi->id, 'sold_amount' => 20, 'transaction_date' => '2021-05-11']);

        $sabunMandi = Item::create(['name' => 'Sabun Mandi', 'stock' => 100, 'type_id' => $pembersih->id]);
        Sale::create(['item_id' => $sabunMandi->id, 'sold_amount' => 30, 'transaction_date' => '2021-05-11']);

        $sampo = Item::create(['name' => 'Sampo', 'stock' => 100, 'type_id' => $pembersih->id]);
        Sale::create(['item_id' => $sampo->id, 'sold_amount' => 25, 'transaction_date' => '2021-05-12']);

        $teh2 = Item::create(['name' => 'Teh', 'stock' => 81, 'type_id' => $konsumsi->id]);
        Sale::create(['item_id' => $teh2->id, 'sold_amount' => 5, 'transaction_date' => '2021-05-12']);
    }
}
