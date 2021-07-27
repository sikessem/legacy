<?php namespace Start\App\CGI;

use \Start\App\Error as GeneralError;

class Error extends GeneralError {

  const BAD_METHOD = 0x001;

  const NO_ACTION  = 0x002;
}
