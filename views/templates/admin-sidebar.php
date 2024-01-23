<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-user"></i>
            <span class="dashboard__menu-texto">
                Perfil
            </span>    
        </a>

        <a href="/admin/mediciones" class="dashboard__enlace <?php echo pagina_actual('/mediciones') ? 'dashboard__enlace--actual' : ''; ?> ">
        <i class="fa-sharp fa-solid fa-droplet"></i>
            <span class="dashboard__menu-texto">
                Glucemia
            </span>    
        </a>

        <a href="/admin/presion" class="dashboard__enlace <?php echo pagina_actual('/presion') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-stethoscope"></i>
            <span class="dashboard__menu-texto">
                Presión
            </span>    
        </a>

        <!-- <a href="/admin/doctor" class="dashboard__enlace <?php echo pagina_actual('/doctor') ? 'dashboard__enlace--actual' : ''; ?> ">
        <i class="fa-solid fa-user-doctor"></i>
            <span class="dashboard__menu-texto">
                Doctor
            </span>    
        </a> -->

        
        <a href="/admin/tratamiento" class="dashboard__enlace <?php echo pagina_actual('/tratamiento') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-pills"></i>
            <span class="dashboard__menu-texto">
                Tratamiento
            </span>    
        </a>
    </nav>
</aside>