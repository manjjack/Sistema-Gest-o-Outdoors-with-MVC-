<?php
session_start();
if (!isset($_SESSION['username'])) {
  include_once 'header.php';
} else {
  include_once 'header-gestor.php';
}
?>
<header>
  <link rel="stylesheet" href="../content/css/header.css" />
  <link rel="stylesheet" href="../content/bootstrap/bootstrap.min.css">
</header>
<a href="index.php"></a>
<script src="../scripts/custom/slide.js"></script>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="height: 75vh">
    <div class="carousel-item active">
      <img class="d-block w-100 h-75 images" src="../content/images/images-outdoors/4561.jpeg" alt="First slide">
      <div class="carousel-caption">
        <h3>Alugue um Outdoor e Destaque sua Marca para o Mundo!</h3>

      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-75 images" src="../content/images/images-outdoors/outdoor-sb.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h3>Com nossos outdoors estrategicamente localizados em áreas de grande movimento</h3>

      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-75 images" src="../content/images/images-outdoors/outdoor-Angola.jpg"
        alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h3>Não procure mais! O aluguel de um outdoor é a solução ideal para elevar sua marca a novos patamares.</h3>

      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php
include_once 'sliders.php';
?>
<div id="" class="row">
  <div class="col-md-4">
    <div class="service_box text-center">
      <img src="../content/images/logo/outdoors.png" alt="" class="service_icon" />
      <h2 class="service_title">Outdoors</h2>
      <p class="service_description">Maximize o impacto da sua mensagem com outdoors impressionantes! Nossos espaços
        publicitários ao ar livre oferecem ampla visibilidade para promover sua marca, produtos ou eventos.</p>
      <div class="more_button"><a href="info.php" class="btn btn-primary">Ler Mais</a></div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="service_box text-center">
      <img src="../content/images/logo/melhor-preco.png" alt="" class="service_icon" />
      <h2 class="service_title">Preços</h2>
      <p class="service_description">Descubra nossas opções de preços flexíveis e competitivos para anúncios em
        outdoors. Oferecemos planos personalizados que se adaptam às necessidades do seu negócio, seja para campanhas de
        curto ou longo prazo.</p>
      <div class="more_button"><a href="info.php" class="btn btn-primary">Ler Mais</a></div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="service_box text-center">
      <img src="../content/images/logo/campanhas.png" alt="" class="service_icon" />
      <h2 class="service_title">Marketing</h2>
      <p class="service_description">O marketing em outdoors é a combinação perfeita entre o poder do outdoor e as
        estratégias de marketing modernas. Aproveite o poder visual dos outdoors para promover sua marca ançar produtos,
        destacar promoções especiais</p>
      <div class="more_button"><a href="info.php" class="btn btn-primary">Ler Mais</a></div>
    </div>
  </div>
</div>


<?php

include_once 'footer.php';
?>