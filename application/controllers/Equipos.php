<?php

class Equipos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('equipo_model');
    }

    public function index_get() {

        $datos = $this->equipo_model->get_equipos();
        $this->response($datos);
    }

    public function index_post() {
        $equipo = $this->post('equipo');
        $datos = $this->equipo_model->add_equipo($equipo);
        $this->response($datos);
    }

    public function liga_get() {
        $id_liga = $this->get('id_liga');

        $datos = $this->equipo_model->get_equipos_liga($id_liga);
        $this->response($datos);
    }

    public function liga_temporada_post() {
        $id_liga = $this->post('id_liga');
        $id_temporada = $this->post('id_temporada');

        $datos = $this->equipo_model->get_equipos_liga_temporada($id_liga, $id_temporada);
        $this->response($datos);
    }

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->equipo_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
