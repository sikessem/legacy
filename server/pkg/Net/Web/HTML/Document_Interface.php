<?php
namespace SIKessEm\Net\Web\HTML;

interface Document_Interface extends Component_Interface {
    public function getType(): string;
    public function getRoot(): Element_Interface;
}