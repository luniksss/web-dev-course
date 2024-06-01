<?php

function saveFile(string $file, string $data): void {
    $myFile = fopen($file, 'w');
    if ($myFile) {
      $result = fwrite($myFile, $data);
      fclose($myFile);
    } else {
      echo 'Произошла ошибка при открытии файла';
    }
  }
  
function saveImage(string $imageBase64, string $imageName) 
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/{$imageName}.jpeg", $imageDecoded);
}



try
{
  $connection = mysqli_connect('localhost', 'root', '', 'blog');
  $method = $_SERVER['REQUEST_METHOD'];
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $imageName = "post_{$dataAsArray['title']}";
  $imageNameAuth = "auth_{$dataAsArray['title']}";
  $imageCard = "preview_{$dataAsArray['title']}";
  saveImage($dataAsArray['author_image'], $imageNameAuth);
  saveImage($dataAsArray['preview_image'], $imageCard);
  $sql = "INSERT INTO posts (title, subtitle, content, author, author_image, post_data, preview_image, featured) 
  VALUES ('{$dataAsArray['title']}', '{$dataAsArray['subtitle']}', '{$dataAsArray['content']}', '{$dataAsArray['author']}', '{$imageNameAuth}.jpeg', '{$dataAsArray['post_data']}', '{$imageCard}.jpeg', 
  '{$dataAsArray['featured']}');";
  
  if ($connection->query($sql) === TRUE)
  {
    echo "New post is created";
  }
} catch(Exception $e)
{
  echo $e->getMessage();
} 
?>