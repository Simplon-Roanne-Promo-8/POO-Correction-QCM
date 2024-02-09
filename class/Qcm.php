<?php


class Qcm {
    private array $questions = [];
    private \PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getQuestions(){
        $preparedRequest = $this->db->prepare("SELECT * FROM question");
        $preparedRequest->execute();
        $questionsArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // var_dump($questionsArray);
        // echo '</pre>';

        foreach ($questionsArray as $line) {
            $question = new Question($line['content']);
            $question->hydrate($line);

            // Chercher les reponses à mes question
            $this->getAnswers($question);

            array_push($this->questions, $question);
        }
    }


    public function getAnswers(Question $question){
        $preparedRequest = $this->db->prepare('SELECT * FROM answer WHERE question_id = ?');
        $preparedRequest->execute([
            $question->getId()
        ]);
        $answerArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        foreach ($answerArray as $line) {
            $answer = new Answer($line['content'], $line['is_good_answer']);
            $answer->setId($line['id']);
            $question->addAnswer($answer);
        }

    }

    public function addQuestion(Question $question){
        array_push($this->questions, $question);
    }

    public function generate(){
        foreach ($this->questions as $question) {
            $question->generate();
        }
    }
}