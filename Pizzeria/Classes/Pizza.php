<?php
class Pizza
{
    private $_sabor;
    private $_tipo;
    private $_precio;
    private $_cantidad; 
    private $id;




    /* #region  constructor */
    function __construct($sabor, $tipo, $precio, $cantidad,$id)
    {
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_cantidad=$cantidad;
        $this->id=$id;



    }

    /* #endregion */

    /* #region Getters setters :)*/
    public function get_sabor()
    {
        return $this->_sabor;
    }
    public function set_sabor($_sabor)
    {
        $this->_sabor = $_sabor;
        return $this;
    }


    public function get_tipo()
    {
        return $this->_tipo;
    }
    public function set_tipo($_tipo)
    {
        $this->_tipo = $_tipo;
        return $this;
    }


    public function get_precio()
    {
        return $this->_precio;
    }
    public function set_precio($_precio)
    {
        $this->_precio = $_precio;
        return $this;
    }

    public function get_cantidad() {
    	return $this->_cantidad;
    }
    public function set_cantidad($_cantidad) {
    	$this->_cantidad = $_cantidad;
    	return $this;
    }

    public function get_id() {
        return (int)$this->id;
    }
    public function set_id($id) {
        $this->id = $id;
        return $this;
    }
    
    /* #endregion */
    public function toArray(){
        $retorno=array($this->get_sabor(),$this->get_tipo(),$this->get_precio(),$this->_cantidad,$this->id);
        return $retorno;
    
    }


}
