<?php

class Jornada_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_jornadas() {

        $sql = "SELECT j.*, l.nombre as liga, l.id_categoria as categoria, t.temporada
                FROM jornada j
                JOIN liga l ON l.id_liga= j.id_liga
                JOIN temporada t ON t.id_temporada=j.id_temporada ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_jornadas_liga_temporada($id_liga, $id_temporada) {

        $sql = "SELECT j.*
                FROM  jornada j            
                WHERE j.id_liga=$id_liga AND j.id_temporada=$id_temporada";

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
