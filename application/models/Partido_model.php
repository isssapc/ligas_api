<?php

class Partido_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_partidos() {

        $sql = "SELECT p.*, el.nombre AS local, ev.nombre AS visitante
                FROM partido p
                JOIN equipo el ON el.id_equipo= p.id_local
                JOIN equipo ev ON ev.id_equipo= p.id_visitante;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_partidos_jornada($id_jornada) {

        $sql = "SELECT p.*, el.nombre AS local, ev.nombre AS visitante, l.nombre AS liga, j.nombre AS jornada
                FROM partido p
                JOIN jornada j ON j.id_jornada=p.id_jornada              
                JOIN liga l ON l.id_liga=j.id_liga
                JOIN equipo el ON el.id_equipo= p.id_local
                JOIN equipo ev ON ev.id_equipo= p.id_visitante
                WHERE p.id_jornada=$id_jornada;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_partidos_equipo_liga($id_equipo, $id_liga) {

        $sql = "SELECT p.*, el.nombre AS local, ev.nombre AS visitante, l.nombre AS liga, j.nombre AS jornada
                FROM partido p
                JOIN jornada j on j.id_jornada= p.id_jornada
                JOIN liga l ON l.id_liga=j.id_liga
                JOIN equipo el ON el.id_equipo= p.id_local
                JOIN equipo ev ON ev.id_equipo= p.id_visitante
                WHERE (p.id_local=$id_equipo OR p.id_visitante=$id_equipo) AND j.id_liga= $id_liga ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_partido($id_partido) {
        $sql = "SELECT p.*, d.nombre AS dominio 
                FROM partido p
                WHERE p.id_partido=$id_partido LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_partido($partido) {
        $this->db->insert('partido', $partido);
        $id_partido = $this->db->insert_id();
        $nuevo_partido = $this->get_partido($id_partido);

        return $nuevo_partido;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT p.id_dominio, p.id_partido, p.nombre 
                FROM partido p 
                WHERE p.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
