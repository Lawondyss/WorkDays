<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDays;

use ICal\Event;
use ICal\ICal;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\SmartObject;
use WorkDays\Enum\CountriesEnum;

class Loader
{
  use SmartObject;

  /** @var array */
  private $dateTimeFormats = ['Ymd\THis\Z', 'Ymd'];

  /** @var Cache */
  private $cache;


  public function __construct(IStorage $cacheStorage)
  {
    $this->cache = new Cache($cacheStorage, __CLASS__);
  }


  /**
   * @param CountriesEnum $country
   * @return array [Y-m-d => holiday_name]
   */
  public function getHolidays(CountriesEnum $country): array
  {
    return $this->cache->load($country->getValue(), function() use ($country) {
      return $this->loadForCountry($country);
    });
  }


  /**
   * @param CountriesEnum $country
   * @return array [Y-m-d => holiday_name]
   * @throws InvalidDateTimeFormatException
   */
  private function loadForCountry(CountriesEnum $country): array
  {
    $holidays = [];
    $iCal = new ICal($country->getValue());
    $events = $iCal->sortEventsWithOrder($iCal->events());
    /** @var Event $event */
    foreach ($events as $event) {
      $dateStart = $this->createDateTimeFromEventDate($event->dtstart);
      $dateEnd = $this->createDateTimeFromEventDate($event->dtend);
      $interval = $dateEnd->diff($dateStart);
      for ($i = 0; $i < $interval->days; $i++) {
        $date = $dateStart->modify('+' . $i . 'day');
        $holidays[$date->format('Y-m-d')] = $event->summary;
      }
    }

    return $holidays;
  }


  /**
   * @param string $dateTime
   * @return \DateTimeImmutable
   * @throws InvalidDateTimeFormatException
   */
  private function createDateTimeFromEventDate(string $dateTime): \DateTimeImmutable
  {
    foreach ($this->dateTimeFormats as $format) {
      $created = \DateTimeImmutable::createFromFormat($format, $dateTime);
      if ($created !== false) {
        return $created;
      }
    }

    throw new InvalidDateTimeFormatException(sprintf('Unknow date format of "%s"', $dateTime));
  }
}
