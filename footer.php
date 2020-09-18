<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sarvodhoz
 */

?>

<footer>
  <div class="container">
    <div class="footer_wrap row">
      <div class="footer_nav col-lg-2 col-md-6 col-12">
        <div class="footer_nav-title">
          <span class="text-uppercase">Меню</span>
        </div>
        <div class="footer_nav-list">
          <?php wp_nav_menu(array(
            'menu'            => 'bottom',
            'container'       => 'ul',
            'menu_class'      => 'bottom_menu list-unstyled list-style-none flex-column',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'depth'           => 0,
          )); ?>
        </div>
      </div>
      <div class="footer_link col-lg-4 col-md-6 col-12">
        <div class="footer_link-title">
          <span class="text-uppercase">
          Полезные ссылки
          </span>
        </div>
        <div class="footer_link-list">
          <ul class="list-unstyled list-style-none flex-column">
            <li><a href="#">Анонсы</a></a></a></li>
            <li><a href="#">Министерство сельского хозяйства РФ</a></li>
            <li><a href="#">ФГБНУ ВНИИ “РАДУГА”</a></li>
            <li><a href="#">Правительство Саратовской области</a></li>
            <li><a href="#">Портал правовой информации</a></li>
            <li><a href="#">Телеканал Агро-ТВ</a></li>
            <li><a href="#">Министерство сельского хозяйства Саратовской области</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer_contacts col-lg-3 col-md-6 col-12 pl-3 pl-lg-5">
        <div class="footer_link-title">
          <span class="text-uppercase">
          Контакты
          </span>
        </div>
        <div class="footer_contacts-list">
          <ul class="list-unstyled list-style-none flex-column">
            <li><img src="<? echo get_template_directory_uri(); ?>/assets/svg/footer/footer-mail.svg" alt=""><a href="mailto:sarvodhoz@mail.ru">sarvodhoz@mail.ru</a></li>
            <li><img src="<? echo get_template_directory_uri(); ?>/assets/svg/footer/footer-phone.svg" alt=""><a href="tel:8 (8452) 22-74-00">8 (8452) 22-74-00</a></li>
          </ul>
        </div>
      </div>
      <div class="footer_social col-lg-3 col-md-6 col-12 pl-3 pl-lg-5">
        <div class="footer_link-title">
          <span class="text-uppercase">
          Соц сети
          </span>
        </div>
        <div class="footer_social-list">
          <ul class="list-unstyled list-style-none">
            <li><a href="https://www.instagram.com/sarvodhoz/" target="_blank"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/footer/instagram.svg" alt="instagram"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer_copyright text-center">“САРАТОВМЕЛИОВОДХОЗ” 2020</div>
  </div>
</footer>
</div>
<? wp_footer();  ?>
</body>
</html>
