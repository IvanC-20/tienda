<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <!-- Cabecera -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">
                    <h1>Tienda de Camisetas</h1>
                </a>
            </div>
            
        </header>
        
        <!-- Menú -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                
                <li>
                    <a href="#">Categoria 3</a>
                </li>
            </ul>
            
        </nav>
        <div id="content">
        <!-- Barra lateral -->
        <aside id="lateral">
            <div id="login" class="block-aside">
                <form action="#" method="POST"> 
                    <label for="email">Email</label>
                    <input type="email" name="email"/>
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    
                    <input type="submit" value="Enviar"/>
                </form>    
            </div>
            
            <a href="#">Mis pedidos</a>
            <a href="#">Gestionar pedidos</a>
            <a href="#">Gestionar categorias</a>
            
        </aside>
        <!-- Principal -->
        <div id="principal">
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta azul</h2>
                <p>1500 Pesos</p>
                <a href="#">Comprar</a>
            </div>
            
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta azul</h2>
                <p>1500 Pesos</p>
                <a href="#">Comprar</a>
            </div>
            
            <div class="product">
                <img src="assets/img/camiseta.png"/>
                <h2>Camiseta azul</h2>
                <p>1500 Pesos</p>
                <a href="#">Comprar</a>
            </div>
            
        </div>
    </div>  
        <!-- Pie -->
        <footer id="footer">
            <p>Desarrollado por Iván Cáceres &copy; <?=date('Y')?></p>
        </footer>
    </body>
</html>
