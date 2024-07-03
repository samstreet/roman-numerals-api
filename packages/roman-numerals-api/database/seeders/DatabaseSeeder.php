<?php

namespace Database\Seeders;

use App\Services\IntegerConverterInterface;
use App\Storage\Entity\Conversion;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $min = 1;
        $max = 3999;
        for($i = 1; $i <= 1000; $i++) {
            $value = rand($min, $max);
            (new Conversion([
                'integer' => $value,
                'numeral' => app(IntegerConverterInterface::class)->convertInteger($value),
                'converted_at' => $this->randomDateInRange(now()->subDays(rand(1, 50)), now()),
            ]))->save();
        }
    }

    private function randomDateInRange(DateTime $start, DateTime $end): DateTime
    {
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }
}
