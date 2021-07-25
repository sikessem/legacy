<?php namespace Start;

class Core {
  public function __construct(string $root) {
    if(empty($root))
      throw new \InvalidArgumentException('Empty root given');

    if(in_array($root, ['.', '..']) || preg_match('/^\.{1,2}(\/|\\\\)/U', $root))
      throw new \InvalidArgumentException('Give an absolute path');

    if(!is_dir($root))
      throw new \InvalidArgumentException("No such directory $root");

    $this->root = realpath($root) . DIRECTORY_SEPARATOR;
    $this->time = hrtime(true);
  }

  protected string $root;

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

  public function __get(string $name): mixed {
    if(property_exists($this, $name))
      return $this->$name;
  }
}
