<?php
namespace SIKessEm\Net\Web\HTML;

interface Component_Interface extends \Stringable {

  public function render(): string;
}