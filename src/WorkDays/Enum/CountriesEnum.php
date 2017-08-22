<?php
/**
 * Sources of holidays calendars is from URL https://www.mozilla.org/en-US/projects/calendar/holidays/
 *
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDays\Enum;

use MyCLabs\Enum\Enum;

/** *
 * @method static $this ALGERIA()
 * @method static $this AUSTRIA()
 * @method static $this BELGIUM()
 * @method static $this BOLIVIA()
 * @method static $this BRAZIL()
 * @method static $this CANADA()
 * @method static $this COLOMBIA()
 * @method static $this COSTA_RICA()
 * @method static $this CZECH()
 * @method static $this FLANDERS()
 * @method static $this FRANCE()
 * @method static $this GERMANY()
 * @method static $this GREECE()
 * @method static $this HUNGARY()
 * @method static $this ICELAND()
 * @method static $this IRELAND()
 * @method static $this ITALY()
 * @method static $this JAPAN()
 * @method static $this LIECHTENSTEIN()
 * @method static $this NETHERLANDS()
 * @method static $this NICARAGUA()
 * @method static $this NORWAY()
 * @method static $this PAKISTAN()
 * @method static $this POLAND()
 * @method static $this PORTUGAL()
 * @method static $this ROMANIA()
 * @method static $this RUSSIA()
 * @method static $this SLOVAKIA()
 * @method static $this SLOVENIA()
 * @method static $this SOUTH_AFRICA()
 * @method static $this SOUTH_KOREA()
 * @method static $this SWEDEN()
 * @method static $this SWITZERLAND()
 * @method static $this TRINIDAD_AND_TOBAGO()
 * @method static $this USA()
 * @method static $this UKRAINE()
 * @method static $this URUGUAY()
 */
class CountriesEnum extends Enum
{
  const ALGERIA = 'https://www.mozilla.org/media/caldata/AlgeriaHolidays.ics';
  const AUSTRIA = 'https://www.mozilla.org/media/caldata/AustrianHolidays.ics';

  const BELGIUM = 'https://www.mozilla.org/media/caldata/BelgianHolidays.ics';
  const BOLIVIA = 'https://www.mozilla.org/media/caldata/BoliviaHolidays.ics';
  const BRAZIL = 'https://www.mozilla.org/media/caldata/BrazilHolidays.ics';

  const CANADA = 'https://www.mozilla.org/media/caldata/CanadaHolidays.ics';
  const COLOMBIA = 'https://www.mozilla.org/media/caldata/ColombianHolidays.ics';
  const COSTA_RICA = 'https://www.mozilla.org/media/caldata/CostaRicaHolidays.ics';
  const CZECH = 'https://www.mozilla.org/media/caldata/CzechHolidays.ics';

  const FLANDERS = 'https://www.mozilla.org/media/caldata/FlandersHolidays.ics';
  const FRANCE = 'https://www.mozilla.org/media/caldata/FrenchHolidays.ics';

  const GERMANY = 'https://www.mozilla.org/media/caldata/GermanHolidays.ics';
  const GREECE = 'https://www.mozilla.org/media/caldata/GreeceHolidays.ics';

  const HUNGARY = 'https://www.mozilla.org/media/caldata/HungarianHolidays.ics';

  const ICELAND = 'https://www.mozilla.org/media/caldata/IcelandHolidays.ics';
  const IRELAND = 'https://www.mozilla.org/media/caldata/IrelandHolidays2014-2021.ics';
  const ITALY = 'https://www.mozilla.org/media/caldata/ItalianHolidays.ics';

  const JAPAN = 'https://www.mozilla.org/media/caldata/JapanHolidays.ics';

  const LIECHTENSTEIN = 'https://www.mozilla.org/media/caldata/LiechtensteinHolidays.ics';

  const NETHERLANDS = 'https://www.mozilla.org/media/caldata/DutchHolidays.ics';
  const NICARAGUA = 'https://www.mozilla.org/media/caldata/NicaraguaHolidays.ics';
  const NORWAY = 'https://www.mozilla.org/media/caldata/NorwegianHolidays.ics';

  const PAKISTAN = 'https://www.mozilla.org/media/caldata/PakistanHolidays.ics';
  const POLAND = 'https://www.mozilla.org/media/caldata/PolishHolidays.ics';
  const PORTUGAL = 'https://www.mozilla.org/media/caldata/PortugalHolidays.ics';

  const ROMANIA = 'https://www.mozilla.org/media/caldata/RomaniaHolidays.ics';
  const RUSSIA = 'https://www.mozilla.org/media/caldata/RussiaHolidays.ics';

  const SLOVAKIA = 'https://www.mozilla.org/media/caldata/SlovakHolidays.ics';
  const SLOVENIA = 'https://www.mozilla.org/media/caldata/SlovenianHolidays.ics';
  const SOUTH_AFRICA = 'https://www.mozilla.org/media/caldata/SouthAfricaHolidays.ics';
  const SOUTH_KOREA = 'https://www.mozilla.org/media/caldata/SouthKoreaHolidays.ics';
  const SWEDEN = 'https://www.mozilla.org/media/caldata/SwedishHolidays.ics';
  const SWITZERLAND = 'https://www.mozilla.org/media/caldata/SwissHolidays.ics';

  const TRINIDAD_AND_TOBAGO = 'https://www.mozilla.org/media/caldata/TrinidadTobagoHolidays.ics';

  const USA = 'https://www.mozilla.org/media/caldata/USHolidays.ics';
  const UKRAINE = 'https://www.mozilla.org/media/caldata/UkraineHolidays.ics';
  const URUGUAY = 'https://www.mozilla.org/media/caldata/UruguayHolidays.ics';
}
