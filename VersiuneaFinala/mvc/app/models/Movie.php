<?php

class Movie {
    private $pdo;

    private $submitted = false;

    private $errors = [];

    private $record = [];
    public function __construct($pdo, $submitted = false, array $record = [], array $errors = []) {
        $this->pdo = $pdo;
        $this->record = $record;
        $this->submitted = $submitted;
        $this->errors = $errors;
    }

    public function load(int $id){
        $stmt = $this->pdo->prepare('SELECT * FROM movies WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $record = $stmt->fetch();
        return new Movie($this->pdo, $this->submitted, $record);
    }
    public function getTree(int $id) {
        $stmt = $this->pdo->prepare('SELECT * FROM tree WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $record = $stmt->fetch();
        return $record;
    }



    public function functionMax()
    {

        try
        {
            $stmt1 = $this->pdo->prepare('SELECT MAX(id_tree1) FROM tree ');
            $stmt1->execute();
            $record = $stmt1->fetch();
            $max1=$record['MAX(id_tree1)'];

            $stmt2 = $this->pdo->prepare('SELECT MAX(id_tree2) FROM tree ');
            $stmt2->execute();
            $record = $stmt2->fetch();
            $max2=$record['MAX(id_tree2)'];

            $stmt3 = $this->pdo->prepare('SELECT MAX(id_tree3) FROM tree ');
            $stmt3->execute();
            $record = $stmt3->fetch();
            $max3=$record['MAX(id_tree3)'];

            $stmt4 = $this->pdo->prepare('SELECT MAX(id_tree4) FROM tree ');
            $stmt4->execute();
            $record = $stmt4->fetch();
            $max4=$record['MAX(id_tree4)'];

            $stmt5 = $this->pdo->prepare('SELECT MAX(id) FROM tree ');
            $stmt5->execute();
            $record = $stmt5->fetch();
            $max5=$record['MAX(id)'];



            $max=max([$max1, $max2, $max3, $max4, $max5]);
            return $max;
        }

        catch(Exception $e)
        {
            echo 'EROARE LA MAX!!';
            echo $e->getMessage();
        }
    }




    public function insertMovie($title, $image, $description, $genre)

    {

        try
        {
            $max=$this->functionMax();



        $stmtInsert = $this->pdo->prepare('INSERT INTO movies (title, image_src, tree_id, description, genre) VALUES (:title, :image, :tree_id, :description, :genre)');
        $stmtInsert->execute(['title' => $title, 'image'=> $image, 'tree_id'=>$max+1, 'description' => $description, 'genre'=>$genre]);



        $stmt = $this->pdo->prepare('SELECT id FROM movies WHERE title = :title AND description= :description');
        $stmt->execute(['title' => $title, 'description' => $description]);
        $record = $stmt->fetch();
        $id=$record['id'];


        return $id;

        }


        catch(Exception $e)
        {
            echo 'EROARE LA INSERT MOVIE!!';
            echo $e->getMessage();
            return 0;
        }
    }

    public function insertActors($id, $actorString)

    {
        $actors=explode(",", $actorString);
        foreach ($actors as $actor)
        {
            try
            {
               $stmtInsert = $this->pdo->prepare('INSERT INTO actors VALUES (:id, :actor)');
               $stmtInsert->execute(['id' => $id, 'actor' => $actor]);
            }

            catch(Exception $e)
            {
                echo 'EROARE LA INSERT ACTORS!!';
                echo $e->getMessage();
            }
        }

    }



    

         public function insertDirector($id, $director)

    {
    
            try
            {
               $stmtInsert = $this->pdo->prepare('INSERT INTO directors VALUES (:id, :director)');
               $stmtInsert->execute(['id' => $id, 'director' => $director]);
            }

            catch(Exception $e)
            {
                $e->getMessage();
            }


    }
    

    

    public function insertTree($urls, $questions, $answers, $parts)
    {
        $max=$this->functionMax();
            
        for($i=0; $i<count($urls); $i++)
        {
            try
            {
               $stmtInsert = $this->pdo->prepare('INSERT INTO tree (id, url, question, answer1, answer2, answer3, answer4,
                id_tree1, id_tree2, id_tree3, id_tree4) VALUES (:id, :url, :question, :answer1, :answer2, :answer3, :answer4,
                :id_tree1, :id_tree2, :id_tree3, :id_tree4 ) ');
               $stmtInsert->execute([
                'id' => $max+1+$i, 'url' => $urls[$i], 


                'question'=>($questions[$i]=='-'? "" : $questions[$i]),
                'answer1'=> ($answers[4*$i+0]=='-'? "" :$answers[4*$i+0]),  
                'answer2' => ($answers[4*$i+1]=='-'? "" : $answers[4*$i+1]),
                'answer3' => ($answers[4*$i+2]=='-'? "" : $answers[4*$i+2]),
                'answer4' => ($answers[4*$i+3]=='-'? "" : $answers[4*$i+3]),


                'id_tree1' => ($answers[4*$i+0]=='-'? 0 : $max+$parts[4*$i+0]),
                'id_tree2' => ($answers[4*$i+1]=='-'? 0 : $max+$parts[4*$i+1]),
                'id_tree3' => ($answers[4*$i+2]=='-'? 0 : $max+$parts[4*$i+2]),
                'id_tree4' => ($answers[4*$i+3]=='-'? 0 : $max+$parts[4*$i+3])




            ]);
            }

            catch(Exception $e)
            {
                echo 'Eroare la model la apel tree';
                echo $e->getMessage();
                return 0;
            }
        }

        return 1;  
    }
    








    public function getMovie() {
        return $this->record;
    }

    public function isSubmitted(): bool {
        return $this->submitted;
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function save(array $record): Movie {
        $errors = $this->validate($record);
        if (!empty($errors)) {
            return new Movie($this->pdo, true, $record, $errors);
        }
        if (!empty($record['id'])) {
            return $this->update($record);
        }
        else {
            return $this->insert($record);
        }
    }

    private function validate(array $record): array {
        $errors = [];
        if (empty($record['text'])) {
            $errors[] = 'Text cannot be blank';
        }
        return $errors;
    }

    private function insert(array $record): Movie {
        $stmt = $this->pdo->prepare('INSERT INTO movies (title, description, no_ratings, no_views) VALUES (:title, :description, :no_ratings, :no_views)');
        $stmt->execute(['text' => $record['text'], 'description' => $record['description'], 'no_ratings' => 0, 'no_views' => 0]);
        $record['id'] = $this->pdo->lastInsertId();
        return new Movie($this->pdo, true, $record);
    }
}