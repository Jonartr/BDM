<?php

include_once 'categoria.php';

class ApiCategorias{

    function getAll(){
    $categoria = new Categoria();
    $categorias = array();
    $categorias["items"] = array();

        $res = $categoria->obtenerCategorias();

        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre'],
                    'imagen'=>$row['imagen']
                );
                array_push($categorias['items'], $item);
            }

            echo json_encode($categorias);

        }else{
            echo json_encode(array('mensaje' => 'No hay elementos registrados')); 
        }

    }
}

?>
