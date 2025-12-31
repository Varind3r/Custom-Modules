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

require_once _PS_MODULE_DIR_ . 'tvgooglebusinessreviews/classes/tvgooglebusinessreviewsclass.php';

class Tvgooglebusinessreviews extends Module
{
    protected $config_form = false;

    private $configurations = [
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_SELECT_PAID_AND_FREE_API_DATA' => [
            'form_data' => 'first_form',
            'defalt_data' => 'free'],
        'TVGOOGLEBUSINESSREVIEWS_PAID_GOOGLE_MAP_API_KEY' => [
            'form_data' => 'first_form',
            'requireds' => true,
            'defalt_data' => '18'],
        'TVGOOGLEBUSINESSREVIEWS_PAID_PLACE_ID_API_KEY' => [
            'form_data' => 'first_form',
            'requireds' => true,
            'defalt_data' => 'xxxxxxxxxxx'],
        'TVGOOGLEBUSINESSREVIEWS_PLACE_ID_API_KEY' => [
            'form_data' => 'first_form',
            'requireds' => true,
            'defalt_data' => 'xxxxxxxxxxx'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE' => [
            'form_data' => 'first_form',
            'multi_lang' => true,
            'requireds' => true,
            'defalt_data' => 'Google\'s Reviews'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_LANGUAGE' => [
            'form_data' => 'first_form',
            'defalt_data' => 'en'],
        'TVGOOGLEBUSINESSREVIEWS_SORT_OPTION' => [
            'form_data' => 'first_form',
            'defalt_data' => 'newest'],
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_LANGUAGE' => [
            'form_data' => 'first_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION' => [
            'form_data' => 'secound_form',
            'defalt_data' => 'displayHome'],
        'TVGOOGLEBUSINESSREVIEWS_MOBILE_IN_HIDE' => [
            'form_data' => 'secound_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_POPUP' => [
            'form_data' => 'first_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_PLACES_NAME_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_NAME_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_YEAR_AGO_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_STAR_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_WRITE_REVIEWS_BUTTON_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_REVIEWS_COUNT_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_STATUS' => [
            'form_data' => 'first_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HOME_VIEWS' => [
            'form_data' => 'secound_form',
            'defalt_data' => 'slider_view'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION_ALIGNMENT' => [
            'form_data' => 'secound_form',
            'defalt_data' => 'top_right'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_FOOTER_POSITION_ALIGNMENT' => [
            'form_data' => 'secound_form',
            'defalt_data' => 'left'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_BORDER_COLOR' => [
            'form_data' => 'secound_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_COLOR' => [
            'form_data' => 'secound_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_STAR_COLOR' => [
            'form_data' => 'secound_form',
            'defalt_data' => '0'],
        'TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_STATUS_FOR_TRIGGERING' => [
            'form_data' => 'third_form',
            'defalt_data' => '5'],
        'TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_NUMBER_OF_DAYS' => [
            'form_data' => 'third_form',
            'defalt_data' => '1'],
        'TVGOOGLEBUSINESSREVIEWS_EMAIL_CUSTOMER_REVIEWS' => [
            'form_data' => 'third_form',
            'defalt_data' => '1'],
    ];

    public $tvcanonicalUrl;

    public function __construct()
    {
        $this->name = 'tvgooglebusinessreviews';
        $this->tab = 'front_office_features';
        $this->version = '1.0.2';
        $this->author = 'ThemeVolty';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->module_key = '022974962b49cf1366d3f2556ef8c797';
        $this->ps_versions_compliancy = [
            'min' => '9.0.0',
            'max' => _PS_VERSION_,
        ];
        $shopId = Shop::getContextShopID();
        $shop = new Shop($shopId);
        $this->tvcanonicalUrl = $shop->getBaseURL();
        parent::__construct();

        $this->displayName = $this->l('Themevolty - Free Google My Business Collet Reviews & Reminder Mails');
        $this->description = $this->l('Themevolty - Google My Business Collet Reviews & Reminder Mails automatically fills in address fields using Google’s Address Autocomplete API.It streamlines the checkout process by providing fast and accurate address suggestions.');
    }

    public function install()
    {
        $this->createVariable();
        $this->createTable();

        return parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayHome')
            && $this->registerHook('displayFooterAfter')
            && $this->registerHook('ModuleRoutes')
            && $this->registerHook('displayFooterBefore')
            && $this->registerHook('displayFooter')
            && $this->registerHook('displayBackOfficeHeader');
    }

    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'tvgooglebusinessreviews_log` (
            `id_tvgooglebusinessreviews_log` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `customer_id` INT(10) UNSIGNED NOT NULL,
            `email_sent` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id_tvgooglebusinessreviews_log`),
            INDEX (`customer_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;';

        return Db::getInstance()->execute($sql);
    }

    public function createVariable()
    {
        foreach ($this->configurations as $key => $value) {
            if (isset($value['defalt_data']) && !empty($value['defalt_data'])) {
                Configuration::updateValue($key, $value['defalt_data']);
            }
        }
    }

    public function uninstall()
    {
        foreach ($this->configurations as $key => $value) {
            Configuration::deleteByName($key);
        }

        return parent::uninstall();
    }

    public function getContent()
    {
        $outputHtml = '';
        $statusMessage = '';
        $tabNumber = '#form1';

        if (Tools::isSubmit('submittvgooglebusinessreviews')) {
            $statusMessage = $this->postProcess('first_form');
            $tabNumber = '#form1';
        } elseif (Tools::isSubmit('submittvfrontofficeconfiguration')) {
            $statusMessage = $this->postProcess('secound_form');
            $tabNumber = '#form2';
        } elseif (Tools::isSubmit('submittvbackoffice')) {
            $statusMessage = $this->postProcess('third_form');
            $tabNumber = '#form3';
        }

        $this->context->smarty->assign('tab_number', $tabNumber);
        $this->context->smarty->assign('prmotional_banner', $this->display(__FILE__, 'views/templates/admin/promotional.tpl'));
        $this->context->smarty->assign('renderForm', $this->renderForm());
        $this->context->smarty->assign('renderFrontofficeForm', $this->renderFrontofficeForm());
        $this->context->smarty->assign('renderThirdForm', $this->dispalyCronjob() . $this->renderThirdForm());

        $outputHtml .= $this->display(__FILE__, 'views/templates/admin/tab_page.tpl');

        return $statusMessage . $outputHtml;
    }

    protected function renderForm()
    {
        return $this->renderHelperForm($this->getConfigForm(), 'submittvgooglebusinessreviews');
    }

    protected function renderFrontofficeForm()
    {
        return $this->renderHelperForm($this->getDesigenPositionForm(), 'submittvfrontofficeconfiguration');
    }

    protected function renderThirdForm()
    {
        return $this->renderHelperForm($this->getEmailsCronjobForm(), 'submittvbackoffice');
    }

    protected function renderHelperForm(array $formConfig, string $submitAction)
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = $submitAction;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = [
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        ];

        return $helper->generateForm([$formConfig]);
    }

    protected function getConfigForm()
    {
        $languages = Language::getLanguages(false);

        $boolSwitch = function ($label, $name, $desc, $yesLabel = 'Yes', $noLabel = 'No') {
            return [
                'type' => 'switch',
                'label' => $this->l($label),
                'name' => $name,
                'is_bool' => true,
                'desc' => $this->l($desc),
                'values' => [
                    ['id' => 'active_on', 'value' => '1', 'label' => $this->l($yesLabel)],
                    ['id' => 'active_off', 'value' => '0', 'label' => $this->l($noLabel)],
                ],
            ];
        };

        $inputs = [
            [
                'type' => 'switch',
                'label' => $this->l('Google Badge Reviews Status'),
                'name' => 'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_STATUS',
                'is_bool' => true,
                'desc' => $this->l('Toggle the status of the Google Reviews badge display.'),
                'values' => [
                    ['id' => 'active_on', 'value' => true, 'label' => $this->l('Enabled')],
                    ['id' => 'active_off', 'value' => false, 'label' => $this->l('Disabled')],
                ],
            ],
            [
                'type' => 'radio',
                'label' => $this->l('Google Business Reviews Mode'),
                'name' => 'TVGOOGLEBUSINESSREVIEWS_SELECT_PAID_AND_FREE_API_DATA',
                'is_bool' => true,
                'desc' => $this->l('Use the Google My Business API to fetch and display reviews, with manual handling for differentiating free and paid reviews.'),
                'values' => [
                    ['id' => 'free', 'value' => 'free', 'label' => $this->l('Free')],
                    ['id' => 'paid', 'value' => 'paid', 'label' => $this->l('Paid')],
                ],
            ],
            [
                'type' => 'text',
                'col' => 6,
                'name' => 'TVGOOGLEBUSINESSREVIEWS_PLACE_ID_API_KEY',
                'required' => true,
                'label' => $this->l('Google Place ID'),
                'desc' => $this->l('Enter your Place ID to access location-specific data.') .
                    '<b><a target="_blank" href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder">' .
                    'Use the Google Place ID Finder tool to get your unique Place ID.</a></b>',
                'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_FREE_SERVICE',
            ],
            [
                'type' => 'text',
                'col' => 6,
                'name' => 'TVGOOGLEBUSINESSREVIEWS_PAID_GOOGLE_MAP_API_KEY',
                'required' => true,
                'label' => $this->l('Place API Key'),
                'desc' => $this->l('Enter a valid Google API Key to access the service. ') .
                    '<b><a target="_blank" href="https://console.cloud.google.com/apis">' .
                    'Where can I access this information?</a></b>',
                'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_MAP_SERVICE',
            ],
            [
                'type' => 'text',
                'col' => 6,
                'name' => 'TVGOOGLEBUSINESSREVIEWS_PAID_PLACE_ID_API_KEY',
                'required' => true,
                'label' => $this->l('Google Place ID'),
                'desc' => $this->l('Enter your Place ID to access location-specific data.') .
                    '<b><a target="_blank" href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder">' .
                    'Use the Google Place ID Finder tool to get your unique Place ID.</a></b>',
                'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_PLACE_SERVICE',
            ],
            $boolSwitch(
                'Google Badge Title Status',
                'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE_STATUS',
                'Enable or disable the display of the Google Badge title on the site.'
            ),
            [
                'type' => 'text',
                'col' => 6,
                'lang' => true,
                'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE',
                'label' => $this->l('Google Badge Ttiles'),
                'desc' => $this->l('Customize the title for your Google Reviews badge display.'),
                'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HIDE_TITLE',
            ],
            $boolSwitch(
                'Customer Reviews Select Language',
                'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_LANGUAGE',
                'If the switch is disabled, the default language is shown if enabled, you can choose the language to display.',
                'Enabled', 'Disabled'
            ),
            [
                'type' => 'select',
                'label' => $this->l('Select Language'),
                'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_LANGUAGE',
                'desc' => $this->l('Choose the Language for Customer Reviews Display'),
                'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_DEFAULT_REVIEWS_LANGUAGE',
                'options' => [
                    'query' => $languages,
                    'id' => 'iso_code',
                    'name' => 'name',
                ],
            ],
            [
                'type' => 'select',
                'label' => $this->l('Sort Reviews By'),
                'name' => 'TVGOOGLEBUSINESSREVIEWS_SORT_OPTION',
                'options' => [
                    'query' => [
                        ['id' => 'newest', 'name' => $this->l('Newest First')],
                        ['id' => 'oldest', 'name' => $this->l('Oldest First')],
                        ['id' => 'highest_rating', 'name' => $this->l('Highest Rating')],
                        ['id' => 'lowest_rating', 'name' => $this->l('Lowest Rating')],
                    ],
                    'id' => 'id',
                    'name' => 'name',
                ],
            ],
            $boolSwitch(
                'Google Reviews In Popup',
                'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_POPUP',
                'Display google reviews in a popup window.'
            ),
            $boolSwitch(
                'Google Badge Review Count Status',
                'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_REVIEWS_COUNT_STATUS',
                'Enable or disable the display of the Google Badge review count on the site.'
            ),
            $boolSwitch(
                'Google Badge Star Status',
                'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_STATUS',
                'Enable or disable the display of the Google Badge star rating on the site.'
            ),
            $boolSwitch(
                'Customer Place Name Status',
                'TVGOOGLEBUSINESSREVIEWS_PLACES_NAME_STATUS',
                'Hide content on customer place review name status.'
            ),
            $boolSwitch(
                'Customer Review Name Status',
                'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_NAME_STATUS',
                'Hide content on customer review name status.'
            ),
            $boolSwitch(
                'Customer Year Ago Status',
                'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_YEAR_AGO_STATUS',
                'Hide content on customer review year ago status.'
            ),
            $boolSwitch(
                'Customer Reviews Star Status',
                'TVGOOGLEBUSINESSREVIEWS_CUSTOMER_STAR_STATUS',
                'Hide content on customer review star status.'
            ),
            $boolSwitch(
                'Write Review Button Status',
                'TVGOOGLEBUSINESSREVIEWS_WRITE_REVIEWS_BUTTON_STATUS',
                'Enable or disable the \'Write a Review\' button on the review section.'
            ),
        ];

        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Google Business Reviews Configuration'),
                    'icon' => 'icon-cogs',
                ],
                'input' => $inputs,
                'submit' => [
                    'title' => $this->l('Save'),
                    'name' => 'submittvgooglebusinessreviews',
                    'class' => 'btn btn-default pull-right',
                ],
            ],
        ];
    }

    protected function getDesigenPositionForm()
    {
        $contriesNames = Country::getCountries($this->context->language->id, true);
        $this->context->smarty->assign('contriesNames', $contriesNames);

        $tvhook = [
            ['id' => 'displayHome', 'name' => $this->l('displayHome')],
            ['id' => 'FloatingPosition', 'name' => $this->l('Floating Position')],
            ['id' => 'displayFooter', 'name' => $this->l('displayFooter')],
        ];

        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $tvhook[] = ['id' => 'displayFooterBefore', 'name' => $this->l('displayFooterBefore')];
            $tvhook[] = ['id' => 'displayFooterAfter', 'name' => $this->l('displayFooterAfter')];
        }

        $tvlistAlign = [
            ['id' => 'top_left', 'name' => $this->l('Top Left')],
            ['id' => 'top_right', 'name' => $this->l('Top Right')],
            ['id' => 'center_left', 'name' => $this->l('Center Left')],
            ['id' => 'center_right', 'name' => $this->l('Center Right')],
            ['id' => 'bottom_left', 'name' => $this->l('Bottom Left')],
            ['id' => 'bottom_right', 'name' => $this->l('Bottom Right')],
        ];

        $viewlist = [
            ['id' => 'slider_view', 'name' => $this->l('Slider View')],
            ['id' => 'grid_view', 'name' => $this->l('Grid View')],
            ['id' => 'list_view', 'name' => $this->l('List View')],
        ];

        $FooterlistAlign = [
            ['id' => 'left', 'name' => $this->l('Left')],
            ['id' => 'right', 'name' => $this->l('Right')],
            ['id' => 'center', 'name' => $this->l('Center')],
        ];

        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Google My Business Collet Reviews Front Office Configuration'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Mobile Media In Hide'),
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_MOBILE_IN_HIDE',
                        'is_bool' => true,
                        'desc' => $this->l('Hide content on mobile devices for a streamlined mobile experience.'),
                        'values' => [
                            ['id' => 'active_on', 'value' => '1', 'label' => $this->l('Yes')],
                            ['id' => 'active_off', 'value' => '0', 'label' => $this->l('No')],
                        ],
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Google Badge Position'),
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION',
                        'desc' => $this->l('Choose the position for displaying the Google Reviews badge on your site'),
                        'options' => [
                            'query' => $tvhook,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Google Badge Position Alignment'),
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HOME_VIEWS',
                        'desc' => $this->l('Choose the alignment for the Google Reviews badge to match your website\'s layout and design'),
                        'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME',
                        'options' => [
                            'query' => $viewlist,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Google Badge Position Alignment'),
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION_ALIGNMENT',
                        'desc' => $this->l('Choose the alignment for the Google Reviews badge to match your website\'s layout and design'),
                        'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME',
                        'options' => [
                            'query' => $tvlistAlign,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Google Badge Position Alignment'),
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_FOOTER_POSITION_ALIGNMENT',
                        'desc' => $this->l('Choose the alignment for the Google Reviews badge to match your website\'s layout and design'),
                        'form_group_class' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME',
                        'options' => [
                            'query' => $FooterlistAlign,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'color',
                        'label' => $this->l('Google Badge Border Color'),
                        'form_group_class' => 'google-badge-clr',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_BORDER_COLOR',
                        'desc' => $this->l('Select the border color for the Google Reviews badge to match your site\'s design.'),
                    ],
                    [
                        'type' => 'color',
                        'label' => $this->l('Google Badge Star Color'),
                        'form_group_class' => 'google-badge-clr',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_COLOR',
                        'desc' => $this->l('Select the color for the stars in the Google Reviews badge to customize its appearance.'),
                    ],
                    [
                        'type' => 'color',
                        'label' => $this->l('Google Customer Reviews Star Color'),
                        'form_group_class' => 'google-badge-clr',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_STAR_COLOR',
                        'desc' => $this->l('Select the color for the stars in the Google Reviews rating to match your site\'s theme.'),
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                    'name' => 'submittvfrontofficeconfiguration',
                    'class' => 'btn btn-default pull-right',
                ],
            ],
        ];
    }

    protected function getEmailsCronjobForm()
    {
        $orderStates = OrderState::getOrderStates((int) $this->context->language->id);

        $orderStateOptions = [];
        foreach ($orderStates as $state) {
            $orderStateOptions[] = [
                'id' => $state['id_order_state'],
                'name' => $state['name'],
            ];
        }

        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Reviews Request Email Configuration'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_EMAIL_CUSTOMER_REVIEWS',
                        'label' => $this->l('Enable Review Request Emails'),
                        'desc' => $this->l('Send customer review status updates via email to keep users informed.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'select',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_STATUS_FOR_TRIGGERING',
                        'label' => $this->l('Order Status'),
                        'col' => 8,
                        'desc' => $this->l('Choose the order status to manage or filter specific orders in your system.'),
                        'options' => [
                            'query' => $orderStateOptions,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'text',
                        'name' => 'TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_NUMBER_OF_DAYS',
                        'label' => $this->l('Number Of Days Before Sending'),
                        'col' => 3,
                        'desc' => $this->l('Set the number of days before sending review request emails to customers.'),
                        'required' => true,
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                    'name' => 'submittvbackoffice',
                    'class' => 'btn btn-default pull-right',
                ],
            ],
        ];
    }

    public function dispalyCronjob()
    {
        $adminToken = Tools::getAdminTokenLite('AdminModules');
        $emailRequestToken = Configuration::get('TVGOOGLEBUSINESSREVIEWS_EMAILS_SEND_REQUEST_TOKEN');

        $moduleUrl = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name
            . '&tab_module=' . $this->tab
            . '&module_name=' . $this->name
            . '&token=' . $adminToken;

        $isCronModuleEnabled = Module::isEnabled('cronjobs');

        $cronModuleConfigUrl = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=cronjobs'
            . '&tab_module=Administration'
            . '&module_name=cronjobs'
            . '&token=' . $adminToken;

        // Assign variables to Smarty template
        $this->context->smarty->assign([
            'regenerateTokenModule' => 'regenerate' . $this->name . 'Token',
            'tv_emails_token' => $emailRequestToken,
            'tvcanonicalUrl' => $this->tvcanonicalUrl,
            'module_url' => $moduleUrl,
            'ps_root_dir' => _PS_ROOT_DIR_,
            'shop_id' => $this->context->shop->id,
            'modulecronIsEnable' => $isCronModuleEnabled,
            'pathModuleCronjob' => $cronModuleConfigUrl,
        ]);

        // Add JavaScript definitions
        Media::addJsDef([
            'tvcanonicalUrl' => $this->tvcanonicalUrl,
            'shop_id' => $this->context->shop->id,
            'tv_emails_token' => $emailRequestToken,
        ]);

        return $this->display(__FILE__, 'views/templates/admin/display_cronjob.tpl');
    }

    protected function getConfigFormValues()
    {
        $getrcontriesNames = Configuration::get('TVGOOGLEBUSINESSREVIEWS_COUNTRIES_SELECT');
        $this->context->smarty->assign('getrcontriesNames', $getrcontriesNames);
        $getrcontriesBackNames = Configuration::get('TVGOOGLEBUSINESSREVIEWS_BACK_COUNTRIES_SELECT');
        $this->context->smarty->assign('getrcontriesBackNames', $getrcontriesBackNames);

        $fields = [];
        $languages = Language::getLanguages();
        foreach ($this->configurations as $key => $value) {
            if (isset($value['multi_lang']) && $value['multi_lang']) {
                foreach ($languages as $language) {
                    $fields[$key][$language['id_lang']] = Configuration::get($key, $language['id_lang']);
                }
            } else {
                $fields[$key] = Configuration::get($key);
            }
        }

        return $fields;
    }

    protected function postProcess($formType)
    {
        $allLanguages = Language::getLanguages(false);
        $validationErrors = [];
        $confirmationMessage = '';
        $configUpdates = [];

        foreach ($this->configurations as $configKey => $configDetails) {
            if (isset($configDetails['form_data']) && $formType == $configDetails['form_data']) {
                if (isset($configDetails['multi_lang']) && $configDetails['multi_lang']) {
                    foreach ($allLanguages as $lang) {
                        $fieldValue = Tools::getValue($configKey . '_' . $lang['id_lang']);
                        if (empty($fieldValue) && isset($configDetails['requireds']) && $configDetails['requireds']) {
                            $validationErrors[] = $this->l('Field "' . $configKey . '" is required for language ID ' . $lang['id_lang']);
                        }
                        $configUpdates[$configKey][$lang['id_lang']] = $fieldValue;
                    }
                } elseif (isset($configDetails['data_type']) && 'array' == $configDetails['data_type']) {
                    $arrayData = Tools::getValue($configKey, []);
                    if (empty($arrayData) && isset($configDetails['requireds']) && $configDetails['requireds']) {
                        $validationErrors[] = $this->l('Field "' . $configKey . '" is required');
                    }
                    if (is_array($arrayData) && !empty($arrayData)) {
                        Configuration::updateValue($configKey, implode(',', $arrayData));
                    } else {
                        Configuration::updateValue($configKey, '');
                    }
                } else {
                    $currentValue = Tools::getValue($configKey);
                    $existingValue = Configuration::get($configKey);
                    if (empty($currentValue) && isset($configDetails['requireds']) && $configDetails['requireds']) {
                        if ('TVGOOGLEBUSINESSREVIEWS_PAID_GOOGLE_MAP_API_KEY' == $configKey) {
                            $validationErrors[] = $this->l('Please google place API ID key add.');
                        } elseif ('TVGOOGLEBUSINESSREVIEWS_PAID_PLACE_ID_API_KEY' == $configKey) {
                            $validationErrors[] = $this->l('Please google place ID add.');
                        } elseif ('TVGOOGLEBUSINESSREVIEWS_PLACE_ID_API_KEY' == $configKey) {
                            $validationErrors[] = $this->l('Please google place ID Add.');
                        } else {
                            $validationErrors[] = $this->l('Field "' . $configKey . '" is required');
                        }
                    } else {
                        $valueToSave = (!empty($currentValue) || '0' === $currentValue) ? $currentValue : $existingValue;
                        Configuration::updateValue($configKey, $valueToSave);
                    }
                }
            }
        }

        foreach ($configUpdates as $field => $values) {
            Configuration::updateValue($field, $values);
        }

        if (count($validationErrors)) {
            $confirmationMessage .= $this->displayError(implode('<br />', $validationErrors));
        } else {
            if ('first_form' == $formType) {
                $confirmationMessage .= $this->displayConfirmation($this->l('Google business reviews data configured successfully.'));
            } elseif ('secound_form' == $formType) {
                $confirmationMessage .= $this->displayConfirmation($this->l('Design & position data configured successfully.'));
            } elseif ('third_form' == $formType) {
                $confirmationMessage .= $this->displayConfirmation($this->l('Cronjobs & email data configured successfully.'));
            }
        }

        return $confirmationMessage;
    }

    private function getGoogleReviewsData()
    {
        $averageRating = false;
        $totalReviews = false;
        $placeName = false;
        $reviewsList = false;
        $placeId = null;
        $languageCode = null;
        $rawReviewsData = null;

        $apiServiceType = Configuration::get('TVGOOGLEBUSINESSREVIEWS_SELECT_PAID_AND_FREE_API_DATA');

        // Set language code
        $languageSelectionMode = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_LANGUAGE');
        $currentLanguageCode = $this->context->language->language_code;

        if ('1' == $languageSelectionMode) {
            $languageCode = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_LANGUAGE');
        } elseif ('0' == $languageSelectionMode) {
            $languageCode = $this->context->language->iso_code;
        }

        if ('en' == $languageCode && 'en-us' == $currentLanguageCode) {
            $languageCode = 'en-GB';
        }

        if ('free' == $apiServiceType) {
            $placeId = Configuration::get('TVGOOGLEBUSINESSREVIEWS_PLACE_ID_API_KEY');

            if ($placeId) {
                $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36';

                $curlHandle = curl_init('https://search.google.com/local/reviews?placeid=' . $placeId);
                curl_setopt($curlHandle, CURLOPT_HTTPHEADER, ['Accept-Language: ' . $languageCode]);
                curl_setopt($curlHandle, CURLOPT_USERAGENT, $userAgent);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                $curlResult = curl_exec($curlHandle);
                curl_close($curlHandle);

                $googleMapsCid = null;
                $pattern = '/;ludocid=(.*)&/ms';
                if (preg_match($pattern, $curlResult, $match)) {
                    $googleMapsCid = $match[1];
                }

                if ($googleMapsCid) {
                    $curlHandle = curl_init('https://www.google.com/maps?cid=' . $googleMapsCid);
                    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, ['Accept-Language: ' . $languageCode]);
                    curl_setopt($curlHandle, CURLOPT_USERAGENT, $userAgent);
                    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                    $curlResult = curl_exec($curlHandle);
                    curl_close($curlHandle);

                    $pattern = '/window\.APP_INITIALIZATION_STATE(.*);window\.APP_FLAGS=/ms';
                    if (preg_match($pattern, $curlResult, $match)) {
                        $match[1] = trim($match[1], ' =;');
                        $fullReviewsData = json_decode($match[1]);

                        if (isset($fullReviewsData[3][6])) {
                            $fullReviewsData = ltrim($fullReviewsData[3][6], ")]}'");
                            $fullReviewsData = json_decode($fullReviewsData);

                            $averageRating = $fullReviewsData[6][4][7] ?? null;
                            $totalReviews = $fullReviewsData[6][4][8] ?? null;
                            $placeName = $fullReviewsData[6][11] ?? null;
                            $rawReviewsData = $fullReviewsData[6][175][9][0][0] ?? null;
                        }
                    }
                }

                if ($curlResult && $rawReviewsData) {
                    $reviewsList = [];
                    foreach ($rawReviewsData as $index => $reviewData) {
                        $reviewsList[$index] = [
                            'avatar' => $reviewData[0][1][4][5][1] ?? null,
                            'name' => $reviewData[0][1][4][5][0] ?? null,
                            'rating' => $reviewData[0][2][0][0] ?? null,
                            'date' => $reviewData[0][1][6] ?? null,
                            'comment' => $reviewData[0][2][15][0][0] ?? null,
                        ];
                    }
                }
            }
        } elseif ('paid' == $apiServiceType) {
            $placeId = Configuration::get('TVGOOGLEBUSINESSREVIEWS_PAID_PLACE_ID_API_KEY');
            $googleApiKey = Configuration::get('TVGOOGLEBUSINESSREVIEWS_PAID_GOOGLE_MAP_API_KEY');

            if (empty($placeId) || empty($googleApiKey)) {
                return ['error' => $this->l('Google Place ID or API Key is not configured.')];
            }

            $url = 'https://maps.googleapis.com/maps/api/place/details/json?place_id=' . $placeId . '&key=' . $googleApiKey . '&language=' . $languageCode;

            $curlHandle = curl_init($url);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, false);
            $curlResult = curl_exec($curlHandle);

            if (curl_errno($curlHandle)) {
                $errorMessage = curl_error($curlHandle);
                curl_close($curlHandle);

                return ['error' => $this->l('cURL Error: ') . $errorMessage];
            }
            curl_close($curlHandle);

            $apiResponse = json_decode($curlResult, true);
            if (JSON_ERROR_NONE !== json_last_error()) {
                return ['error' => $this->l('Invalid JSON response from Google API.')];
            }

            $placeName = $apiResponse['result']['name'] ?? null;
            $totalReviews = $apiResponse['result']['user_ratings_total'] ?? null;
            $averageRating = $apiResponse['result']['rating'] ?? null;

            if (empty($apiResponse['result']['reviews'])) {
                return ['error' => $this->l('No reviews found or an error occurred.')];
            }

            $reviewsList = [];
            foreach ($apiResponse['result']['reviews'] as $review) {
                $reviewsList[] = [
                    'avatar' => $review['profile_photo_url'] ?? null,
                    'name' => $review['author_name'] ?? null,
                    'rating' => $review['rating'] ?? null,
                    'date' => $review['relative_time_description'] ?? null,
                    'comment' => $review['text'] ?? null,
                ];
            }
        }

        if ($reviewsList) {
            $sortOption = Configuration::get('TVGOOGLEBUSINESSREVIEWS_SORT_OPTION');
            usort($reviewsList, function ($a, $b) use ($sortOption) {
                $dateA = strtotime($a['date']);
                $dateB = strtotime($b['date']);

                if ('newest' == $sortOption) {
                    return $dateB <=> $dateA;
                } elseif ('oldest' == $sortOption) {
                    return $dateA <=> $dateB;
                } elseif ('highest_rating' == $sortOption) {
                    return $b['rating'] <=> $a['rating'];
                } elseif ('lowest_rating' == $sortOption) {
                    return $a['rating'] <=> $b['rating'];
                } else {
                    return $dateB <=> $dateA; // Default to newest
                }
            });
        }

        return [
            'reviews_note' => $averageRating,
            'reviews_count' => $totalReviews,
            'google_customer' => $placeName,
            'tvgoogle_ratings' => $reviewsList,
            'google_place_id' => $placeId,
        ];
    }

    private function assignCommonReviewsDataToSmarty($reviewData)
    {
        $badgeTitle = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE', $this->context->language->id);
        $reviewStarColor = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_STAR_COLOR');
        $badgeStarColor = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_COLOR');
        $badgeBorderColor = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_BORDER_COLOR');
        $hookPosition = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION');
        $badgeTitleStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE_STATUS');
        $badgeReviewCountStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_REVIEWS_COUNT_STATUS');
        $badgeStarStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_STATUS');
        $writeReviewButtonStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_WRITE_REVIEWS_BUTTON_STATUS');
        $customerNameStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_NAME_STATUS');
        $yearAgoStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_YEAR_AGO_STATUS');
        $customerStarStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_STAR_STATUS');
        $popupDisplayStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_POPUP');
        $placeNameStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_PLACES_NAME_STATUS');
        $customerReviewsBadgeStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_STATUS');

        $this->context->smarty->assign([
            'reviews_note' => number_format($reviewData['reviews_note'], 1),
            'reviews_count' => $reviewData['reviews_count'],
            'google_customer' => $reviewData['google_customer'],
            'tvgoogle_ratings' => $reviewData['tvgoogle_ratings'],
            'google_place_id' => $reviewData['google_place_id'],
            'main_title' => $badgeTitle,
            'border_color' => $badgeBorderColor,
            'reviews_color' => $reviewStarColor,
            'hook_name' => $hookPosition,
            'star_color' => $badgeStarColor,
            'main_title_status' => $badgeTitleStatus,
            'reviews_count_status' => $badgeReviewCountStatus,
            'reviews_star_status' => $badgeStarStatus,
            'button_status' => $writeReviewButtonStatus,
            'customer_name' => $customerNameStatus,
            'start_status' => $customerStarStatus,
            'year_ago_status' => $yearAgoStatus,
            'popup_status' => $popupDisplayStatus,
            'places_status' => $placeNameStatus,
            'badge_status' => $customerReviewsBadgeStatus,
        ]);
    }

    public function displayFrontReviewesdata()
    {
        $reviewData = $this->getGoogleReviewsData();

        if (isset($reviewData['error'])) {
            return $this->context->smarty->assign(['error' => $reviewData['error']]);
        }

        $this->assignCommonReviewsDataToSmarty($reviewData);
        $this->context->smarty->assign([
            'float_layout' => Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION_ALIGNMENT'),
            'footer_layout' => Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_FOOTER_POSITION_ALIGNMENT'),
        ]);

        return $this->display(__FILE__, 'views/templates/front/display_reviews_data.tpl');
    }

    public function displayHomedata()
    {
        $reviewData = $this->getGoogleReviewsData();

        if (isset($reviewData['error'])) {
            return $this->context->smarty->assign(['error' => $reviewData['error']]);
        }

        $this->assignCommonReviewsDataToSmarty($reviewData);
        $this->context->smarty->assign([
            'homepage_layout' => Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HOME_VIEWS'),
        ]);

        return $this->display(__FILE__, 'views/templates/front/display_home_data.tpl');
    }

    public function checkWeek()
    {
        $result = true;
        $currentDate = new DateTime();
        $currentWeek = $currentDate->format('W');
        $cachedWeek = Configuration::get('LGB_GMR_CACHE_WEEK');
        if (!$cachedWeek || $cachedWeek !== $currentWeek) {
            Configuration::updateValue('LGB_GMR_CACHE_WEEK', $currentWeek);
            $result = false;
        }

        return $result;
    }

    public function delCache($directoryPath = false)
    {
        if (!$directoryPath) {
            $directoryPath = $this->context->smarty->getCacheDir() . $this->name;
        }
        if (is_dir($directoryPath)) {
            $items = scandir($directoryPath);
            foreach ($items as $item) {
                if ('.' != $item && '..' != $item) {
                    if ('dir' == filetype($directoryPath . '/' . $item)) {
                        $this->delCache($directoryPath . '/' . $item);
                    } else {
                        unlink($directoryPath . '/' . $item);
                    }
                }
            }
            reset($items);

            return rmdir($directoryPath);
        }

        return true;
    }

    public function sendReminderMail($shopId)
    {
        $daysThreshold = Configuration::get('TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_NUMBER_OF_DAYS');
        $triggerStatus = Configuration::get('TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_STATUS_FOR_TRIGGERING');
        $ordersToProcess = $this->getByStatus((int) $triggerStatus, (int) $daysThreshold, (int) $shopId);

        if (empty($ordersToProcess)) {
            return;
        }

        foreach ($ordersToProcess as $orderData) {
            $orderId = (int) $orderData['id_order'];
            $customerId = (int) $orderData['id_customer'];

            if (TvgooglebusinessReviewsclass::getSendmailByIdCustomer($customerId)) {
                continue; // Mail already sent for this customer
            }

            $order = new Order($orderId);
            $customer = new Customer($customerId);

            $subject = $this->getTranslatedText('Following your purchase on', (int) $customer->id_lang) . ' ' . Configuration::get('PS_SHOP_NAME');

            $mailVariables = [
                '{firstname}' => $customer->firstname,
                '{lastname}' => $customer->lastname,
                '{reference}' => $order->reference,
                '{date_add}' => Tools::displayDate($order->date_add),
                '{google_place_id}' => Configuration::get('TVGOOGLEBUSINESSREVIEWS_PLACE_ID_API_KEY'),
            ];

            // Use module path helper for mails folder
            $mailPath = $this->getLocalPath() . 'mails/';

            $mailSent = Mail::Send(
                (int) $customer->id_lang,
                'alert_user', // Template name
                $subject,
                $mailVariables,
                $customer->email,
                $customer->firstname . ' ' . $customer->lastname,
                null,
                null,
                null,
                null,
                $mailPath,
                false,
                (int) $order->id_shop
            );

            if ($mailSent) {
                $mailLog = new TvgooglebusinessReviewsclass();
                $mailLog->customer_id = $customerId;
                $mailLog->email_sent = 1;
                $mailLog->save();
            }
        }
    }

    public function getTranslatedText($originalText, $languageId)
    {
        global $_MODULE; // Use PrestaShop standard translation container

        $moduleName = 'tvgooglebusinessreviews';
        $isoCode = Language::getIsoById((int) $languageId);

        $translationFiles = [
            _PS_MODULE_DIR_ . $moduleName . '/translations/' . $isoCode . '.php',
            _PS_THEME_DIR_ . 'modules/' . $moduleName . '/translations/' . $isoCode . '.php',
        ];

        foreach ($translationFiles as $filePath) {
            if (file_exists($filePath)) {
                include $filePath;
            }
        }

        $escapedText = str_replace('\'', '\\\'', $originalText);
        $translationHash = md5($escapedText);
        $translationKey = Tools::strtolower('<{' . $moduleName . '}prestashop>' . $moduleName) . '_' . $translationHash;

        return isset($_MODULE[$translationKey]) ? stripslashes($_MODULE[$translationKey]) : $originalText;
    }

    public function getByStatus($orderStateId, $daysCount, $shopId)
    {
        $db = Db::getInstance(_PS_USE_SQL_SLAVE_);

        $orderStateId = (int) $orderStateId;
        $daysCount = (int) $daysCount;
        $shopId = (int) $shopId;

        $sql = '
            SELECT oh.*, o.id_customer
            FROM ' . _DB_PREFIX_ . 'order_history oh
            LEFT JOIN ' . _DB_PREFIX_ . 'orders o ON oh.id_order = o.id_order
            WHERE oh.id_order_state = ' . $orderStateId . '
            AND oh.date_add BETWEEN DATE_SUB(NOW(), INTERVAL ' . $daysCount . ' DAY) AND NOW()
            AND o.id_shop = ' . $shopId . '
            ORDER BY oh.date_add ASC
        ';

        return $db->executeS($sql);
    }

    public function hookModuleRoutes($params)
    {
        return [
            'module-tvgooglebusinessreviews-tvgooglecronjobtoken' => [
                'controller' => 'tvgooglecronjobtoken',
                'rule' => 'tvgooglecronjobtoken',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => 'tvgooglebusinessreviews',
                ],
            ],
        ];
    }

    private function isMobileDevice()
    {
        return '4' == Context::getContext()->getDevice() && '0' == Configuration::get('TVGOOGLEBUSINESSREVIEWS_MOBILE_IN_HIDE');
    }

    private function isDesktopDevice()
    {
        return '1' == Context::getContext()->getDevice();
    }

    private function displayReviewsByHookPosition($hookName)
    {
        if ($this->isMobileDevice() || $this->isDesktopDevice()) {
            $configuredPosition = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION');
            if ($hookName === $configuredPosition || ('displayFooter' === $hookName && 'FloatingPosition' === $configuredPosition)) {
                return $this->displayFrontReviewesdata();
            }
        }

        return '';
    }

    public function hookDisplayFooter()
    {
        return $this->displayReviewsByHookPosition('displayFooter');
    }

    public function hookDisplayFooterBefore()
    {
        return $this->displayReviewsByHookPosition('displayFooterBefore');
    }

    public function hookDisplayFooterAfter()
    {
        return $this->displayReviewsByHookPosition('displayFooterAfter');
    }

    public function hookDisplayHome()
    {
        if ($this->isMobileDevice() || $this->isDesktopDevice()) {
            if ('displayHome' == Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION')) {
                return $this->displayHomedata();
            }
        }

        return '';
    }

    public function hookDisplayBackOfficeHeader()
    {
        $ajaxLink = $this->context->link->getModuleLink($this->name, 'tvtokengen');
        Media::addJsDef(['TVCMS_GOOGLE_LINK_AJAX' => $ajaxLink]);

        $this->context->controller->addJS($this->_path . 'views/js/back.js');
        $this->context->controller->addCSS($this->_path . 'views/css/back.css');
    }

    public function hookdisplayHeader()
    {
        $badgeStarColorConfig = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_STAR_COLOR');
        Media::addJsDef(['badgeStarcolor' => $badgeStarColorConfig]);

        $customerStarColorConfig = Configuration::get('TVGOOGLEBUSINESSREVIEWS_GOOGLE_REVIEWS_STAR_COLOR');
        Media::addJsDef(['customerStarcolor' => $customerStarColorConfig]);

        $this->context->controller->addJS($this->_path . 'views/js/front.js');
        $this->context->controller->addJS($this->_path . 'views/js/owl.carousel.min.js');
        $this->context->controller->addJS($this->_path . 'views/js/jquery.balance.js');
        $this->context->controller->addJS($this->_path . '/views/js/jquery.star-rating-svg.min.js');
        $this->context->controller->addJqueryPlugin('fancybox');
        $this->context->controller->addCSS($this->_path . 'views/css/front.css');
        $this->context->controller->addCSS($this->_path . 'views/css/owl.carousel.min.css');
        $this->context->controller->addCSS($this->_path . 'views/css/owl.theme.default.min.css');
    }
}
