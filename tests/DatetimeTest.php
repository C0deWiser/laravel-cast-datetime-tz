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
        $this->assertEquals(Carbon::parse($datetime), $ent->tested_at);
    }

    public function testStringWithZ()
    {
        $ent = new Entity();

        $datetime = '2023-05-12T15:00:00Z';
        $ent->tested_at = $datetime;
        $this->assertEquals(Carbon::parse($datetime), $ent->tested_at);
    }

    public function testStringWithTZ()
    {
        $ent = new Entity();

        $datetime = '2023-05-12T15:00:00+07:00';
        $ent->tested_at = $datetime;
        $this->assertEquals(Carbon::parse($datetime), $ent->tested_at);
    }

    public function testCarbonWithoutTZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }

    public function testCarbonWithZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00Z');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }

    public function testCarbonWithTZ()
    {
        $ent = new Entity();

        $datetime = Carbon::parse('2023-05-12T15:00:00+07:00');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }

    public function testDatetimeWithoutTZ()
    {
        $ent = new Entity();

        $datetime = new \DateTime('2023-05-12T15:00:00');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }

    public function testDatetimeWithZ()
    {
        $ent = new Entity();

        $datetime = new \DateTime('2023-05-12T15:00:00Z');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }

    public function testDatetimeWithTZ()
    {
        $ent = new Entity();

        $datetime = new \DateTime('2023-05-12T15:00:00+07:00');
        $ent->tested_at = $datetime;
        $this->assertEquals($datetime, $ent->tested_at);
    }
}
