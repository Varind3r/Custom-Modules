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

class TvgooglebusinessReviewsclass extends ObjectModel
{
    public $customer_id;

    public $email_sent;

    public static $definition = [
        'table' => 'tvgooglebusinessreviews_log',
        'primary' => 'id_tvgooglebusinessreviews_log',
        'multilang' => false,
        'fields' => [
            'customer_id' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'],
            'email_sent' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
        ],
    ];

    public static function getSendmailByIdCustomer($customer_id)
    {
        $tvmail = 'SELECT tvgoogle.`email_sent`
            FROM `' . _DB_PREFIX_ . 'tvgooglebusinessreviews_log` tvgoogle
            WHERE tvgoogle.`customer_id`=' . (int) $customer_id;

        return Db::getInstance()->getValue($tvmail);
    }
}
