<?php

namespace SIKessEm\IO;

use SIKessEm\Error\Exception;

class Error extends Exception {
    const NO_DIR  = 0x00001,
          NO_FILE = 0x00002;
}