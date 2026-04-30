<?php
class Secciones {
    private $vinculo;
    private $texto;
    private $title;
    private $inMenu;

    public function getVinculo():string
    {
        return $this->vinculo;
    }
    public function getTexto():string
    {
        return $this->texto;
    }
    public function getTitle():string
    {
        return $this->title;
    }
    public function getInMenu():bool
    {
        return $this->inMenu;
    }

    private static function buscarDatos(string $ruta): ?array {
        $JSON = @file_get_contents($ruta);
        if ($JSON === false) {
            return null;
        }

        $JSONData = json_decode($JSON);
        if (!is_array($JSONData)) {
            return null;
        }

        return $JSONData;
    }

    public static function secciones_del_sitio():array{ //Creamos las secciones a partir de los datos recibidos
        $secciones = [];
        $JSONData = self::buscarDatos('resources/secciones.json');
        if ($JSONData === null) {
            return $secciones;
        }

        foreach ($JSONData as $value){
            $sec = new self();
            $sec->vinculo = $value->vinculo;
            $sec->texto = $value->texto;
            $sec->title = $value->title;
            $sec->inMenu = $value->inMenu;
            $secciones[] = $sec;       //Lo pushea dentro del array
        }
        return $secciones;
    }
    public static function secciones_menu():array{ //Solo tomamos las secciones que querramos que pertenezcan al menu
        $secciones_validas = [];
        $JSONData = self::buscarDatos('resources/secciones.json');
        if ($JSONData === null) {
            return $secciones_validas;
        }

        foreach ($JSONData as $value){
            if ($value["inMenu"]) {
                $secciones_validas[] = $value["vinculo"];
            }
        }
        return $secciones_validas;
    }
}
?>