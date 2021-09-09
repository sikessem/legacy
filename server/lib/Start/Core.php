<?php namespace Start;

class Core extends Settings {

  /**
   * @param string $root The root directory of the program
   * @param array $settings The program settings
   */
  public function __construct(string $root, array $options) {
    if(empty($root))
      throw new \InvalidArgumentException('Empty root given');

    if(in_array($root, ['.', '..']) || preg_match('/^\.{1,2}(\/|\\\\)/U', $root))
      throw new \InvalidArgumentException('Give an absolute path');

    if(!is_dir($root) || !is_readable($root))
      throw new \RuntimeException("Cannot use $root as the program folder (it is not a directory or it is unreadable)");

    if(!is_dir($root))
      throw new \InvalidArgumentException("No such directory $root");

    $options['root'] = $this->root = realpath($root) . DIRECTORY_SEPARATOR;
    parent::__construct($options);
    $this->time = hrtime(true);
  }

  function path(string $name): string {
    if(file_exists($path = $this->root . $name)) {
      $path = realpath($path);
      if(is_dir($path))
        $path .= DIRECTORY_SEPARATOR;
    }
    return $path;
  }

  /**
   * @var int The boot time of the core
   */
  protected int $time;

  /**
   * @return float The elapsed time in milliseconds
   */
  public function time(): float {
    return (hrtime(true) - $this->time)/1e+6;
  }
}
