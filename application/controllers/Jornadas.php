<?php

class Jornadas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jornada_model');
    }

    public function index_get() {

        $datos = $this->jornada_model->get_jornadas();
        $this->response($datos);
    }

    public function index_post() {
        $jornada = $this->post('jornada');
        $datos = $this->jornada_model->add_jornada($jornada);
        $this->response($datos);
    }

    public function liga_temporada_get() {
        $id_liga = $this->get('id_liga');
        $id_temporada = $this->get('id_temporada');
        $datos = $this->jornada_model->get_jornadas_temporada_liga($id_liga, $id_temporada);
        $this->response($datos);
    }

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->jornada_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
