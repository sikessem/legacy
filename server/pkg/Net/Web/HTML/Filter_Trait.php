<?php
namespace SIKessEm\Net\Web\HTML;

trait Filter_Trait {
  public static function sanitize(string $value): string {
    return strtolower(trim($value));
  }
  
  public static function validate(string $value): bool {
    return (bool) preg_match('/^[a-zA-Z_\x7f-\xff][-a-zA-Z0-9_\x7f-\xff]*$/', $value);
  }
}