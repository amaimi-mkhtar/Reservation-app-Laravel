Class CurrentDaysCarbonMixin
{
    /**
     * Get the all dates of week
     *
     * @return array
     */
    public static function getCurrentWeekDays()
    {
        return function ($self = null) {
            // compatibility chunk
            if (!isset($self) && isset($this)) {
                $self = $this;
            }

            $startOfWeek = ($self ?: static::now())->startOfWeek()->subDay();
            $weekDays = array();

            for ($i = 0; $i < static::DAYS_PER_WEEK; $i++) {
                $weekDays[] = $startOfWeek->addDay()->startOfDay()->copy();
            }

            return $weekDays;
        };
    }

    /**
     * Get the all dates of month
     *
     * @return array
     */
    public static function getCurrentMonthDays()
    {
        return function ($self = null) {
            // compatibility chunk
            if (!isset($self) && isset($this)) {
                $self = $this;
            }

            $startOfMonth = ($self ?: static::now())->startOfMonth()->subDay();
            $endOfMonth = ($self ?: static::now())->endOfMonth()->format('d');
            $monthDays = array();

            for ($i = 0; $i < $endOfMonth; $i++)
            {
                $monthDays[] = $startOfMonth->addDay()->startOfDay()->copy();
            }

            return $monthDays;
        };
    }
}

Carbon::mixin(new CurrentDaysCarbonMixin());

function dumpDateList($dates) {
    echo substr(implode(', ', $dates), 0, 100).'...';
}

dumpDateList(Carbon::getCurrentWeekDays());                       // 2018-06-18 00:00:00, 2018-06-19 00:00:00, 2018-06-20 00:00:00, 2018-06-21 00:00:00, 2018-06-22 00:00...
dumpDateList(Carbon::getCurrentMonthDays());                      // 2018-06-01 00:00:00, 2018-06-02 00:00:00, 2018-06-03 00:00:00, 2018-06-04 00:00:00, 2018-06-05 00:00...
dumpDateList(Carbon::now()->subMonth()->getCurrentWeekDays());    // 2018-05-21 00:00:00, 2018-05-22 00:00:00, 2018-05-23 00:00:00, 2018-05-24 00:00:00, 2018-05-25 00:00...
dumpDateList(Carbon::now()->subMonth()->getCurrentMonthDays());   // 2018-05-01 00:00:00, 2018-05-02 00:00:00,