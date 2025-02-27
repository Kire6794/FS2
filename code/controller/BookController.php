<?php
    include "model/Task.php";
    include "config/Database.php";

    class BookController{
        private $bookModel;

        //Constructor
        public function __construct(){
            $database = new Database();
            $db= $database->connect();
            $this->bookModel = new Book($db);
        }

        //Add Book
        public function addBook(){
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData, true);
            $this->bookModel->title = $data["title"];
            $this->bookModel->author = $data["author"];
            $this->bookModel->description = $data["description"];
            $result = $this->bookModel->create(); 

            if($result){
                echo json_encode(["title"=>$data["title"], "author"=>$data["author"], "description"=>$data["description"]]);
            }else{
                echo json_encode(["message"=>"Failed to add book"]);
            }
        }

        //Get all books
        public function index(){
            $books = $this->bookModel-> read();

            if($books->num_rows==0){
                echo json_encode(["message"=>"No books found"]);
            }else{
                $books_arr = array();
                while($row = $books->fetch_assoc()){
                    extract($row);
                    $book_item = array(
                        "id" => $id,
                        "title" => $title,
                        "author" => $author,
                        "description" => $description
                    );
                    array_push($books_arr, $book_item);
                }
                echo json_encode($books_arr);
            }
        }
    }