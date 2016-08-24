<?php

class Temporada_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_temporadas() {

        $sql = "SELECT t.*
                FROM temporada t;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_temporadas_liga($id_liga) {

        $sql = "SELECT lt.*, t.temporada, l.nombre AS liga
                FROM liga_temporada lt
                JOIN temporada t ON t.id_temporada=lt.id_temporada
                JOIN liga l ON l.id_liga=lt.id_liga
                WHERE lt.id_liga=$id_liga;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_temporada($id_temporada) {
        $sql = "SELECT t.*
                FROM temporada t                 
                WHERE t.id_temporada=$id_temporada LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_temporada($temporada) {
        $this->db->insert('temporada', $temporada);
        $id_temporada = $this->db->insert_id();
        $nuevo_temporada = $this->get_temporada($id_temporada);

        return $nuevo_temporada;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT c.id_dominio, c.id_temporada, c.nombre 
                FROM temporada c 
                WHERE c.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
