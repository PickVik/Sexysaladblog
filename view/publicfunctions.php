<?php
require_once 'config.php';
$conn= new DB;

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute();     
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $posts;
        
        $final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;

}

function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute();     
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topics;
}
        

function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
}

function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published==1";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute(); 
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute(); 
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$stmt = $conn->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic['name'];
}