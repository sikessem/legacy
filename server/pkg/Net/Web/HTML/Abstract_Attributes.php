<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Attributes implements Attributes_Interface {

  public function __construct(array|Attribute_Interface|Attributes_Interface $list = []) {
    $this->set($list);
  }
}