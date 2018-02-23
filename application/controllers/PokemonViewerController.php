<?php 

session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

class PokemonViewerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    
    //tous les queries s'effectuent au niveau du model 
    public function index()
    {
        $data['title'] = 'Pokemons List';
        $this->load->model('pokemon_model');
        $pokemons = $this->pokemon_model->getList();

        $this->load->view('templates/header', $data);
        $this->load->view('pokemons/index', ['pokemons' => $pokemons]);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Pokemon Detail';

        $this->load->model('pokemon_model');

        $pokemon = $this->pokemon_model->get($id);
        
        if(!$pokemon) {
            show_404('Ce pokemon n\'est pas celui que vous cherchez');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pokemons/detail', ['pokemon' => $pokemon]);
        $this->load->view('templates/footer'); 
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->displayForm();
        
    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nom', 'required');
        $this->form_validation->set_rules('size', 'Taille', 'required');

        if ($this->form_validation->run() === true){
            //process data
            
            if (!empty($_POST['token'])) {
                if (hash_equals($_SESSION['token'], $_POST['token'])) {
                    // Proceed to process the form data
                    $this->load->model('pokemon_model');
                    $insertId = $this->pokemon_model->insert();
                    redirect('pokemon/'. $insertId);
                } else {
                     // Log this as a warning and keep an eye on these attempts
                     show_404('Ce n\'est pas vous qui avez envoyé ce formulaire');
                }
            } 
            


          /*  $this->load->model('pokemon_model');
            $insertId = $this->pokemon_model->insert();
            redirect('pokemon/'. $insertId);*/
        }
        $this->displayForm();
    } 

    private function displayForm()
    {
        $this->load->view('templates/header', ['title' => 'Nouveau pokémon']);
        $this->load->view('pokemons/create');
        $this->load->view('templates/footer'); 
    }
}