<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sarvodhoz
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title><? the_title(); ?> - Саратовмелиоводхоз</title>
  <meta name="google-site-verification" content="JgepmaWjQ7gf8nfDoXQoTwPclwupXDPPrqXcHchdQvE" />
	<? wp_head(); ?>
</head>
<body>
  <div id="app">
    <header>
      <div class="container">
        <div class="header_title row text-center text-sm-left">
          <div class="header_title-logo col-12 col-md-2 col-lg-1 col-sm-12 text-center mb-3 mb-md-0">
            <a href="/">
              <img src="<? echo get_template_directory_uri(); ?>/assets/svg/header/header-logo.svg" alt="">
            </a>
          </div>
          <div class="header_title-info col-12 col-md-10 col-lg-11 col-sm-12">
            <h1 class="text-uppercase header_title-info__head">Министерство сельского хозяйства российской федерации</h1> <br>
            <span class="header_title-info__about">Федеральное государственное бюджетное учреждение <br> “Управление мелиорации земель и сельскогохозяйственного водоснабжения по Саратовской области”. “САРАТОВМЕЛИОВОДХОЗ”</span>
          </div>
        </div>
        <div class="header_nav row justify-content-between">
					<?php wp_nav_menu(array(
						'menu'            => 'top',
						'container'       => 'ul',
						'menu_class'      => 'header_nav-desktop list-unstyled text-uppercase row list-style-none d-none d-md-flex col-lg-12 col-xl-8 justify-content-between order-2 order-xl-1',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'depth'           => 0,
					)); ?>
          <div class="header_nav-btn order-2 col-12 d-md-none text-center" @click="showNav = !showNav">МЕНЮ <img src="<? echo get_template_directory_uri(); ?>/assets/svg/header/arrow-down.svg" alt=""></div>
          <transition name="fade" mode="out-in" v-if="showNav">
              <?php wp_nav_menu(array(
                'menu'            => 'top',
                'container'       => 'ul',
                'menu_class'      => 'header_nav-mobile list-unstyled text-uppercase list-style-none order-2 d-md-none flex-column text-center col-12',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'depth'           => 0,
              )); ?>
          </transition>
          <div class="header_nav-phone col-md-12 text-center col-xl-4 text-xl-right p-0 order-1 order-xl-2">
            <a href="#">
              8 (8452) 22-74-00
            </a>
          </div>
        </div>
      </div>
    </header>
