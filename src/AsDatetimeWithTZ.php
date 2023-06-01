<?php

namespace Codewiser\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AsDatetimeWithTZ implements CastsAttributes
{
    protected function appTimezone(): \DateTimeZone
    {
        try {
            return new \DateTimeZone(config('app.timezone', 'UTC'));
        } catch (\Exception) {
            return new \DateTimeZone('UTC');
        }
    }

    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        if (is_null($value)) {
            return null;
        }

        return Carbon::parse($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        if (is_null($value)) {
            return null;
        }

        if (is_numeric($value)) {
            $value = Carbon::createFromTimestamp($value);
        }

        if (is_string($value)) {
            $value = Carbon::parse($value);
        }

        if ($value instanceof \DateTimeInterface) {
            $value = $value->setTimezone($this->appTimezone());
        }

        return $value;
    }
}
