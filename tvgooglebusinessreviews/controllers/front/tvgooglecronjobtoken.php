
<?php
/**
 * 2007-2025 PrestaShop.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2025 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class TvgoogleBusinessreviewsTvgooglecronjobtokenModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $tokenFromRequest = Tools::getValue('tvgooglecron');
        $storedToken = Configuration::get('TVGOOGLEBUSINESSREVIEWS_EMAILS_SEND_REQUEST_TOKEN');
        $emailEnabled = Configuration::get('TVGOOGLEBUSINESSREVIEWS_EMAIL_CUSTOMER_REVIEWS');
        $idShop = Tools::getValue('id_shop');

        // Compact status assignment using nested ternary operator
        $status =
            !$tokenFromRequest ? 'no_token' :
            ($tokenFromRequest !== $storedToken ? 'invalid_token' :
            (!$this->module->active ? 'module_inactive' :
            (!$emailEnabled ? 'email_disabled' : 'ok')));

        // Handle status using switch-case
        switch ($status) {
            case 'no_token':
                echo 'Token is missing';
                break;
            case 'invalid_token':
                echo 'Invalid token';
                break;
            case 'module_inactive':
                echo 'Module is inactive';
                break;
            case 'email_disabled':
                echo 'Email feature disabled';
                break;
            case 'ok':
                // Explicitly get the module instance to ensure the method is called on the correct object
                $moduleInstance = Module::getInstanceByName($this->module->name);
                if ($moduleInstance && method_exists($moduleInstance, 'sendReminderMail')) {
                    $moduleInstance->sendReminderMail($idShop);
                    echo 'Mail sent successfully';
                } else {
                    echo 'Error: Module or method not found.';
                }
                break;
            default:
                echo 'Unknown error';
                break;
        }

        exit;
    }
}
