<?php

declare(strict_types=1);

namespace Setono\EasyadminEditorjsBundle\Twig;

use Setono\EditorJS\Exception\ParserExceptionInterface;
use Setono\EditorJS\Exception\RendererExceptionInterface;
use Setono\EditorJS\Parser\ParserInterface;
use Setono\EditorJS\Renderer\RendererInterface;
use Twig\Extension\RuntimeExtensionInterface;

final class Runtime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly ParserInterface $parser,
        private readonly RendererInterface $renderer,
    ) {
    }

    /**
     * @throws RendererExceptionInterface
     * @throws ParserExceptionInterface
     */
    public function render(string $json): string
    {
        return $this->renderer->render($this->parser->parse($json));
    }
}
