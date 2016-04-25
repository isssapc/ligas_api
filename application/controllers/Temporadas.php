<?php



class Temporadas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('temporada_model');
    }

    public function index_get() {

        $datos = $this->temporada_model->get_temporadas();
        $this->response($datos);
    }

    public function index_post() {
        $temporada = $this->post('temporada');
        $datos = $this->temporada_model->add_temporada($temporada);
        $this->response($datos);
    }
    
    
     public function liga_get($id_liga) {

        $datos = $this->temporada_model->get_temporadas_liga($id_liga);
        $this->response($datos);
    }
    
    
    
    
    
    

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->temporada_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
