<?php

class Servicio
{
    private $id;
    private $nombre;
    private $descripcion;
    private $integrantes;
    private $url;
    private $activo;

    public function __construct() {}

    public function getId() { return intval($this->id); }

    public function getNombre() { return $this->nombre; }
    
    public function getDescripcion() { return $this->descripcion; }
    
    public function getIntegrantes() { return $this->integrantes; }
    
    public function getUrl() { return $this->url; }

    //solo para booleanos 
    public function isActivo() { return $this->activo; }
    //mutadores

    public function setId($_n) { $this->id = $_n; }

    public function setNombre($_n) { $this->nombre = $_n; }
    
    public function setDescripcion($_n) { $this->descripcion = $_n; }

    public function setIntegrantes($_n) { $this->integrantes = $_n; }

    public function setUrl($_n) { $this->url = $_n; }
    
    public function setActivo($_n) { $this->activo = $_n; }

    public function getAll()
    {
        $lista = [];
        $con = new Conexion();
        $query = "SELECT id, nombre, descripcion, integrantes, url, activo FROM services;";
        $rs = mysqli_query($con->getConnection(), $query);
        if ($rs) {
            while ($registro = mysqli_fetch_assoc($rs)) {
                $registro['activo'] = $registro['activo'] == 1 ? true : false;

                $tupla = new Proyecto();
                $tupla->setId($registro['id']);
                $tupla->setNombre($registro['nombre']);
                $tupla->setDescripcion($registro['descripcion']);
                $tupla->setIntegrantes($registro['integrantes']);
                $tupla->setUrl($registro['url']);
                $tupla->setActivo($registro['activo']);

                //debemos trabajar con el objeto
                array_push($lista, array(
                    'id' => $tupla->getId(),
                    'nombre' => $tupla->getNombre(),
                    'descripcion' => $tupla->getDescripcion(),
                    'integrantes' => $tupla->getIntegrantes(),
                    'url' => $tupla->getUrl(),
                    'activo' => $tupla->isActivo()
                ));
            }
            mysqli_free_result($rs);
        }
        $con->closeConnection();
        return $lista;
    }

    public function add(Proyecto $_nuevo)
    {
        $con = new Conexion();
        
        //con opcion 1
        // $query = "INSERT INTO indicador (id, codigo, nombre, unidad_medida_id, valor) VALUES (" . $nuevoId . ", '" . $_nuevo->getCodigo() . "', '" . $_nuevo->getNombre() . "', " . $_nuevo->getUnidadMedidaId() . ", " . $_nuevo->getValor() . ");";
        $query = "INSERT INTO services (nombre, descripcion, integrantes, url, activo) VALUES ('" . $_nuevo->getNombre() . "', '". $_nuevo->getDescripcion() ."', '".$_nuevo->getIntegrantes()."', '".$_nuevo->getUrl()."', ".$_nuevo->isActivo().")";
        
        $rs = mysqli_query($con->getConnection(), $query);
        $con->closeConnection();
        if ($rs) {
            return true;
        }
        return false;
    }
}
