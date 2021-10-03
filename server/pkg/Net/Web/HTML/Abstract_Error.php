<?php
namespace SIKessEm\Net\Web\HTML;

use SIKessEm\Error\Exception;

abstract class Abstract_Error extends Exception implements Error_Interface {
    const INVALID_NAME = 0x00001;
}