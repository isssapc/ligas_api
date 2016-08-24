<?php

class Equipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_equipos() {

        $sql = "SELECT e.*, l.nombre AS liga
                FROM equipo e
                JOIN liga l ON l.id_liga=e.id_liga";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_equipos_liga($id_liga) {

        $sql = "SELECT el.*, e.nombre AS equipo
                FROM equipo_liga el
                JOIN equipo e ON e.id_equipo= el.id_equipo
                WHERE el.id_liga=$id_liga";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_equipos_liga_temporada($id_liga, $id_temporada) {

        $sql = "SELECT e.*
                FROM equipo_temporada et
                JOIN equipo e ON e.id_equipo= et.id_equipo
                WHERE e.id_liga=$id_liga AND et.id_temporada=$id_temporada";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_equipo($id_equipo) {
        $sql = "SELECT e.*
                FROM equipo e
                WHERE e.id_equipo=$id_equipo LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_equipo($equipo) {
        $this->db->insert('equipo', $equipo);
        $id_equipo = $this->db->insert_id();
        $nuevo_equipo = $this->get_equipo($id_equipo);

        return $nuevo_equipo;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT c.id_dominio, c.id_equipo, c.nombre 
                FROM equipo c 
                WHERE c.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
