<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Staff;
use App\Models\MenuItem;

class AttachImageUrls extends Command
{
    protected $signature = 'fix:attach-image-urls';
    protected $description = 'Attach image URLs to staff and menu_items based on ID';

    public function handle()
    {
        Staff::all()->each(function ($staff) {
            $staff->image_url = "/storage/images/staff/{$staff->id}.webp";
            $staff->save();
        });

        MenuItem::all()->each(function ($item) {
            $item->image_url = "/storage/images/menu/{$item->id}.webp";
            $item->save();
        });

        $this->info('✅ Image URLs successfully attached.');
    }
}
