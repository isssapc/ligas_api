<?php

class Jornada_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_jornadas() {

        $sql = "SELECT j.*
                FROM jornada j;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_jornadas_temporada_liga($id_liga,$id_temporada) {

        $sql = "SELECT j.*, t.nombre AS temporada, l.nombre AS liga
                FROM  jornada j                
                JOIN temporada t ON t.id_temporada=j.id_temporada
                JOIN liga l ON l.id_liga=j.id_liga 
                WHERE j.id_temporada=$id_temporada AND j.id_liga=$id_liga;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_jornada($id_jornada) {
        $sql = "SELECT j.* 
                FROM jornada j 
                WHERE j.id_jornada=$id_jornada LIMIT 1;";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function add_jornada($jornada) {
        $this->db->insert('jornada', $jornada);
        $id_jornada = $this->db->insert_id();
        $nueva_jornada = $this->get_jornada($id_jornada);

        return $nueva_jornada;
    }

    public function get_nombres($id_dominio) {
        if (!isset($id_dominio)) {
            $id_dominio = 1;
        }

        $sql = "SELECT j.id_dominio, j.id_jornada, j.nombre 
                FROM jornada c 
                WHERE j.id_dominio= $id_dominio;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
