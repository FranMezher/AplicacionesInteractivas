<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mezher Motors</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <?php
    // Conexión a la base de datos
    include("admin/conexion.php");
    $query = "SELECT * FROM autos";
    $resultado = mysqli_query($conn, $query);
    $totalAutos = mysqli_num_rows($resultado);
    ?>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
        <div class="container">
            <div class="row gx-0 align-items-center" style="height: 45px;">
                <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <a href="#contact" class="text-muted me-4"><i
                                class="fas fa-map-marker-alt text-primary me-2"></i>Buscanos Aqui</a>
                        <a href="https://api.whatsapp.com/send?phone=5491166179112&text=Hola!%20Quisiera%20información%20sobre%20los%20autos"
                            target="_blank" class="text-muted me-4">
                            <i class="fas fa-phone-alt text-primary me-2"></i>+54 9 1166179112
                        </a>

                        <a href="#contact" class="text-muted me-0"><i
                                class="fas fa-envelope text-primary me-2"></i>mezherg43@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="admin/index.php" class="btn btn-primary rounded-pill py-2 px-4">Iniciar Sesion</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Mezher Motors</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item active text-primary">Home</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Car categories Start -->
    <?php
    $query = "SELECT autos.*, categorias.categoria AS nombre_categoria
          FROM autos
          JOIN categorias ON autos.id_categoria = categorias.id_categoria";
    $resultado = mysqli_query($conn, $query);
    $totalAutos = mysqli_num_rows($resultado);
    ?>
    <div class="container-fluid categories py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Nuestros <span class="text-primary">Autos</span></h1>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>

            <?php if ($totalAutos >= 3): ?>
                <!-- Carrusel para 3 o más autos -->
                <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <div class="categories-item p-4">
                            <div class="categories-item-inner">
                                <div class="categories-img rounded-top">
                                    <img src="<?php echo str_replace('../', '', $fila['imagen']); ?>"
                                        class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="categories-content rounded-bottom p-4">
                                    <h4><?php echo $fila['nombre']; ?></h4>
                                    <div class="mb-4">
                                        <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">
                                            $<?php echo $fila['precio']; ?></h4>
                                    </div>
                                    <a href="#"
                                        class="btn btn-primary rounded-pill d-flex justify-content-center py-3"><?php echo $fila['marca']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            <?php else: ?>
                <!-- Cards para menos de 3 autos -->
                <div class="row g-4">
                    <?php mysqli_data_seek($resultado, 0); // Reiniciamos el puntero de resultados ?>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <div class="col-lg-4 wow fadeInUp container-fluid blog" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="<?php echo str_replace('../', '', $fila['imagen']); ?>"
                                        class="img-fluid rounded-top w-100" alt="Imagen de <?php echo $fila['nombre']; ?>">
                                </div>
                                <div class="blog-content rounded-bottom p-4">
                                    <div class="blog-date"><?php echo $fila['nombre_categoria']; ?></div>
                                    <div class="blog-comment my-3">
                                        <div class="small">
                                            <span class="fa fa-car text-primary"></span>
                                            <span class="ms-2"><?php echo $fila['marca']; ?></span>
                                        </div>
                                        <div class="small">
                                            <span class="fa fa-dollar-sign text-primary"></span>
                                            <span class="ms-2">$<?php echo $fila['precio']; ?></span>
                                        </div>
                                    </div>
                                    <a href="#" class="h4 d-block mb-3"><?php echo $fila['nombre']; ?></a>
                                    <a href="#" class="">Book Now <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            <?php endif; ?>

        </div>
    </div>

    <!-- Car categories End -->

    <!-- Footer Start -->
    <div class="container-fluid contact py-5" id="contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Contacta con nosotros</h4>
                        <form id="form">
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="nombre"
                                            placeholder="Ingrese su nombre">
                                        <label for="name">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Ingrese su Email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control" id="phone" name="phone"
                                            placeholder="Ingrese su telefono">
                                        <label for="phone">Telefono</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="marca" name="marca"
                                            placeholder="Ingrese la marca del auto">
                                        <label for="project">Marca</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Asunto"
                                            name="subject">
                                        <label for="subject">Asunto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Dejanos un mensaje aqui"
                                            name="mensaje" id="mensaje" style="height: 160px"></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type='submit' id='button' class="btn btn-light w-100 py-3"
                                        value="Send Email">Enviar Mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex flex-xl-column align-items-center justify-content-center">
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-0 me-0 me-xl-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 bg-light rounded">
                        <div class="rounded">
                            <iframe class="rounded w-100" style="height: 533px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13135.504159191734!2d-58.50967880279391!3d-34.60729594935323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb620cc2c2d77%3A0x37eac0cdbf696d7b!2sComuna%2011%2C%20Santo%20Tom%C3%A9%203248%2C%20C1417GFS%20Cdad.%20Aut%C3%B3noma%20de%20Buenos%20Aires!5e0!3m2!1sen!2sar!4v1748614564114!5m2!1sen!2sar"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

    <script type="text/javascript">
        emailjs.init('cbtBQq5TyNi14DDgc')
    </script>


    <!-- Template Javascript -->
    <script src="js/mail.js"></script>
    <script src="js/main.js"></script>
</body>

</html>