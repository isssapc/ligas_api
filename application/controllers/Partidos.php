<?php

class Partidos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('partido_model');
    }

    public function index_get() {

        $datos = $this->partido_model->get_partidos();
        $this->response($datos);
    }

    public function index_post() {
        $partido = $this->post('partido');
        $datos = $this->partido_model->add_partido($partido);
        $this->response($datos);
    }

    public function jornada_get($id_jornada) {

        $datos = $this->partido_model->get_partidos_jornada($id_jornada);
        $this->response($datos);
    }

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->partido_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
