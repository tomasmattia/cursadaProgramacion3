<?php
    require_once "iMiddleWare.php";
    class Verificadora implements iMiddleWare
    {
        function AgregarCd($request,$response,$next)
        {
            $parametros=$request->getParsedBody();
            $titel=$parametros['titel'];
            $interpret=$parametros['interpret'];
            $jahr=$parametros['jahr'];
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $sql=$objetoPDO->prepare('INSERT INTO `cds`(`titel`, `interpret`, `jahr`) VALUES (:titel, :interpret, :jahr)');
                
                $sql->execute(array(
                    'titel' => $titel,
                    'interpret' => $interpret,
                    'jahr' => $jahr,
                ));
            }
            catch(PDOException $e) 
            {
                echo "Error!\n" . $e->getMessage();
            }
            $response = $next($request, $response);
            return $response;
        }

        function ModificarCd($request,$response,$next)
        {
            $parametros=$request->getParsedBody();
            $titel=$parametros['titel'];
            $interpret=$parametros['interpret'];
            $jahr=$parametros['jahr'];
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $sql=$objetoPDO->prepare('UPDATE `cds` SET `titel`  `interpret`, `jahr`');
                
                $sql->execute(array(
                    'titel' => $titel,
                    'interpret' => $interpret,
                    'jahr' => $jahr,
                ));
            }
            catch(PDOException $e) 
            {
                echo "Error!\n" . $e->getMessage();
            }
            $response = $next($request, $response);
            return $response;
        }

        function EsSuperAdmin($request,$response,$next)
        {
            $parametros=$request->getParsedBody();
            $nombre=$parametros['nombre'];
            $clave=$parametros['clave'];
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $sql=$objetoPDO->prepare('SELECT `nombre`,`clave`,`perfil` FROM `usuarios` WHERE `nombre` = :nombre AND `clave` = :clave AND `perfil`= "super-admin"');
                $sql->bindValue(':nombre', $nombre);
                $sql->bindValue(':clave', $clave);
                $sql->execute();
                $result = $sql->rowCount();
                if($result)
                {
                    $response = $next($request, $response);
                }
                else
                {
                    $response->getBody()->write('Error no es super-admin <br>');
                }
            }
            catch(PDOException $e)
            {
                echo "Error!\n" . $e->getMessage();
            }
            return $response;
        }

        function EliminarCd($request,$response,$next)
        {
            $parametros=$request->getParsedBody();
            $titel=$parametros['titel'];
            $interpret=$parametros['interpret'];
            $jahr=$parametros['jahr'];
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $delete=$objetoPDO->prepare('DELETE FROM `cds` WHERE `titel`= :titel AND `interpret`= :interpret');
                $delete->execute(array(
                    'titel' => $titel,
                    'interpret' => $interpret
                ));
                $response = $next($request, $response);
            }
            catch(PDOException $e)
            {
                echo "Error!\n" . $e->getMessage();
            }
            
            return $response;
        }

        static function TraerLosCds($request,$response,$next)
        {
            $arrayDeCds=array();
            try
            {
                $usuario='root';
                $pass='';
                $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                $sql=$objetoPDO->prepare('SELECT `titel`,`interpret`,`jahr`,`id` FROM `cds`');
                $sql->execute();
                while($result = $sql->fetchObject())
                {
                    array_push($arrayDeCds,$result);
                }
                var_dump($arrayDeCds);
            }
            catch(PDOException $e)
            {
                echo "Error!\n" . $e->getMessage();
            }
            $response = $next($request, $response);
            return $response;
        }

        public function VerificarUsuario($request,$response,$next)
        {
            if($request->isGet())
            {
                $response = $next($request, $response);
            }
            else
            {
                $parametros=$request->getParsedBody();
                $nombre=$parametros['nombre'];
                $clave=$parametros['clave'];
                var_dump($request->getParsedBody());
                try
                {
                    $usuario='root';
                    $pass='';
                    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $pass);
                    $sql=$objetoPDO->prepare('SELECT `nombre`,`clave`,`perfil` FROM `usuarios` WHERE `nombre` = :nombre AND `clave` = :clave');
                    $sql->bindValue(':nombre', $nombre);
                    $sql->bindValue(':clave', $clave);
                    $sql->execute();
                    $result = $sql->rowCount();
                    if($result)
                    {
                        $response = $next($request, $response);
                    }
                    else
                    {
                        $response->getBody()->write('Error nombre o clave incorrectos <br>');
                    }
                }
                catch(PDOException $e)
                {
                    echo "Error!\n" . $e->getMessage();
                }
            }
            return $response;
        }
    }

?>