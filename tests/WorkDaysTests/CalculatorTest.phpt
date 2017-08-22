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
 * @testCase WorkDaysTests\CalculatorTest
 */
class CalculatorTest extends Tester\TestCase
{
  public function testCountWorkDays_default()
  {
    $dateStart = new \DateTime('2017-08-20');
    $dateEnd = new \DateTime('2017-08-23');

    $calculator = new WorkDays\Calculator(new LoaderMock, new Nette\Caching\Storages\DevNullStorage);
    $result = $calculator->countWorkDays($dateStart, $dateEnd, CountriesEnumMock::TEST());
    Assert::equal(2, $result);
  }


  public function testCountWorkDays_ignoredWeekdays()
  {
    $dateStart = new \DateTime('2017-08-20');
    $dateEnd = new \DateTime('2017-08-23');

    $calculator = new WorkDays\Calculator(new LoaderMock, new Nette\Caching\Storages\DevNullStorage);
    $calculator->removeIgnoredWeekday(WorkDays\Enum\WeekdaysEnum::SATURDAY())
               ->removeIgnoredWeekday(WorkDays\Enum\WeekdaysEnum::SUNDAY());
    $result = $calculator->countWorkDays($dateStart, $dateEnd, CountriesEnumMock::TEST());
    Assert::equal(3, $result);
  }


  public function testCountEndDate_default()
  {
    $dateStart = new \DateTime('2017-08-20');

    $calculator = new WorkDays\Calculator(new LoaderMock, new Nette\Caching\Storages\DevNullStorage);
    $result = $calculator->countEndDate($dateStart, 3, CountriesEnumMock::TEST());
    Assert::equal(new \DateTimeImmutable('2017-08-24'), $result);
  }


  public function testCountEndDate_ignoredWeekdays()
  {
    $dateStart = new \DateTime('2017-08-20');

    $calculator = new WorkDays\Calculator(new LoaderMock, new Nette\Caching\Storages\DevNullStorage);
    $calculator->removeIgnoredWeekday(WorkDays\Enum\WeekdaysEnum::SATURDAY())
               ->removeIgnoredWeekday(WorkDays\Enum\WeekdaysEnum::SUNDAY());
    $result = $calculator->countEndDate($dateStart, 3, CountriesEnumMock::TEST());
    Assert::equal(new \DateTimeImmutable('2017-08-23'), $result);
  }
}


(new CalculatorTest())->run();
