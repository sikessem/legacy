<?php

declare(strict_types=1);

namespace Sikessem;

class Url implements \Stringable
{
    protected ?Scheme $scheme = null;

    protected ?string $host = null;

    protected ?int $port = null;

    protected ?string $user = null;

    protected ?string $pass = null;

    protected ?string $path = null;

    protected ?Query $query = null;

    protected ?string $fragment = null;

    public function __construct(string $value)
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public static function fromGlobals(): self
    {
        return new self($_SERVER['REQUEST_URI'] ?? '/');
    }

    public function setValue(string $value): self
    {
        $info = parse_url($value);

        if (isset($info['scheme'])) {
            $this->setScheme($info['scheme']);
        }

        if (isset($info['host'])) {
            $this->setHost($info['host']);
        }

        if (isset($info['port'])) {
            $this->setPort($info['port']);
        }

        if (isset($info['user'])) {
            $this->setUser($info['user']);
        }

        if (isset($info['pass'])) {
            $this->setPass($info['pass']);
        }

        if (isset($info['path'])) {
            $this->setPath($info['path']);
        }

        if (isset($info['query'])) {
            $this->setQuery($info['query']);
        }

        if (isset($info['fragment'])) {
            $this->setFragment($info['fragment']);
        }

        return $this;
    }

    public function getValue(): string
    {
        $value = '';

        if (isset($this->scheme)) {
            $value .= $this->scheme . ':';
        }

        if (isset($this->host)) {
            $value .= '//' . $this->host;
        }

        if (isset($this->port)) {
            $value .= ':' . $this->port;
        }

        if (isset($this->user)) {
            $value .= $this->user;
            
            if (isset($this->pass)) {
                $value .= ':' . $this->pass;
            }
            
            $value .= '@';
        }

        if (isset($this->path)) {
            $value .= $this->path;
        }

        if (isset($this->query)) {
            $value .= '?' . $this->query;
        }

        if (isset($this->fragment)) {
            $value .= '#' . $this->fragment;
        }

        return $value;
    }

    public function setScheme(Scheme|string $scheme): self
    {
        $scheme = $scheme instanceof Scheme ? $scheme : new Scheme($scheme);

        $this->scheme = $scheme;

        return $this;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function setQuery(Query|string $query): self
    {
        $query = $query instanceof Query ? $query : new Query($query);

        $this->query = $query;

        return $this;
    }

    public function setFragment(string $fragment): self
    {
        $this->fragment = $fragment;

        return $this;
    }

    public function getScheme(): ?Scheme
    {
        return $this->scheme;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function getQuery(): ?Query
    {
        return $this->query;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }
}
