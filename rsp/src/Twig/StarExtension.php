<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class StarExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_stars', [$this, 'renderStars'], ['is_safe' => ['html']]),
        ];
    }

    public function renderStars(int $rating): string
    {
        $stars = str_repeat('★', $rating);
        $emptyStars = str_repeat('☆', 5 - $rating);
        return $stars . $emptyStars;
    }
}
