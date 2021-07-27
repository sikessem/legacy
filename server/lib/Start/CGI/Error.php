<?php namespace Start\CGI;

use \Start\Error as GeneralError;

class Error extends GeneralError {

  const BAD_METHOD = 0x001;

  const NO_ACTION  = 0x002;
}
