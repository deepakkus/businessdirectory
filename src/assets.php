<?php
class Assets
{
  /**
   * class Assets
   * 
   * @author Kus Developer
   */
  /**
   * Init hooks
   */
  public function init()
  {
    add_action('wp_enqueue_scripts', array($this, 'register_assets'), 20);
    add_action('admin_enqueue_scripts', array($this, 'register_assets'));
    add_action('admin_enqueue_scripts', array($this, 'register_js'));
  }
  public function register_js()
  {
    wp_enqueue_script(
      'kusbus',
      $this->get_js_file_base_uri('kus-bus.js'),
      array('jquery')
    );
    wp_register_script(
      'ajaxHandle',
      $this->get_js_file_base_uri('kus-bus-ajax.js'),
      array(),
      false,
      true
    );
    wp_register_script(
      'rankmath',
      $this->get_js_file_base_uri('kus-bus-rankmath.js'),
      array(),
      false,
      true
    );
    wp_enqueue_script('ajaxHandle');
    wp_localize_script(
      'ajaxHandle',
      'ajax_object',
      array('ajaxurl' => admin_url('admin-ajax.php'))
    );
    if (!did_action('wp_enqueue_media')) {
      wp_enqueue_media();
    }
  }
  /**
   * Load all assets
   */
  public function register_assets()
  {
    wp_enqueue_style(
      'main',
      $this->get_css_file_base_uri('main.css'),
      [],
      false
    );
    //wp_deregister_script('jquery');
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    //wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script('boot2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '', true);
    wp_enqueue_script('boot3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);

    //wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.7.1.min.js');
  }

  /**
   * Get css base uri
   * 
   * @param string $file_name
   * @return string
   */

  public function get_css_file_base_uri($file_name)
  {
    return (defined('KUS_Business_Directory_URL') == true) ? KUS_Business_Directory_URL . 'assets/css/' . $file_name : '';
  }

  /**
   * Get css base uri
   * 
   * @param string $file_name
   * @return string
   */
  public function get_js_file_base_uri($file_name)
  {
    return (defined('KUS_Business_Directory_URL') == true) ? KUS_Business_Directory_URL . 'assets/js/' . $file_name : '';
  }
}
