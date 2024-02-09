<?php


class Question {
    
    private int $id;
    private int $point;
    private string $content;
    private array $answers = [];


    public function __construct(string $content)
    {
        // $this->hydrate($content);
        $this->content = $content;
    }

    /**
    * Ce code est écrit en PHP et il se trouve dans un fichier appelé "Question.php". 
    * Il contient une fonction appelée "hydrate" qui prend un tableau de données en entrée.
    * La fonction "hydrate" est utilisée pour remplir les propriétés d'un objet avec les valeurs correspondantes du tableau de données. Cela peut être utile lorsque vous souhaitez initialiser rapidement un objet avec des données provenant d'une source externe, comme une base de données.
    * Le code utilise une boucle "foreach" pour parcourir chaque élément du tableau de données. À chaque itération de la boucle, il récupère la clé et la valeur de l'élément.
    * Ensuite, il construit le nom d'une méthode en utilisant la clé de l'élément. Par exemple, si la clé est "nom", il construit le nom de la méthode "setNom". Le préfixe "set" est ajouté à la clé et la première lettre de la clé est mise en majuscule.
    * Ensuite, il vérifie si la méthode construite existe dans l'objet en utilisant la fonction "method_exists". Si la méthode existe, cela signifie que l'objet possède une méthode correspondante pour définir la valeur de la propriété.
    * Enfin, si la méthode existe, il appelle cette méthode en utilisant la syntaxe "$this->$method($value)". Cela permet de définir la valeur de la propriété de l'objet en utilisant la méthode correspondante.
    * En résumé, ce code permet de remplir les propriétés d'un objet en utilisant les valeurs d'un tableau de données. Cela facilite l'initialisation d'un objet avec des données provenant d'une source externe.
      @link https://grafikart.fr/tutoriels/hydratation-entite-938
    */
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    public function getContent(){
        return ucfirst($this->content);
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getPoint(){
        return $this->point;
    }

    public function setPoint($point){
        $this->point = $point;
    }

    public function addAnswer(Answer $answer){
        array_push($this->answers, $answer);
    }

    public function generate(){
        echo '<h1>'. $this->content. "</h1>";
        foreach ($this->answers as $answer) {
            $answer->generate();
        }        
    }

}

