<?php

namespace Database\Seeders;

use App\Models\JobStatus;
use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::create([
            'status' => 'New Job',
            'identifier' => 'new_job',
        ]);

        JobStatus::create([
            'status' => 'Assigned',
            'identifier' => 'assigned',
        ]);

        JobStatus::create([
            'status' => 'Accepted',
            'identifier' => 'accepted',
        ]);

        JobStatus::create([
            'status' => 'Rejected',
            'identifier' => 'rejected',
        ]);

        JobStatus::create([
            'status' => 'Picked Up',
            'identifier' => 'picked_up',
        ]);

        JobStatus::create([
            'status' => 'Delivered',
            'identifier' => 'delivered',
        ]);

        JobStatus::create([
            'status' => 'Cancelled',
            'identifier' => 'cancelled',
        ]);
    }
}
