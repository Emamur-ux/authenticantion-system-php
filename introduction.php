
<?php
include_once "./database/env.php";
$query = "SELECT * FROM banners LIMIT 1";
$res = mysqli_query($db, $query);
$banner =mysqli_fetch_assoc($res);


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portfolio Hero</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Poppins',sans-serif;
    }

    html{
      scroll-behavior:smooth;
    }

    body{
      background:#111;
      overflow-x:hidden;
    }

    /* ================= NAVBAR ================= */

    .navbar{
      width:100%;
      position:fixed;
      top:0;
      left:0;
      z-index:1000;
      padding:20px 70px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      background:rgba(0,0,0,0.35);
      backdrop-filter:blur(5px);
    }

    .logo{
      color:#fff;
      font-size:42px;
      font-weight:700;
    }

    .nav-links{
      display:flex;
      gap:40px;
      list-style:none;
    }

    .nav-links a{
      color:#fff;
      text-decoration:none;
      font-size:18px;
      transition:.3s;
    }

    .nav-links a:hover,
    .nav-links .active{
      color:#00d9b6;
    }

    .social-icons{
      display:flex;
      gap:20px;
    }

    .social-icons i{
      color:#fff;
      font-size:20px;
      cursor:pointer;
      transition:.3s;
    }

    .social-icons i:hover{
      color:#00d9b6;
    }

    /* ================= HERO ================= */

    .hero{
      width:100%;
      min-height:100vh;
      background:
      linear-gradient(rgba(0,0,0,0.65),rgba(0,0,0,0.65)),
      url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop');
      background-size:cover;
      background-position:center;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:120px 8%;
    }

    .hero-container{
      width:100%;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:40px;
    }

    .hero-text{
      flex:1;
      color:#fff;
    }

    .hero-text h4{
      font-size:42px;
      margin-bottom:10px;
      font-weight:500;
    }

    .hero-text h1{
      font-size:85px;
      line-height:1.1;
      margin-bottom:20px;
      font-weight:700;
    }

    .typing{
      color:#fff;
      border-right:4px solid #00d9b6;
      white-space:nowrap;
      overflow:hidden;
      display:inline-block;
    }

    .hero-text p{
      font-size:26px;
      color:#ddd;
      margin-bottom:40px;
    }

    /* Buttons */

    .btn-group{
      display:flex;
      gap:20px;
      flex-wrap:wrap;
    }

    .btn{
      padding:16px 40px;
      border-radius:50px;
      font-size:18px;
      font-weight:500;
      text-decoration:none;
      transition:.4s;
      display:inline-block;
    }

    .hire-btn{
      border:2px solid #00d9b6;
      color:#00d9b6;
    }

    .hire-btn:hover{
      background:#00d9b6;
      color:#fff;
      transform:translateY(-5px);
    }

    .cv-btn{
      background:#00d9b6;
      color:#fff;
      border:2px solid #00d9b6;
    }

    .cv-btn:hover{
      background:transparent;
      color:#00d9b6;
      transform:translateY(-5px);
    }

    /* RIGHT IMAGE */

    .hero-image{
      flex:1;
      display:flex;
      justify-content:center;
      align-items:center;
    }

    .hero-image img{
      width:420px;
      height:420px;
      object-fit:cover;
      border-radius:50%;
      border:8px solid rgba(255,255,255,0.1);
      box-shadow:0 0 40px rgba(0,217,182,0.4);
    }

    /* DOWN ICON */

    .down-icon{
      position:absolute;
      bottom:30px;
      left:50%;
      transform:translateX(-50%);
      color:#fff;
      font-size:28px;
      animation:move 1.5s infinite;
    }

    @keyframes move{
      0%{
        transform:translate(-50%,0);
      }
      50%{
        transform:translate(-50%,10px);
      }
      100%{
        transform:translate(-50%,0);
      }
    }

    /* RESPONSIVE */

    @media(max-width:1100px){

      .hero-container{
        flex-direction:column-reverse;
        text-align:center;
      }

      .hero-text h1{
        font-size:60px;
      }

      .hero-text p{
        font-size:22px;
      }

      .btn-group{
        justify-content:center;
      }

      .hero-image img{
        width:320px;
        height:320px;
      }

      .navbar{
        padding:20px 30px;
      }

      .nav-links{
        display:none;
      }
    }

    @media(max-width:600px){

      .hero-text h4{
        font-size:28px;
      }

      .hero-text h1{
        font-size:42px;
      }

      .hero-text p{
        font-size:18px;
      }

      .hero-image img{
        width:250px;
        height:250px;
      }

      .btn{
        width:100%;
        text-align:center;
      }
    }

  </style>
</head>
<body>

  <!-- ================= NAVBAR ================= -->

  <nav class="navbar">

    <div class="logo">Simone</div>

    <ul class="nav-links">
      <li><a href="#" class="active">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">What I Do</a></li>
      <li><a href="#">Resume</a></li>
      <li><a href="#">Portfolio</a></li>
      <li><a href="#">Client</a></li>
      <li><a href="#">Contact</a></li>
    </ul>

    <div class="social-icons">
      <i class="fa-brands fa-twitter"></i>
      <i class="fa-brands fa-facebook-f"></i>
      <i class="fa-solid fa-globe"></i>
    </div>

  </nav>




  <?php
  if(isset($banner)){
    ?>

<section class="hero">

  

    <div class="hero-container">

      <!-- LEFT CONTENT -->

      <div class="hero-text">

        <h4>Welcome</h4>

        <h1>
          I'm emon<?=$banner['title'] ?>
          <span class="typing"></span>
        </h1>

        <p>based in Los Angeles, California.</p>

      <div class="btn-group">

  <a href="<?= $banner['cta_links'] ?>" class="btn hire-btn">
    <?= $banner['cta'] ?>
  </a>

  <?php
  if(isset($banner['cv']) && !empty($banner['cv'])){
  ?>

    <a href="<?= $banner['cv'] ?>" download class="btn cv-btn"  download=  "<?= $banner['cv'] ?>"
    >Download CV</a>

  <?php
  }
  ?>

</div>
      </div>

      <!-- RIGHT IMAGE -->

      <div class="hero-image">
        <img src="<?= $banner['image'] ?>"
          alt="">
      </div>

    </div>

    <div class="down-icon">
      <i class="fa-solid fa-chevron-down"></i>
    </div>

  </section>

<?php
  }
  
  ?>
  <!-- ================= HERO ================= -->

  
  
  
  

  <!-- ================= JS ================= -->

  

  </body>
</html>




<?php

include_once "../layouts/footer.php";
?>


