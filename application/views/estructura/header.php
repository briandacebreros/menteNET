<HTML>
<HEAD>
	<title>MenteNET</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dark.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/ekko-lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/lightbox.min.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    


</HEAD>
<BODY>


    <!-- NAVBAR -->
    <?php if(@$_SESSION['tipo_usuario'] == '') : ?>
    <div class="navbar-container">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-nav.svg" alt="Mentenet logo" id="logo-nav"></a>
        <div class="menu-container">
            <a href="servicios.php" class="menu-option">SERVICIOS</a>
            <a href="blog.php" class="menu-option">BLOG</a>
            <a href="contacto.php" class="menu-option">CONT&Aacute;CTAME</a>
            <a href="login.php" class="menu-register"><span>REG&Iacute;STRATE</span></a>
        </div>
    </div>
    <?php endif; ?>
    <!-- end NAVBAR -->

    <!-- NAVBAR -->
    <?php if(@$_SESSION['tipo_usuario'] == 'normal') : ?>
            <div class="navbar-container">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-nav.svg" alt="Mentenet logo" id="logo-nav"></a>
                <div class="menu-container">
                    <a href="servicios.php" class="menu-option">SERVICIOS</a>
                    <a href="blog.php" class="menu-option">BLOG</a>
                    <a href="contacto.php" class="menu-option">CONT&Aacute;CTAME</a>
                    <div class="menu-account accionador-menu"><img src="<?php echo base_url(); ?>assets/images/account.svg" alt=""></div>
                    <div class="cita-tile-menu-desplegado menu-desplegado account-menu-nav"><a href="">MI CUENTA</a><a href="">AYUDA</a><a href="<?php echo base_url(); ?>/principal/cerrar_sesion">DESCONECTAR</a></div>
                </div>
            </div>
    <?php endif; ?>
    <!-- end NAVBAR -->

    <!-- NAVBAR -->
    <?php if(@$_SESSION['tipo_usuario'] == 'admin') : ?>
        <div class="navbar-container">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-nav.svg" alt="Mentenet logo" id="logo-nav"></a>
            <div class="menu-container">
                <div class="menu-account accionador-menu"><img src="images/account.svg" alt=""></div>
                <div class="cita-tile-menu-desplegado menu-desplegado account-menu-nav"><a href="">MI CUENTA</a><a href="">AYUDA</a><a href="">DESCONECTAR</a></div>
            </div>
        </div>
        <div class="container-general">
            <div class="menu-admin">
                <a href="<?php echo base_url(); ?>admin/clientes">CLIENTES</a>
                <a href="<?php echo base_url(); ?>admin/citas">CITAS</a>
                <a href="<?php echo base_url(); ?>admin/calendario">CALENDARIO</a>
                <a href="<?php echo base_url(); ?>admin/convenios">CONVENIOS</a>
                <a href="<?php echo base_url(); ?>admin/precios">PRECIOS</a>
            </div>
    <?php endif; ?>
    <!-- end NAVBAR -->