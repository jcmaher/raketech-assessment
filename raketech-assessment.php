<?php
/**
 * Raketech Assessment 
 *
 * @package       RAKETECHAS
 * @author        Joshua Maher
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Raketech Assessment 
 * Plugin URI:    https://mydomain.com
 * Description:   Raketech assessment of Toplist data manipulation
 * Version:       1.0.0
 * Author:        Joshua Maher
 * Author URI:    https://your-author-domain.com
 * Text Domain:   raketech-assessment
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Raketech Assessment . If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'RAKETECHAS_NAME',			'Raketech Assessment ' );

// Plugin version
define( 'RAKETECHAS_VERSION',		'1.0.0' );

// Plugin Root File
define( 'RAKETECHAS_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'RAKETECHAS_PLUGIN_BASE',	plugin_basename( RAKETECHAS_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'RAKETECHAS_PLUGIN_DIR',	plugin_dir_path( RAKETECHAS_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'RAKETECHAS_PLUGIN_URL',	plugin_dir_url( RAKETECHAS_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once RAKETECHAS_PLUGIN_DIR . 'core/class-raketech-assessment.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Joshua Maher
 * @since   1.0.0
 * @return  object|Raketech_Assessment
 */
function RAKETECHAS() {
	return Raketech_Assessment::instance();
}

RAKETECHAS();
