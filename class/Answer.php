<?php 


class Answer {
 
    
    private int $id;
    private string $content;
    private bool $is_good;
    const BONNE_REPONSE = true;

    public function __construct($content, $is_good = false)
    {
        $this->content = $content;        
        $this->is_good = $is_good;        
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getContent(){
        return ucfirst($this->content);
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function generate(){
        echo $this->content . "<br>";
    }
}