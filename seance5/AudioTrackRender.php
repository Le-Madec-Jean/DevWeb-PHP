<?php

abstract class AudioTrackRender implements Renderer {

    public function render(int $selector): string
    {
        $res = "";
        switch ($selector) {
            case Renderer::COMPACT:
                $res = $this->render_html(Renderer::COMPACT);
                break;

            case Renderer::LONG:
                $res =$this->render_html(Renderer::LONG);
                break;

            default:
                $res = $this->render_html(Renderer::COMPACT);
                break;
        }

        return $res;
    }

   

    abstract protected function render_html(int $selector): string;

}