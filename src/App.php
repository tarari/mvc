<?php


namespace Mvc;


class App
{
    //public $routes=[];
    static protected $arrayParam;

    static function run(){
        $array_controller= self::getArrayController();

        $nameController='\\Mvc\Controllers\\'.$array_controller[0].'Controller';
        $request=new Request($array_controller);

        if(class_exists($nameController)){
            echo "{$nameController} EXISTE";
        }else {
            echo "NO EXISTE";
        }
        die;
            $objCont=new $nameController($request);


        if (is_callable([$objCont,$array_controller[1]])){
            call_user_func([$objCont,$array_controller[1]]);
        }
        else{
            call_user_func([$objCont,'error']);
        }

    }

    /**
     * Extracts controller action and method
     * @return array
     */
    private function getArrayController()
    {
        $requestString=htmlentities($_SERVER['REQUEST_URI']);
        $requestArr=explode('/',$requestString);
        array_shift($requestArr);

        if($requestArr[0]==""){
            $controller="Default";
            $action="index";
        }else{
            $controller=ucfirst($requestArr[0]);
            $action=$requestArr[1];
            array_shift($requestArr);
            array_shift($requestArr);
        }
        self::$arrayParam=$requestArr;
        $method=htmlentities($_SERVER['REQUEST_METHOD']);
        $params=self::getUriParams();
        return [$controller,$action,$params,$method];
    }

    function getUriParams(){
        if(self::$arrayParam!=null){
            $arr_length=count(self::$arrayParam);
            if(count(self::$arrayParam)%2==0){
                for($i=0;$i<$arr_length;$i++){
                    if($i%2==0) {
                        $arr_k[] = self::$arrayParam[$i];
                    }
                    if($i%2!=0){
                        $arr_v[] = self::$arrayParam[$i];
                    }
                }
                $res=array_combine($arr_k,$arr_v);

                return $res;
            }else{
                return null;
            }
        }

    }
}