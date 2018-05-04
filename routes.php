<?php
namespace Core;
Router::connect('/', ['controller' => 'app', 'action' => 'index']);

Router::connect('/user', ['controller' => 'user', 'action' => 'index']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'register']);
Router::connect('/user/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/user/show', ['controller' => 'user', 'action' => 'show']);
Router::connect('/user/modify', ['controller' => 'user', 'action' => 'replace']);
Router::connect('/user/delete', ['controller' => 'user', 'action' => 'delete']);
Router::connect('/user/info', ['controller' => 'user', 'action' => 'info']);

Router::connect('/film/page/', ['controller' => 'film', 'action' => 'index']);
Router::connect('/film/id/', ['controller' => 'film', 'action' => 'filmId']);
Router::connect('/film/add', ['controller' => 'film', 'action' => 'filmAdd']);
Router::connect('/film/modify/id/', ['controller' => 'film', 'action' => 'filmModify']);
Router::connect('/film/delete/id/', ['controller' => 'film', 'action' => 'filmDelete']);
Router::connect('/film/search', ['controller' => 'film', 'action' => 'filmSearch']);

Router::connect('/genre', ['controller' => 'genre', 'action' => 'index']);
Router::connect('/genre/add', ['controller' => 'genre', 'action' => 'genreAdd']);
Router::connect('/genre/id/', ['controller' => 'genre', 'action' => 'genreId']);
Router::connect('/genre/modify/id/', ['controller' => 'genre', 'action' => 'genreModify']);
Router::connect('/genre/delete/id/', ['controller' => 'genre', 'action' => 'genreDelete']);

Router::connect('/history', ['controller' => 'history', 'action' => 'index']);
Router::connect('/history/add', ['controller' => 'history', 'action' => 'historyAdd']);
Router::connect('/history/delete', ['controller' => 'history', 'action' => 'historyDelete']);

?>