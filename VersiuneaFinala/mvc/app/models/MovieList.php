<?php
class MovieList {

    private $pdo;

    private $sort = 'oldest';

    private $keyword;

    public function __construct(\PDO $pdo, string $sort = 'oldest', string $keyword = '') {
        $this->pdo = $pdo;
        $this->sort = $sort;
        $this->keyword = $keyword;
    }

    public function sort($dir): self {
        return new self($this->pdo, $dir, $this->keyword);
    }

    public function search($keyword): self {
        return new self($this->pdo, $this->sort, $keyword);
    }

    public function getKeyword(): string {
        return $this->keyword;
    }

    public function getSort(): string {
        return $this->sort;
    }

    public function delete($id): self {
        $stmt = $this->pdo->prepare('DELETE FROM movies WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return $this;
    }

    public function getMovies(): array {
        $parameters = [];

        if ($this->sort == 'newest') {
            $order = ' ORDER BY id DESC';
        }
        else if ($this->sort == 'oldest') {
            $order = ' ORDER BY id ASC';
        }
        else {
            $order = '';
        }


        if ($this->keyword) {
            $where = ' WHERE text LIKE :text';
            $parameters['text'] = '%' . $this->keyword . '%';
        }
        else {
            $where = '';
        }


        $stmt = $this->pdo->prepare('SELECT * FROM movies ' . $where . $order);
        $stmt->execute($parameters);

        return $stmt->fetchAll();
    }

    public function getMoviesByActor($actorName): array {
        $parameters = [];


        if ($this->sort == 'newest') {
            $order = ' ORDER BY id DESC';
        }
        else if ($this->sort == 'oldest') {
            $order = ' ORDER BY id ASC';
        }
        else {
            $order = '';
        }

        $stmt = $this->pdo->prepare('SELECT id, title, image_src, tree_id, rating, no_ratings, no_views, description, genre FROM movies JOIN actors ON movies.id=actors.id_movie WHERE TRIM(UPPER(actors.name))= TRIM(UPPER(:name)) 
UNION 
SELECT id, title, image_src, tree_id, rating, no_ratings, no_views, description, genre FROM movies JOIN directors ON movies.id=directors.id_movie WHERE TRIM(UPPER(directors.name))= TRIM(UPPER(:name))
UNION 
SELECT id, title, image_src, tree_id, rating, no_ratings, no_views, description, genre FROM movies WHERE TRIM(UPPER(movies.title))= TRIM(UPPER(:name))');
        
        $stmt->execute(['name' => $actorName]);



        return $stmt->fetchAll();
    }
}