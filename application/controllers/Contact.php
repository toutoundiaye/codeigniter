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
        $data['title'] = $dbName;

        $this->load->database();

        $query = $this->db->query('SELECT p.* from pokemon p LIMIT 30');
        $result = '';
        require_once __DIR__.'./../models/Pokemon.php';
        foreach($query->result(Pokemon::class) as $poke){
            $result .= '<tr><td>'.$poke->getName(). '</td>'; //grâce aux accolades on peut mettre des noms débiles
            $result .= '<td>'.$poke->getSize(). '</td>';
            $result .= '<td>'.$poke->getWeight(). '</td>';
            $result .= '<td>'.$poke->getCategory(). '</td></tr>';
        }
        $data['result'] = $result;

        $this->load->view('staticPages/testDb', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
    }
}