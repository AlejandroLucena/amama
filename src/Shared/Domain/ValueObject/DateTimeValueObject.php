<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

abstract class DateTimeValueObject
{
    protected $date;

    public function __construct($date)
    {
        $this->date = $date ? $this->inLocalTimezone($date) : null;
    }

    public function asDateFormat()
    {
        return optional($this->date)->format('M jS, Y');
    }

    public function asDateTimeFormat()
    {
        return optional($this->date)->format('H:i M jS, Y');
    }

    public function diffForHumans()
    {
        return optional($this->date)->diffForHumans();
    }

    public function toDateTimeString()
    {
        return optional($this->date)->toDateTimeString();
    }

    public function format($format)
    {
        return optional($this->date)->format($format);
    }

    protected function inLocalTimezone($date)
    {
        $timezone = optional(user())->timezone ?? config('app.local_timezone');

        return $this->asDateTime($date)->timezone($timezone);
    }

    protected function asDateTime($value)
    {
        if ($value instanceof Carbon || $value instanceof CarbonInterface) {
            return Date::instance($value);
        }

        if ($value instanceof DateTimeInterface) {
            return Date::parse(
                $value->format('Y-m-d H:i:s.u'),
                $value->getTimezone()
            );
        }

        if (is_numeric($value)) {
            return Date::createFromTimestamp($value);
        }

        if ($this->isStandardDateFormat($value)) {
            return Date::instance(Carbon::createFromFormat('Y-m-d', $value)->startOfDay());
        }

        $format = $this->getDateFormat();

        return Date::createFromFormat($format, $value);
    }

    protected function isStandardDateFormat($value)
    {
        return preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $value);
    }

    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    public function __toString()
    {
        if (is_null($this->date)) {
            return '';
        }

        return $this->date->toDateTimeString() == $this->date ? $this->date->toDateTimeString() : $this->date->toDateString();
    }
}
