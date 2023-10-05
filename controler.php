<?php

require_once 'Model.php';

$model = New Model;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Verificar si se ha subido un archivo

    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0)
    {
        $nombreArchivo = $_FILES["archivo"]["name"];
        $tipoArchivo = $_FILES["archivo"]["type"];
        $tamañoArchivo = $_FILES["archivo"]["size"];
        $tempArchivo = $_FILES["archivo"]["tmp_name"];

        // Comprobar que el archivo es un archivo CSV

        if ($tipoArchivo === "text/csv")
        {
            // Mover el archivo temporal a una ubicación deseada

            $ubicacionDestino = "uploads/" . $nombreArchivo;
            move_uploaded_file($tempArchivo, $ubicacionDestino);

            // Procesar el archivo CSV

            $archivoCSV = $ubicacionDestino;
            $archivo = fopen($archivoCSV, 'r');
            $datos = array();

            while (($linea = fgetcsv($archivo)) !== false) {
                $datos[] = explode(';', $linea[0]);
            }

            fclose($archivo);

            // Ahora $datos contiene los datos del archivo CSV en un array
            // Puedes imprimir o manipular los datos como desees

            $centinel = true;
            $contador = 0;

            foreach ($datos as $i => $val)
            {
                $centinel = $model->inserta_datos($datos[$i]);

                if (!$centinel) {
                    break;
                }

                $contador++;
            }

            echo ($centinel) ? "<p>Datos ingresados exitosamente</p>" : "<p>No se ingresaron todos los datos, sólo se ingresaron {$contador} registros.</p>";

        }
        else
        {
            echo "<p>El archivo debe ser de tipo CSV.</p>";
        }
    }
    else
    {
        echo "<p>Error al cargar el archivo.</p>";
    }

    echo "<p><a href='index.html'><< volver</a></p>";
}