<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDays;

use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\SmartObject;

class Calculator
{
  use SmartObject;

  /** @var array 1 for Monday, 2 for Tuesday ... 7 for Sunday */
  public $ignoredWeekdays = [6, 7];

  /** @var Loader */
  private $loader;

  /** @var Cache */
  private $cache;


  public function __construct(Loader $loader, IStorage $cacheStorage)
  {
    $this->loader = $loader;
    $this->cache = new Cache($cacheStorage, __CLASS__);
  }


  /**
   * @param \DateTimeInterface $dateStart
   * @param \DateTimeInterface $dateEnd
   * @param array ...$countries
   * @return int
   */
  public function countWorkDays(\DateTimeInterface $dateStart, \DateTimeInterface $dateEnd, ...$countries): int
  {
    $dates = $this->getWorkDates($dateStart, $dateEnd);
    $dates = $this->unsetHolidays($dates, $countries);

    return count($dates);
  }


  /**
   * @param \DateTimeInterface $dateStart
   * @param int $workDays
   * @param array ...$countries
   * @return \DateTimeImmutable
   */
  public function countEndDate(\DateTimeInterface $dateStart, int $workDays, ...$countries): \DateTimeImmutable
  {
    if ($workDays <= 0) {
      throw new InvalidArgumentException(sprintf('Count of workdays must be greater then zero, "%s" given', $workDays));
    }

    $dateEnd = (new \DateTimeImmutable($dateStart->format('Y-m-d')))->modify(sprintf('+%d days', $workDays));

    $countWorkDays = call_user_func_array([$this, 'countWorkDays'], [$dateStart, $dateEnd] + $countries);
    if ($countWorkDays == $workDays) {
      return $dateEnd;
    }

    for ($i = 1; $countWorkDays < $workDays; $i++) {
      $date = $dateEnd->modify(sprintf('+%d days', $i));
      if (!$this->isIgnoredWeekday($date) && !$this->isHoliday($date, $countries)) {
        $countWorkDays++;
      }
    }

    return $date;
  }


  /**
   * @param \DateTimeInterface $dateStart
   * @param \DateTimeInterface $dateEnd
   * @return array
   */
  private function getWorkDates(\DateTimeInterface $dateStart, \DateTimeInterface $dateEnd): array
  {
    $range = [];
    $date = new \DateTimeImmutable($dateStart->format('Y-m-d'));
    $interval = $dateEnd->diff($dateStart);
    for ($i = 0; $i < $interval->days; $i++) {
      $modifiedDate = $date->modify('+' . $i . 'day');
      if ($this->isIgnoredWeekday($modifiedDate)) {
        continue;
      }
      $range[] = $modifiedDate->format('Y-m-d');
    }

    return $range;
  }


  /**
   * @param \DateTimeInterface $date
   * @return bool
   */
  private function isIgnoredWeekday(\DateTimeInterface $date): bool
  {
    return in_array($date->format('N'), $this->ignoredWeekdays);
  }


  /**
   * @param \DateTimeInterface $date
   * @param array $countries
   * @return bool
   */
  private function isHoliday(\DateTimeInterface $date, array $countries): bool
  {
    $holidays = $this->cache->load($countries, function() use ($countries) {
      $holidays = [];
      foreach ($countries as $country) {
        $holidays = array_merge($holidays, $this->loader->getHolidays($country));
      }

      return $holidays;
    });

    return array_key_exists($date->format('Y-m-d'), $holidays);
  }


  /**
   * @param array $dates
   * @param array $countries
   * @return array
   */
  private function unsetHolidays(array $dates, array $countries): array
  {
    foreach ($dates as $key => $date) {
      $date = new \DateTimeImmutable($date);
      if ($this->isHoliday($date, $countries)) {
        unset($dates[$key]);
      }
    }

    return $dates;
  }
}