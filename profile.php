<?php include('header.php'); ?>    
<?php include('session.php'); ?>    

<body>
  <!-- Barra de navegación -->
  <?php include('navbar.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <!-- Barra lateral izquierda -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <i class="bi bi-house-door"></i> Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-person"></i> Mi Perfil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-gear"></i> Configuraciones
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Contenido principal -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div id="masthead" class="bg-light py-4 mb-4">  
          <div class="container">
            <?php include('heading1.php'); ?>
          </div>
        </div>

        <!-- Feed de publicaciones -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10"> 
              <div class="card mb-4 shadow-sm">
                <div class="card-body">
                  <!-- Publicaciones -->
                  <div class="row g-4">    
                    <?php
                      $query = $conn->query("SELECT * FROM post LEFT JOIN members ON members.member_id = post.member_id ORDER BY post_id DESC");
                      while ($row = $query->fetch()) {
                        $posted_by = $row['firstname'] . " " . $row['lastname'];
                        $posted_image = $row['image'];
                        $id = $row['post_id'];
                    ?>
                      <div class="col-md-2 col-sm-3 text-center">
                        <img src="<?php echo $posted_image; ?>" alt="User Image" class="img-fluid rounded-circle shadow" style="width:100px;height:100px;">
                      </div>
                      <div class="col-md-10 col-sm-9">
                        <div class="card border-0 bg-light mb-3">
                          <div class="card-body">
                            <p class="card-text"><?php echo $row['content']; ?></p>
                            <div class="row align-items-center">
                              <div class="col-md-9">
                                <span class="badge bg-info text-dark"><?php echo $row['date_posted']; ?></span>
                                <small class="text-muted d-block">Posteado por: 
                                  <a href="#" class="text-decoration-none text-primary fw-bold"><?php echo $posted_by; ?></a>
                                </small>
                              </div>
                              <div class="col-md-3 text-end">
                                <a href="delete_post.php<?php echo '?id='.$id; ?>" class="btn btn-outline-danger btn-sm">
                                  <i class="bi bi-trash"></i> Borrar
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie de página -->
        <?php include('footer.php'); ?>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
