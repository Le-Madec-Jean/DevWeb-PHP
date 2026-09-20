<?php

class PodcastTrack extends AudioTrack
{
    public string $date;

    public function __construct(string $date_para, string $title_para, string $path)
    {
        parent::__construct($title_para, $path);
        $this->date = $date_para;
    }

    public function __tostring() : string {
        return json_encode(get_object_vars($this));
    }
}