<?php

class DataBase {
    public function createUser(User $user) {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }
    public function afficherUser(User $user) {
        return '<pre>Pseudo : ' . $user->getPseudo() . '</pre><pre>'.
                $user->getNom() . '</pre><pre>' .
                $user->getPrenom() . '</pre><pre>' .
                $user->getMail() . '</pre><pre><img src="' .
                $user->getAvatar() . '"></pre><pre>' .
                $user->getGenre() . '</pre><pre>' .
                $user->getAge() . '</pre>';
        
    }
    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }
    public function afficherPost(Post $post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrice() . '</pre><pre>' .
                $post->getDate()->format('d/m/Y H:i') . '</pre>';
    }
}
