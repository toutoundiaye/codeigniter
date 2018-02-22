<?php 

class Contact extends CI_Controller
{
    public function whoAreWe($title = null)
    {
        $data['title'] = $title ?? 'Qui sommes nous ?';

        $this->load->view('templates/header');
        $this->load->view('staticPages/whoAreWe', $data);
        $this->load->view('templates/footer');
    }

    public function testDb($name = null)
    {
        $dbName = 'Connexion à la base de donnée '. $name;
        $data['title'] = $dbName ?? 'Connexion à la base de donnée';

        $this->load->database();

        $query = $this->db->query('SELECT p.* from pokemon p LIMIT 30');
        $result = '';
        require_once __DIR__.'./../models/Pokemon.php';
        foreach($query->result(Pokemon::class) as $poke){
            $result .= $poke->getName. ' '; //grâce aux accolade on peut mettre des noms débiles
        }
        $data['result'] = $result;

        $this->load->view('staticPages/testDb', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }
}