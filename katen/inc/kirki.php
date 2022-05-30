<?php

define('KATEN_CUSTOMIZER_PANEL_ID', 'katen_customizer_panel');

if (class_exists('Kirki')) {

   new \Kirki\Panel(
      KATEN_CUSTOMIZER_PANEL_ID,
      [
         'priority'         => 200,
         'title'            => esc_html__('Katen Theme Options', 'katen'),
         'description'      => esc_html__('Katen Settings', 'katen'),
      ]
   );

   /*:::::::::::::::::::: Social Section Start ::::::::::::::::::::*/
   new \Kirki\Section(
      'katen_social_section',
      [
         'title'            => esc_html__('Social Settings', 'katen'),
         'panel'            => KATEN_CUSTOMIZER_PANEL_ID,
         'priority'         => 160,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_facebook_url_setting',
         'label'    => esc_html__('Facebook URL', 'katen'),
         'section'  => 'katen_social_section',
         'default'  => 'https://facebook.com/',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_twitter_url_setting',
         'label'    => esc_html__('Twitter URL', 'katen'),
         'section'  => 'katen_social_section',
         'default'  => 'https://twitter.com/',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_instagram_url_setting',
         'label'    => esc_html__('Instagram URL', 'katen'),
         'section'  => 'katen_social_section',
         'default'  => 'https://instagram.com/',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_pinterest_url_setting',
         'label'    => esc_html__('Pinterest URL', 'katen'),
         'section'  => 'katen_social_section',
         'default'  => 'https://pinterest.com/',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_medium_url_setting',
         'label'    => esc_html__('Medium URL', 'katen'),
         'section'  => 'katen_social_section',
         'default'  => 'https://medium.com/',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\URL(
      [
         'settings' => 'katen_social_youtube_url_setting',
         'label'    => esc_html__('Youtube URL', 'katen'),
         'section'  => 'katen_social_section',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   /*:::::::::::::::::::: Social Section End ::::::::::::::::::::*/

   /*:::::::::::::::::::: Contact Section Start ::::::::::::::::::::*/
   new \Kirki\Section(
      'katen_contact_section',
      [
         'title'            => esc_html__('Contact Settings', 'katen'),
         'panel'            => KATEN_CUSTOMIZER_PANEL_ID,
         'priority'         => 160,
         'active_callback' => function () {
            return is_page_template('page-templates/contact.php');
         }
      ]
   );
   new \Kirki\Field\Text(
      [
         'settings' => 'katen_contact_phone_number_setting',
         'label'    => esc_html__('Phone Number', 'katen'),
         'section'  => 'katen_contact_section',
         'default'  => '+1-202-555-0135',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\Text(
      [
         'settings' => 'katen_contact_email_address_setting',
         'label'    => esc_html__('Email Address', 'katen'),
         'section'  => 'katen_contact_section',
         'default'  => 'hello@example.com',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   new \Kirki\Field\Text(
      [
         'settings' => 'katen_contact_location_setting',
         'label'    => esc_html__('Location', 'katen'),
         'section'  => 'katen_contact_section',
         'default'  => 'Chechenia, Russia',
         'transport' => 'auto',
         'priority' => 10,
      ]
   );
   /*:::::::::::::::::::: Contact Section End ::::::::::::::::::::*/
}
