<?php
// session_start();

echo('<div class="menu">');
    echo('<ion-icon name="menu-outline"></ion-icon>');
    echo('<ion-icon name="close-outline"></ion-icon>');
echo('</div>');
echo('<div class="barra-lateral">');
    echo('<div>');
        echo('<div class="nombre-pagina">');
            echo('<a href="paginaprincipal.php">');
                echo('<img id="logomini" src="images/logo.png" width="1 00" alt="Logo">');
            echo('</a>');
        echo('</div>');
    echo('</div>');
    echo('<nav class="navegacion">');
        echo('<ul>');
            // echo('<li>');
            //     echo('<a href="rastrear.php">');
            //         echo('<ion-icon name="search-outline"></ion-icon>');
            //         echo('<span >Rastrear</span>');
            //     echo('</a>');
            // echo('</li>');
            echo('<li>');
                echo('<a href="paginaprincipal.php">');
                    echo('<ion-icon name="home-outline"></ion-icon>');
                    echo('<span >Pagina Principal</span>');
                echo('</a>');
            echo('</li>');
            echo('<li>');
                echo('<a href="servicios.php">');
                    echo('<ion-icon name="reload-circle-outline"></ion-icon>');
                    echo('<span >Servicios</span>');
                echo('</a>');
            echo('</li>');
            echo('<li>');
                echo('<a href="grafica.php">');
                    echo('<ion-icon name="stats-chart-outline"></ion-icon>');
                    echo('<span>Gráficas</span>');
                echo('</a>');
            echo('</li>');

            //attention mostrar solo si el rol es de Administrador
            if($_SESSION["Role"] == "Administrador"){
                /*echo('<li>');
                    echo('<a href="ventas.php">');
                        echo('<ion-icon name="wallet-outline"></ion-icon>');
                        echo('<span>Ventas</span>');
                    echo('</a>');
                echo('</li>');*/
                echo('<li>');
                    echo('<a href="usuario.php">');
                        echo('<ion-icon name="person-outline"></ion-icon>');
                        echo('<span>Usuario</span>');
                    echo('</a>');
                echo('</li>');
                //attention mostrar solo si el rol es de Administrador
            }

            echo('<li>');
            echo('<a href="php/logout.php">');
                echo('<ion-icon name="log-out-outline"></ion-icon>');
                echo('<span>Cerrar sesión</span>');
            echo('</a>');
        echo('</li>');
        echo('</ul>');
    echo('</nav>');
    echo('<div>');
        echo('<div class="linea"></div>');
        // echo('<div class="modo-oscuro">');
        //     echo('<div class="info">');
        //         echo('<ion-icon name="moon-outline"></ion-icon>');
        //         echo('<span>Dark Mode</span>');
        //     echo('</div>');
        //     echo('<div class="switch">');
        //         echo('<div class="base">');
        //             echo('<div class="circulo">');
        //             echo('</div>');
        //         echo('</div>');
        //     echo('</div>');
        // echo('</div>');
        echo('<div class="usuario">');
            echo('<img src="/Jhampier.jpg" alt="">');
            echo('<div class="info-usuario">');
                echo('<div class="nombre-email">');
                    echo('<span class="nombre">Armando</span>');
                    echo('<span class="email">Vidrios_aluminios@gmail.com</span>');
                echo('</div>');
                echo('<ion-icon name="ellipsis-vertical-outline"></ion-icon>');
            echo('</div>');
        echo('</div>');
    echo('</div>');
echo('</div>');
?>