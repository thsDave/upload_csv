<?php

require_once 'Connection.php';

class Model extends Connection
{
    #--------------------------------------------------
    // Preparación de declaraciones de consultas sql
    #--------------------------------------------------

	protected function pst($query, $arr_data = [], $expect_values = true)
    {
        $pdo = parent::connect();
        $pst = $pdo->prepare($query);
        $res = ($pst->execute($arr_data)) ? ($expect_values) ? $pst->fetchAll() : true : false;
        parent::disconnect();
        return $res;
    }

    public function inserta_datos($datos)
    {
        return $this->pst("INSERT INTO transactions VALUES (:c, :d, :v)", ['c' => $datos[0], 'd' => $datos[1], 'v' => $datos[2]], false);
    }
}