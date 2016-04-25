<?php



class Ligas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('liga_model');
    }

    public function index_get() {

        $datos = $this->liga_model->get_ligas();
        $this->response($datos);
    }

    public function index_post() {
        $cliente = $this->post('liga');
        $datos = $this->liga_model->add_liga($cliente);
        $this->response($datos);
    }
    
    
    
    
    
    
    public function temporada_get($id_temporada) {

        $datos = $this->liga_model->get_ligas_temporada($id_temporada);
        $this->response($datos);
    }
    
    
    
    
    
    
    

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->liga_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
