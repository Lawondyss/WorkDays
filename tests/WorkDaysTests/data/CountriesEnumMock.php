<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDaysTests;

use WorkDays;

/**
 * @method static $this TEST()
 */
class CountriesEnumMock extends WorkDays\Enum\CountriesEnum
{
  const TEST = __DIR__ . '/test.ics';
}
