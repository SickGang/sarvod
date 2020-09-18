<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sarvodhoz
 */
 /*
 Template Post Type: post
 */

get_header();
?>

<main>
  <div class="container">
    <div class="branch-wrap pt-4 pb-5">
      <div class="branch_title pb-3">
        <? the_title(); ?>
      </div>
      <div class="branch_detail">
        <? the_content(); ?>
      </div>
      <div class="branch_mail pb-2 pt-4">
        Почта: <? the_field('email_uslugi'); ?>
      </div>
      <div class="branch_phone pb-2">
        Телефон: <? the_field('telephone_uslugi'); ?>
      </div>
      <div class="branch_adress pb-2">
        Филиал расположен по адресу: <? the_field('adress_uslugi'); ?>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
