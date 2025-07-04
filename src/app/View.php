<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;
use Twig\Environment;

class View
{
    protected Environment $twig;

    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
        $this->twig = App::twig();
    }

    /**
     * Late static binding to create a new View instance.
     *
     * @param string $view The name of the view file (without extension).
     * @param array $params Optional parameters to pass to the view.
     * @return static
     */
    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    /**
     * Renders the view by including the corresponding PHP file.
     *
     * @return string The rendered view content.
     * @throws ViewNotFoundException If the view file does not exist.
     */
    public function render(): string
    {
        $viewName = $this->view . '.html.twig';
        return $this->twig->render($viewName, $this->params);
    }

    /**
     * Magic method to convert the View instance to a string.
     *
     * @return string The rendered view content.
     */
    public function __toString()
    {
        return $this->render();
    }
}
