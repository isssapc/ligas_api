<?php

class Equipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_equipos() {

        $sql = "SELECT e.*
                FROM equipo e;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_equipos_liga_temporada($id_liga, $id_temporada) {

        $sql = "SELECT te.*, e.nombre AS equipo
                FROM temporada_equipo te
                JOIN equipo e ON e.id_equipo= te.id_equipo
                WHERE te.id_liga=$id_liga AND te.id_temporada=$id_temporada;";

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
