<?php
class App
{
    public const SEPARATOR = DIRECTORY_SEPARATOR;
    public const URL_BASE = "http://localhost:8000/";
    public const URL_APP = __DIR__  . App::SEPARATOR . ".." .
        App::SEPARATOR . "app" . App::SEPARATOR;
    public const URL_VIEW = __DIR__ . "/../public/view/";
    public const URL_HTML_PUBLIC = "/public/";
    public const URL_PUBLIC = __DIR__ . "/../public/";
    public const URL_INCLUDE = __DIR__ . "/../public/include/";
    public const URL_ASSETS = "/public/assets/";
    public const URL_UPLOADS = __DIR__ . "/../public/uploads/";
    public const URL_HTML_UPLOADS = "/public/uploads/";
}
