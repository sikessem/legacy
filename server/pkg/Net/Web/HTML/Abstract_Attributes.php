<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Attributes implements Attributes_Interface {

  public function __construct(array $list) {

    $this->setAttributes($list);
  }
}