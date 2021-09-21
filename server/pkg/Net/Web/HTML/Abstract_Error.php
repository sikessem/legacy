<?php
namespace SIKessEm\Net\Web\HTML;

abstract class Abstract_Error extends \Exception implements Error_Interface {
    const INVALID_NAME = 0x00001;
}