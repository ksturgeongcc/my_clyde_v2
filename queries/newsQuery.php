<?php
    $news = $conn->prepare("SELECT
    news_id,
    title,
    description
    
    from news 
    ");
    $news->execute();
    $news->store_result();
    $news->bind_result($newsId, $title, $description);
    ?>

