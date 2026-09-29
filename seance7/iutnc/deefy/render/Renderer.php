<?php
namespace Seance5\Iutnc\Deefy\Render;
interface Renderer
{
    public const COMPACT = 1;
    public const LONG = 2;

    public function render(int $selector): string;
}