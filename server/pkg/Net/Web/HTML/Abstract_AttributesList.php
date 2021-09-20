<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_AttributesList implements AttributesList_Interface {

  public function __construct(array $list) {

    $this->setAttributes($list);
  }
}