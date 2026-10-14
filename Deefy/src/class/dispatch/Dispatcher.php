<?php
namespace iutnc\deefy\dispatch;
class Dispatcher
{
    protected ?string $action = null;
    protected $action_tab = [];
    public function __construct()
    {
        $this->action = $_GET['action'] ?? 'default';
    }
    public function addRoute(string $action, string $action_class): Dispatcher
    {
        $this->action_tab[$action] = $action_class;
        return $this;
    }
    public function run(): void
    {

        if (isset($this->action_tab[$this->action])) {


            switch ($this->action) {

                case 'add-playlist':
                    $add = new $this->action_tab['add-playlist'];
                    $this->renderPage($add->execute());
                    break;
                case 'playlist':
                    $playlist = new $this->action_tab['playlist'];
                    $this->renderPage($playlist->execute());
                    break;
                case 'default':
                    $default = new $this->action_tab['default'];
                    $this->renderPage($default->execute());
                    break;
                case 'add-track':
                    $add_track = new $this->action_tab['add-track'];
                    $this->renderPage($add_track->execute());
                    break;
                default:
                    $default = new $this->action_tab['default'];
                    $this->renderPage($default->execute());
                    break;

            }

        } else {
            
            throw new \Exception("Action '{$this->action}' not found");
        }

    }

    private function renderPage(string $html): void
    {
        echo <<<HTML
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Deefy</title>
            </head>
            <body>
                $html
            </body>
        </html>
    HTML;
    }
}