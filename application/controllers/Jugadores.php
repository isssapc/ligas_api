<?php

class Jugadores extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jugador_model');
    }

    public function index_get() {

        $datos = $this->jugador_model->get_jugadores();
        $this->response($datos);
    }

    public function index_post() {
        $jugador = $this->post('jugador');
        $datos = $this->jugador_model->add_jugador($jugador);
        $this->response($datos);
    }

    public function equipo_liga_get() {
        $id_equipo = $this->get('id_equipo');
        $id_liga = $this->get('id_liga');       

        $datos = $this->jugador_model->get_jugadores_equipo_liga($id_equipo,$id_liga);
        $this->response($datos);
    }

    public function nombres_get() {
        $id_dominio = $this->get('id_dominio');
        $datos = $this->jugador_model->get_nombres($id_dominio);
        $this->response($datos);
    }

}
