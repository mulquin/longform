<?php

// Longform definitions
define('ROOT_DIR', realpath(__DIR__) . '/');
define('POSTS_DIR', ROOT_DIR . 'posts/');
define('POSTS_URI', '/' . basename(__DIR__) . '/posts/');
define('LIB_DIR', ROOT_DIR . 'library/');

define('POST_EXT', '.md');
define('THEME_URI', 'themes/notebook/');

// Classes
include LIB_DIR . 'Parsedown.php';
include LIB_DIR . 'ParsedownExtra.php';
include LIB_DIR . 'MetaDB.php';
include LIB_DIR . 'Longform.php';

include 'meta_db.php';


/*
// App class
$longform = new Longform();

include THEME_URI . 'header.html';

if (empty($_GET['p'])) {
	echo $longform->getPosts();
} else {
	echo $longform->getPost($_GET['p']);
}

include THEME_URI . 'footer.html';*/