<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDaysTests;

use WorkDays;

class LoaderMock extends WorkDays\Loader
{
  public function __construct()
  {
  }


  /**
   * @param array ...$countries
   * @return array
   */
  public function getHolidays(WorkDays\Enum\CountriesEnum $country): array
  {
    return ['2017-08-22' => 'Testing holiday'];
  }
}
