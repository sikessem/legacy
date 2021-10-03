<?php
namespace SIKessEm\Net\Web\HTML;

interface Filter_Interface {
  public static function sanitize(string $value): string;
  public static function validate(string $value): bool;
}