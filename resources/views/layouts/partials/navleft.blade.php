<?php
use App\Rol;
use Illuminate\Support\Facades\Auth;
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/icono_user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          	<?php
          	 $user = Auth::user()->name." ".Auth::user()->apellidos;
          	 echo $user;
            ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
        	<li class="header">MENÚ GENERAL</li>
        		<li>
          			<a href="/adm">
            			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
            			<span class="pull-right-container">
              				<i class="fa fa pull-right"></i>
           				 </span>
          			</a>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->usuarios;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/usuarios'>";
                            echo "<i class='fa fa-users'></i> <span>Usuarios</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->roles;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/roles'>";
                            echo "<i class='fa fa-lock'></i> <span>Roles y Permisos</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->categorias;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/categorias'>";
                            echo "<i class='fa fa-align-justify'></i> <span>Categorías</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->subcategorias;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/subcategorias'>";
                            echo "<i class='fa fa-list'></i> <span>Subcategorías</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->productos;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/productos'>";
                            echo "<i class='fa fa-shopping-cart'></i> <span>Productos</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->almacenes;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/almacenes'>";
                            echo "<i class='fa fa-industry'></i> <span>Almacenes</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
        		<li>
        			<?php 
            			$iduser = Auth::user()->idRolFK;
            			$tiporol = Rol::find($iduser)->proveedores;
            			
            			if ($tiporol === 1) {
            			    echo "<a href='/proveedores'>";
                            echo "<i class='fa fa-ship'></i> <span>Proveedores</span>";
                            echo "<span class='pull-right-container'>";
                            echo "<i class='fa fa pull-right'></i>";
                            echo "</span>";
                            echo "</a>";
            			}
        			?>
        		</li>
      	</ul>
	</section>
    <!-- /.sidebar -->
</aside>