<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PickBazar.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/input.css">
    <link rel="stylesheet" href="{{asset('ui/frontend')}}/style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.2/dist/full.min.css" rel="stylesheet" type="text/css" />

      <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

      <!-- Demo styles -->
      <style>
        html,
        body {
          position: relative;
          height: 100%;
        }

        body {
          background: #eee;
          font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
          font-size: 14px;
          color: #000;
          margin: 0;
          padding: 0;
        }

        .swiper {
          width: 100%;
          height: 25%;
        }

        .swiper-slide {
          text-align: center;
          font-size: 18px;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .swiper-slide img {
          display: block;
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      </style>
</head>
<body>

@include('frontend.navbar')
<!-- carousel -->
@include('frontend.carousel')

<!-- carousel end-->
@include('frontend.slider')

@include('frontend.drawer')






<script src="https://cdn.tailwindcss.com"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>

