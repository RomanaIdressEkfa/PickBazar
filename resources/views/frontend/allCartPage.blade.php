<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PickBazar.com</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('ui/backend')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('ui/backend')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('ui/backend')}}/https://fonts.gstatic.com" rel="preconnect">
  <link href="{{asset('ui/backend')}}/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('ui/backend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('ui/backend')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('ui/backend')}}/assets/css/style.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('ui/frontend')}}/input.css">
  {{-- <link rel="stylesheet" href="{{asset('ui/frontend')}}/style.css"> --}}
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.2/dist/full.min.css" rel="stylesheet" type="text/css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

<div class="container border border-light shadow p-4 rounded">
    <h3 class=" text-primary mb-4 text-center" style='font-weight:bold'>ALL CART LIST</h3>
  <table class="table table-bordered rounded table-sm">
    <thead >
      <tr >
        <th class="bg-dark bg-gradient text-white w-80">IMAGE</th>
        <th class="bg-dark bg-gradient text-white">PRODUCT</th>
        <th class="bg-dark bg-gradient text-white">PRICE</th>
        <th class="bg-dark bg-gradient text-white">QUANTITY</th>
        <th class="bg-dark bg-gradient text-white">SUB-TOTAL</th>
        <th class="bg-dark bg-gradient text-white">ACTION</th>
      </tr>
    </thead>
    <tbody>
        @php
            $total=0
        @endphp
@if (session('cart'))
@foreach  (session('cart') as $id=>$details)
@php
    $total+=$details['price']*$details['quantity']
@endphp

        <tr data-id="{{$id}}">
            <td>
                    <img style="width:200px;" src="{{ asset('images/fruits/')}}/{{$details['image']}}" alt="image">

            </td>
            <td>{{$details['name']}}</td>
            <td>
                {{$details['price']}}
            </td>
            <td data-th="Quantity">
                <input type="number" value="{{$details['quantity']}}" class="form-control quantity " min="1" />

            </td>
            <td>{{$details['price']*$details['quantity']}}</td>


            {{-- <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$customer->address}}</td> --}}
            <td>
                {{-- <a data-modal-target="crud-modal-2_{{$fruit->id}}" data-modal-toggle="crud-modal-2_{{$fruit->id}}"  type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a> --}}

                {{-- <button  data-modal-target="crud-modal-2" data-modal-toggle="crud-modal-2"  class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Edit
                   </button> --}}
                <a href="#" onclick="return confirm('Are you sure to delete?')" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
            </td>
          </tr>

        @endforeach
        @endif
      <!-- Add more rows as needed -->
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: right"> <h3><strong>Total ${{$total}}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right">
                <a href="{{url('/')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>CONTINUE SHOPPING </a>
<button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i>
    CHECKOUT
</button>
            </td>
        </tr>
    </tfoot>
  </table>
</div>

 <!-- Vendor JS Files -->
 <script src="{{asset('ui/backend')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/chart.js/chart.umd.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/echarts/echarts.min.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/quill/quill.min.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="{{asset('ui/backend')}}/assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="{{asset('ui/backend')}}/assets/js/main.js"></script>
 <script src="https://cdn.tailwindcss.com"></script>


<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-e5STZUs8i4MKQE6P/wxBXzquZq1TsLFtrGBsH75qbyIbbV9EP5C7nyFOy2u7b3jF" crossorigin="anonymous"></script>
</body>
