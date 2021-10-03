<?php
namespace SIKessEm\Net\Web\HTML;

interface Name_Interface {
  public function is(string $name): bool;
  public function getName(): string;
}