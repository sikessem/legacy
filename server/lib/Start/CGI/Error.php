<?php namespace Start\CGI;

use \Exception;

class Error extends Exception {

  const BAD_METHOD = 0x01;

  const NO_ACTION  = 0x02;

  const NO_SERVICE  = 0x03;
}
