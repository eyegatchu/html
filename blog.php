<?php
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #90c0e7; /* Warna latar belakang */
        }
        #blog-posts {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #010101; /* Warna teks judul */
        }
        .blog-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-items: center;
        }
        .blog-post {
            background-color: #fff; /* Warna latar belakang konten */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        h2 {
            color: #333; /* Warna teks judul post */
        }
        p {
            color: #666; /* Warna teks konten */
        }
        .read-more {
            color: #007bff; /* Warna tautan */
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <section id="blog-posts">
        <h1>This is my Blog, hope you enjoy it</h1>
        <div class="blog-container">
  <?php
    $query = "SELECT * FROM blog";
    $result = mysqli_query($conn, $query);

    $no = 1;

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($no >=0) {
            ?>
            <div class="blog-post">
                <h2><?= $row["judul"] ?>
                </h2>
                <p>S<?= $row["penjelasan"] ?></p>
                <a href="<?= $row["link"] ?>" class="read-more">Read more</a>
            </div>
 <?php } 
            $no++;
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    } ?>
           
    </section>
</body>
</html>