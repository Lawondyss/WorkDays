<?php
/**
 * @author Ladislav Vondráček <lad.von@gmail.com>
 */

namespace WorkDays;

interface Exception
{
}


class InvalidDateTimeFormatException extends \DomainException implements Exception
{
}


class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
}
