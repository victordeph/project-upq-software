<?php

function conectarBD(){
$servidor="localhost";
$baseDatos="bdmexquimicos";
$usuario="root";
$contrasena="";

/*
    CREATE TABLE productos (
    idproducto INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    producto VARCHAR(20) NOT NULL,
    unidad VARCHAR(20) NOT NULL,
    cantidad INT NOT NULL,
    preciocompra DECIMAL NOT NULL,
    preciomayoreo DECIMAL NOT NULL,    
    preciomenudeo DECIMAL NOT NULL,
    fecha DATE NOT NULL
    );
    
    CREATE TABLE materiales (
    idmaterial INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    material VARCHAR(20) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    cantidadm INT NOT NULL,
    preciocompram DECIMAL NOT NULL,
    preciomayoreom DECIMAL NOT NULL,    
    preciomenudeom DECIMAL NOT NULL,
    fecham DATE NOT NULL
    );
    */
$conexion=mysqli_connect($servidor, $usuario, $contrasena, $baseDatos) or die("Error al intentar conectar");
return $conexion;
}

function insertarProducto($pro,$uni,$cant,$prec,$prema,$preme,$fech){
    $insert = "insert into PRODUCTOS (producto,unidad,cantidad,preciocompra,preciomayoreo,preciomenudeo,fecha) values (?,?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssiddds',$pro,$uni,$cant,$prec,$prema,$preme,$fech);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos el insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}

function consultaTodo (){

    $conex = conectarBD();
    $contod = "select * from PRODUCTOS"; //creacion de conexion y de consulta 

    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rscontod;    //return de la variable con la consulta
}

function consultaProducto ($producto){
    $conex = conectarBD();
    $consprod="select * from PRODUCTOS where producto = '$producto'";

    $rsconsvid = mysqli_query($conex, $consprod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rsconsvid;

}

function consultarId ($id){
    $conex = conectarBD();
    $consxid = "select * from PRODUCTOS where idproducto = '$id'"; //creacion de conexion y de consulta 

    $rsxid = mysqli_query($conex, $consxid);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rsxid;
}


function actualizarProducto($pro,$uni,$cant,$prec,$prema,$preme,$fech,$id){
    $conex=conectarBD();
    $actualiza= "UPDATE PRODUCTOS SET producto= ?, unidad= ?, cantidad= ?, preciocompra= ?, preciomayoreo= ?, preciomenudeo= ?, fecha= ? WHERE idproducto= ? ";

    try{
        $stm= $conex->prepare($actualiza);
        $stm->bind_param('ssidddsi',$pro,$uni,$cant,$prec,$prema,$preme,$fech,$id);
        $stm->execute();
        $stm->close();

        mysqli_close($conex);

        return 1;

    } catch (Exception $e){
        echo 'Excepcion capturada: ', $e->getMessage();
    }
}

function eliminarProducto($id){
    $conex=conectarBD();
	$elimina="DELETE FROM PRODUCTOS where idproducto='$id'";

	$rseliminar=mysqli_query($conex,$elimina);
	mysqli_close($conex);

	return $rseliminar;
}

//FUNCIONES PARA MATERIALES

function insertarMaterial($mat,$mar,$canm,$precm,$premam,$premem,$fechm){
    $insert = "insert into MATERIALES (material,marca,cantidadm,preciocompram,preciomayoreom,preciomenudeom,fecham) values (?,?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssiddds',$mat,$mar,$canm,$precm,$premam,$premem,$fechm);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos el insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}


function consultaMaterial ($material){
    $conex = conectarBD();
    $consprod="select * from MATERIALES where material = '$material'";

    $rsconsvid = mysqli_query($conex, $consprod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rsconsvid;

}

 //CONSULTAS
function consultarIdM ($id){
    $conex = conectarBD();
    $consxid = "select * from MATERIALES where idmaterial = '$id'"; //creacion de conexion y de consulta 

    $rsxid = mysqli_query($conex, $consxid);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rsxid;
}

function consultaTodoM (){

    $conex = conectarBD();
    $contod = "select * from MATERIALES"; //creacion de conexion y de consulta 

    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rscontod;    //return de la variable con la consulta
}

function consultaVentasMayoreoMat (){
    $conex = conectarBD();
    $contod = "select * from VENTAMATERIALESMAYOREO"; //creacion de conexion y de consulta 
    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rscontod;    //return de la variable con la consulta
}

function consultaVentasMenudeoMat (){
    $conex = conectarBD();
    $contod = "select * from VENTAMATERIALESMENUDEO "; //creacion de conexion y de consulta 
    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rscontod;    //return de la variable con la consulta
}

function consultaVentasMayoreoPro (){
    $conex = conectarBD();
    $contod = "select * from VENTAPRODUCTOSMAYOREO"; //creacion de conexion y de consulta 
    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rscontod;    //return de la variable con la consulta
}

function consultaVentasMenudeoPro (){
    $conex = conectarBD();
    $contod = "select * from VENTAPRODUCTOSMENUDEO"; //creacion de conexion y de consulta 
    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión
    return $rscontod;    //return de la variable con la consulta
}




function actualizarMaterial($mate,$marc,$canti,$precioc,$precioma,$preciome,$fecham,$id){
    $conex=conectarBD();
    $actualizaM= "UPDATE MATERIALES SET material= ?, marca= ?, cantidadm= ?, preciocompram= ?, preciomayoreom= ?, preciomenudeom= ?, fecham= ? WHERE idmaterial= ? ";

    try{
        $stm= $conex->prepare($actualizaM);
        $stm->bind_param('ssidddsi',$mate,$marc,$canti,$precioc,$precioma,$preciome,$fecham,$id);
        $stm->execute();
        $stm->close();



        mysqli_close($conex);

        return 1;

    } catch (Exception $e){
        echo 'Excepcion capturada: ', $e->getMessage();
    }
}

function eliminarMaterial($id){
    $conex=conectarBD();
	$elimina="DELETE FROM MATERIALES where idmaterial='$id'";

	$rseliminar=mysqli_query($conex,$elimina);
	mysqli_close($conex);

	return $rseliminar;
}

//insertarVentaMayoreoProductos
function insertarVentaProductoMayoreo($cli,$pro,$cant,$pre,$tot,$fech){
    $insert = "insert into VENTAPRODUCTOSMAYOREO (cliente,productomay,cantidadmay,preciomay,totalmay,fechamay) values (?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssidds',$cli,$pro,$cant,$pre,$tot,$fech);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos e  l insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}

//insertarVentaMayoreoMateriales
function insertarVentaMaterialesMayoreo($cli,$mat,$cant,$pre,$tot,$fech){
    $insert = "insert into VENTAMATERIALESMAYOREO (cliente,materialmay,cantidadmay,preciomay,totalmay,fechamay) values (?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssidds',$cli,$mat,$cant,$pre,$tot,$fech);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos e  l insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}

//insertarVentaMenudeoProductos
function insertarVentaProductoMenudeo($cli,$pro,$cant,$pre,$tot,$fech){
    $insert = "insert into VENTAPRODUCTOSMENUDEO (clientemen,productomen,cantidadmen,preciomen,totalmen,fechamen) values (?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssidds',$cli,$pro,$cant,$pre,$tot,$fech);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos e  l insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}

//insertarVentaMenudeoMateriales
function insertarVentaMaterialMenudeo($cli,$mat,$cant,$pre,$tot,$fech){
    $insert = "insert into VENTAMATERIALESMENUDEO (clientemen,materialmen,cantidadmen,preciomen,totalmen,fechamen) values (?,?,?,?,?,?)";
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssidds',$cli,$mat,$cant,$pre,$tot,$fech);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos e  l insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}




?>