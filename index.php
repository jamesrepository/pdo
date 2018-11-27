<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pdoposts';

try {
    // Set DSN
    // mysql:host=localhost;dbname=pdoposts
    $dsn = 'mysql:host='. $host.';dbname='. $dbname ;

    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    // Make default fetch to obj
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // #PDO QUERY
    $stmt = $pdo->query('SELECT * FROM posts');

    /* while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $row['title']. '<br>';
    } */

    /* while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        echo $row->title. '<br>';
    } */

    // # PREPARED STATEMENTS (prepare & execute)


    // UNSAFE
    // $sql = "SELECT * FROM posts WHERE author = '$author'";

    // FETCH MULTIPLE POSTS
    // sample user input
    $author = "Raymart";
    $is_published = true;
    $id = 1;

    // Positional Params
    /* $sql = 'SELECT * FROM posts WHERE author = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author]);
    $posts = $stmt->fetchAll(); */

    // Name Params
    /* $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['author' => $author, 'is_published' => $is_published]);
    $posts = $stmt->fetchAll();
    
    // var_dump($posts);
    foreach($posts as $post){
        echo $post->title. '<br>';
    } */

    // FETCH SINGLE POST
    /* $sql = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $posts = $stmt->fetch();

    echo $posts->body; */

    // GET ROW COUNT
    /* $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = :author');
    $stmt->execute(['author' => $author]);
    $postCount = $stmt->rowCount();

    echo $postCount; */

    // INSERT DATA
    /* $title = "Posts 5";
    $body = "Body Posts 5";
    $author = "James";

    $sql = "INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]); 
    echo 'Post Added'; */

    
    // UPDATE DATA
    /* $id = 1;
    $body = "This is updated posts";

    $sql = "UPDATE posts SET body = :body WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['body' => $body, 'id' => $id]);
    echo 'Post Updated'; */

    // UPDATE DATA
    /* $id = 3;

    $sql = "DELETE FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    echo 'Post Deleted'; */


} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}



