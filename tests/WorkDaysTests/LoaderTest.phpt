<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDaysTests;

require_once __DIR__ . '/../bootstrap.php';

use Nette;
use Tester;
use Tester\Assert;
use WorkDays;

/**
 * @testCase WorkDaysTests\LoaderTest
 */
class LoaderTest extends Tester\TestCase
{
  public function testGetHolidays()
  {
    $loader = new WorkDays\Loader(new Nette\Caching\Storages\DevNullStorage);
    $holidays = $loader->getHolidays(CountriesEnumMock::TEST());
    Assert::type('array', $holidays);
    Assert::true(count($holidays) === 1);
    Assert::equal('2017-08-22', key($holidays));
    Assert::equal('Testing holiday', current($holidays));
  }
}


(new LoaderTest())->run();
