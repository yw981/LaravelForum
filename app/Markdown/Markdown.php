<?php
namespace App\Markdown;
class Markdown{
    protected $parser;

    /**
     * Markdown constructor.
     * @param $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text){
        return $this->parser->makeHtml($text);
    }
}