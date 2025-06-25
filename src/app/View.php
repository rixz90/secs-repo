<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {}

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
        $viewPath = $_ENV['VIEW_PATH'] . '/' . $this->view . '.View.php';

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException($viewPath);
        }

        // foreach ($this->params as $key => $value) {
        //     $$key = $value; // Extract parameters to local scope
        // }   
        extract($this->params); // Extract parameters to local scope

        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
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

    /**
     * Magic method that handle the retrieval of inaccessible or non-existent properties of an object 
     *
     * @param string $name The name of the parameter.
     * @return string|null The value of the parameter or null if not set.
     */
    public function __get(string $name): string | null
    {
        return $this->params[$name] ?? null;
    }
}
