<?php
    include "usuariosControlador.php";

    $id = $_POST["usuario"];
    $pass = $_POST["pass"];

    if(isset($id) || isset($pass))
    {
        if(trim($id) == "" || trim($pass) == "")
        {
            echo "Datos incorrectos.";
        }
        else
        {
            $usuariosCon = new usuariosControlador();
            $usuario = $usuariosCon->validar($id,$pass);

           if(count($usuario) > 0)
           {
           // if($id2=='1'){
                session_start();
                $_SESSION["id"] = $usuario[0]["id"];
                $_SESSION["pass"] = $usuario[0]["pass"];
                $_SESSION["privilegio"] = $usuario[0]["privilegio"];
                $_SESSION["nombre"] = $usuario[0]["nombre"];
                echo "true";

                if ($_SESSION["privilegio"] == 1) 
                {
                    header('Location: ../../Vista/menu_admin.php');
                }
                elseif($_SESSION["privilegio"] == 2)
                {
                    header('Location: ../../Vista/menu_doc.php');
                }
                else
                {
                    header('Location: ../../Vista/menu_user.php');
                }
                

            }
            else
            {
                //echo "false2";
                header('Location: ../../index.php');
            }
        }
    }
    else
    {
        header('Location: ../../index.php');
        //echo "Datos no existen";
    }

?>