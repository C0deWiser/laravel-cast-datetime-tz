<?php

namespace Tests;

use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

class DatetimeTest extends TestCase
{
    public function testStringWithoutTZ()
    {
        $ent = new Entity();

        $datetime = '2023-05-12T15:00:00';
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq(Carbon::parse($datetime)));
    }

    public function testStringWithZ()
    {
        $ent = new Entity();

        $datetime = '2023-05-12T15:00:00Z';
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq(Carbon::parse($datetime)));
    }

    public function testStringWithTZ()
    {
        $ent = new Entity();

        $datetime = '2023-05-12T15:00:00+07:00';
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq(Carbon::parse($datetime)));
    }

    public function testDatetimeWithoutTZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00');
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq($datetime));
    }

    public function testDatetimeWithZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00Z');
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq($datetime));
    }

    public function testDatetimeWithTZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00+07:00');
        $ent->tested_at = $datetime;
        $this->assertTrue($ent->tested_at->eq($datetime));
    }
}
