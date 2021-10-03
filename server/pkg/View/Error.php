<?php

namespace SIKessEm\View;

use SIKessEm\OO\Error as OOError;

class Error extends OOError {
    const NO_DIR  = 0x00001,
          NO_FILE = 0x00002;
}