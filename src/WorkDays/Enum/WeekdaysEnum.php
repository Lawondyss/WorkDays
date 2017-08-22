<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDays\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static $this MONDAY()
 * @method static $this TUESDAY()
 * @method static $this WEDNESDAY()
 * @method static $this THURSDAY()
 * @method static $this FRIDAY()
 * @method static $this SATURDAY()
 * @method static $this SUNDAY()
 */
class WeekdaysEnum extends Enum
{
  const MONDAY = 1;
  const TUESDAY = 2;
  const WEDNESDAY = 3;
  const THURSDAY = 4;
  const FRIDAY = 5;
  const SATURDAY = 6;
  const SUNDAY = 7;
}
