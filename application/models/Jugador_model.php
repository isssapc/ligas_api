<?php

class Jugador_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_jugadores() {

        $sql = "SELECT j.*
                FROM jugador j;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
       public function get_jugadores_equipo_liga_temporada($id_equipo,$id_liga,$id_temporada) {

        $sql = "SELECT je.*, j.nombre AS jugador, t.nombre AS temporada, e.nombre AS equipo, l.nombre AS liga
                FROM jugador_equipo je
                JOIN jugador j ON j.id_jugador=je.id_jugador
                JOIN temporada t ON t.id_temporada=je.id_temporada
                JOIN equipo e ON e.id_equipo=je.id_equipo
                JOIN liga l ON l.id_liga=je.id_liga
                WHERE je.id_equipo=$id_equipo AND je.id_liga=$id_liga AND je.id_temporada=$id_temporada;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function get_jugador($id_jugador) {
        $sql = "SELECT j.* 
                FROM jugador j
                WHERE j.id_jugador=$id_jugador LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_jugador($jugador) {
        $this->db->insert('jugador', $jugador);
        $id_jugador = $this->db->insert_id();
        $nuevo_jugador = $this->get_jugador($id_jugador);

        return $nuevo_jugador;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT j.id_dominio, j.id_jugador, j.nombre 
                FROM jugador j 
                WHERE j.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
