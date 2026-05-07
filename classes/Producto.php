<?php
class Producto
{
    private $_id;
    private $_nombre;
    private $_descripcion;
    private $_categoria;
    private $_precio;
    private $_img;

    public function getId(){
        return $this->_id;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getCategoria(){
        return $this->_categoria;
    }
    public function getPrecio(){
        return $this->_precio;
    }
    public function getImg(){
        return $this->_img;
    }

    public function setId($id){
        $this->_id = $id;
    }
    public function setNombre($nombre){
        $this->_nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->_descripcion = $descripcion;
    }
    public function setCategoria($categoria){
        $this->_categoria = $categoria;
    }
    public function setPrecio($precio){
        $this->_precio = $precio;
    }
    public function setImg($img){
        $this->_img = $img;
    }

    public static function catalogo_completo():array 
    {
        $catalogo = [];
        $JSON = file_get_contents('resources/productos.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value){
            $producto = new self();

            $producto->_id          = $value->id;
            $producto->_nombre      = $value->nombre;
            $producto->_descripcion = $value->descripcion;
            $producto->_categoria   = $value->categoria;
            $producto->_precio      = $value->precio;
            $producto->_img         = $value->img;

            $catalogo[] = $producto;
        }
        return $catalogo;
    }

    public static function todasLasCategorias():array
    {
        $catalogo = self::catalogo_completo();
        foreach ($catalogo as $c){
            $categoria[] = $c->_categoria;
        }

        $categorias = array_unique($categoria);
        sort($categorias);
        return $categorias;
    }

    public static function catalogo_x_categoria(string $categoria):array 
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach($catalogo as $c){
            if($c->_categoria == $categoria) $resultado[] = $c;
        }
        return $resultado;
    }

    public static function catalogo_x_precio(string $orden = 'asc'): array 
    {
        $catalogo = self::catalogo_completo();

        usort($catalogo, function($a, $b) use ($orden) {
            if ($orden === 'desc') {
                return $b->getPrecio() <=> $a->getPrecio();
            } else {
                return $a->getPrecio() <=> $b->getPrecio();
            }
        });

        return $catalogo;
    }

    public static function producto_x_id(mixed $idProducto): Producto|null 
    {
        $catalogo = self::catalogo_completo();

        foreach($catalogo as $c){
            if($c->_id == $idProducto) return $c;
        }
        return null;
    }
}
?>
