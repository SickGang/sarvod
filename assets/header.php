<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Главная</title>
</head>
<body>
  <div id="app">
    <header>
      <div class="container">
        <div class="header_title row text-center text-sm-left">
          <div class="header_title-logo col-12 col-md-2 col-lg-1 col-sm-12 text-center mb-3 mb-md-0">
            <a href="#">
              <img src="svg/header/header-logo.svg" alt="">
            </a>
          </div>
          <div class="header_title-info col-12 col-md-10 col-lg-11 col-sm-12">
            <h1 class="text-uppercase header_title-info__head">Министерство сельского хозяйства российской федерации</h1> <br>
            <span class="header_title-info__about">Федеральное государственное бюджетное учреждение <br> “Управление мелиорации земель и сельскогохозяйственного водоснабжения по Саратовской области”. “САРАТОВМЕЛИОВОДХОЗ”</span>
          </div>
        </div>
        <div class="header_nav row justify-content-between">
          <ul class="header_nav-desktop list-unstyled text-uppercase row list-style-none d-none d-md-flex col-lg-12 col-xl-8 justify-content-between order-2 order-xl-1">
            <li><a href="">Об учереждении</a></li>
            <li><a href="">История</a></li>
            <li><a href="">Новости</a></li>
            <li><a href="">Фотогалерея</a></li>
            <li><a href="">Контакты</a></li>
            <li><a href="">Услуги</a></li>
          </ul>
          <div class="header_nav-btn order-2 col-12 d-md-none text-center" @click="showNav = !showNav">Меню <img src="svg/header/arrow-down.svg" alt=""></div>
          <transition name="fade" mode="out-in">
            <ul class="header_nav-mobile list-unstyled text-uppercase list-style-none order-2 d-md-none flex-column text-center col-12" v-if="showNav">
              <li><a href="">Об учереждении</a></li>
              <li><a href="">История</a></li>
              <li><a href="">Новости</a></li>
              <li><a href="">Фотогалерея</a></li>
              <li><a href="">Контакты</a></li>
              <li><a href="">Услуги</a></li>
            </ul>
          </transition>
          <div class="header_nav-phone col-md-12 text-center col-xl-4 text-xl-right p-0 order-1 order-xl-2">
            <a href="#">
              8 (8452) 22-74-00
            </a>
          </div>
        </div>
      </div>
    </header>
