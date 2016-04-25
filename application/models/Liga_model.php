<?php

class Liga_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ligas() {

        $sql = "SELECT l.*
                FROM liga l;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_ligas_temporada($id_temporada) {

        $sql = "SELECT tl.*, t.nombre AS temporada, l.nombre AS liga
                FROM temporada_liga tl
                JOIN liga l ON l.id_liga=tl.id_liga
                JOIN temporada t ON t.id_temporada= tl.id_temporada
                WHERE tl.id_temporada=$id_temporada;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_liga($id_liga) {
        $sql = "SELECT l.*
                FROM liga l
                WHERE l.id_liga=$id_liga LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_liga($liga) {
        $this->db->insert('liga', $liga);
        $id_liga = $this->db->insert_id();
        $nueva_liga = $this->get_liga($id_liga);

        return $nueva_liga;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT c.id_dominio, c.id_liga, c.nombre 
                FROM liga c 
                WHERE c.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
