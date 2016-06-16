<?php
/*
 * Plugin Name: Wp Barra Brasil
 * Plugin URI: https://github.com/redelivre/wp-barra-brasil
 * Description: Implementa a barra brasil no wordpress (http://barra.governoeletronico.gov.br/)
 * Version: 0.1.0
 * Author: Redelivre
 * Author URI: http://redelivre.org.br
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * */

// PHP 5.3 and later:
namespace WpBarraBrasil;

class WpBarraBrasil
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'js'));
	}
	
	/**
	 * Enqueue JavaScritps files and configs
	 */
	public function js()
	{
		wp_enqueue_script('WpBarraBrasil', plugin_dir_url(__FILE__).'/frontend/js/WpBarraBrasil.js', array('jquery'), '0.1.0', true);
		wp_enqueue_script('BarraBrasil', '//barra.brasil.gov.br/barra.js', array('WpBarraBrasil'), '0.1.0', true);
		
		$data = array(
			'element_to_prepend' => apply_filters('wp-barra-brasil-position-element', 'BODY')
		);
		
		wp_localize_script('WpBarraBrasil', 'WpBarraBrasil', $data);
	}
}

global $WpBarraBrasil;
$WpBarraBrasil = new WpBarraBrasil();
