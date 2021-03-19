<nav class="main-nav" id="main-nav">
							<ul class="menu">
							
							<li class="menu__item"><a class="menu__link" href="objetivos.php">Objetivos</a></li>
							<li class="menu__item"><a class="menu__link" href="nosotros.php">Nosotros</a></li>
							
								</ul>

						<p style="color:white;">MATILDE LANZA</<p><div class="menu-bar" id="menu"> 
							<div class="uno"></div>
							<div class="dos"></div>
							<div class="tres"></div>
							</div>
</nav>
 
<style>

  
  .main-nav {
    background: #03466F;
    height: 30px;
    width: auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top:35px;
    
  }
  .menu {
    transition: all 0.5s;
    margin: 0;
    padding: 10px;
    list-style: none;
    display: flex;
    opacity: 0;
    visibility: hidden;
    
  }
  .menu__item {
    margin: 0 20px;
  }
  .menu__link { /*tamano letra nostors y objetivos*/
    color: #F5D2B5;
    font-size:12pt;
    text-decoration: none;
  
  }
  .menu-bar {
    width: 20px; /*tamano imagen menu*/
    margin: 0 10px; /*espacio entre letras menu matilde lanza y la imagen de menu*/
    cursor: pointer;
  }
  .uno, .dos, .tres {
    width: 100%;
    background: white;
    height: 3px;
    transition: all 0.5s;
  }
  .dos {
    margin: 5px 0;
  }
  /*animacion*/
  
  .mostrar  .uno {
    transform: rotate(45deg) translate(5px, 5px);
  }
  .mostrar .dos {
    opacity: 0;
  }
  .mostrar .tres {
    transform: rotate(-45deg) translate(6px, -7px);
  }
  .mostrar .menu{
    visibility: visible;
    opacity: 2;
  }
  @media screen and (max-width:1000px ) {
    .main-nav {
    background: #03466F;
    height: 40px;
    width: auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top:50px;
  }
  }
  @media screen and (max-width:999px ) {
    .main-nav {
    background: #03466F;
    height: 40px;
    width: auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top:65px;
  }
  }

  @media screen and (max-width:780px ) {
    .main-nav {
    background: #03466F;
    height: 40px;
    width: auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top:155px;
  }
  }

  
</style> 

<script>
var nav = document.getElementById('main-nav');
var menu = document.getElementById('menu');
menu.addEventListener('click', function () {
  'use strict';
  nav.classList.toggle('mostrar');
});

</script>