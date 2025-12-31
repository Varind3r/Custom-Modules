{*
* 2007-2025 PrestaShop
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
*}
{$prmotional_banner}
<div class="bootstrap">
    <div class="custom-tab row tvgooglebusinessreviews-wrapper">
        <div class="col-sm-3 col-md-2">
            <div class="head-tabs" id="head_tabs">
                <ul class="nav">
                    <li class="tv_first_tab tvadmintab-product-tab {if $tab_number == '#form1'}active {/if}" tab-number="#form1">
                        <a href="#form1" data-toggle="tab"> 
                        <img src="{$module_dir}views/img/1.png">
                        {l s='Global Configuration' mod='tvgooglebusinessreviews'}</a>
                    </li>
                    <li class="tv_second_tab tvadmintab-product-tab {if $tab_number == '#form2'}active {/if}" tab-number="#form2">

                        <a href="#form2" data-toggle="tab">
                        <img src="{$module_dir}views/img/2.png">
                        {l s='Design & Position' mod='tvgooglebusinessreviews'}</a>
                    </li>
                    <li class="tv_second_tab tvadmintab-product-tab {if $tab_number == '#form3'}active {/if}" tab-number="#form3">

                        <a href="#form3" data-toggle="tab">
                        <img src="{$module_dir}views/img/3.png">
                        {l s='Email & Cronjob' mod='tvgooglebusinessreviews'}</a>
                    </li>
                    <li class="tv_second_tab tvadmintab-product-active">
                        <a href="https://addons.prestashop.com/en/255_themevolty-module" target="_blank">
                        <img src="{$module_dir}views/img/4.png">
                        {l s='Other Plugin' mod='tvgooglebusinessreviews'}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 col-md-10 tv-tab-form-data">
            <div class="tab-content">
                <div id="form1" class="tab-pane active googleform_1">
                    {$renderForm}
                </div>
                <div id="form2" class="tab-pane googleform_2">
                    {$renderFrontofficeForm}
                </div>
                <div id="form3" class="tab-pane googleform_3">
                    {$renderThirdForm}
                </div>
            </div>
        </div>
        <input type="hidden" name="tvcmstab_product_tab_number" id='tvcmstab-product-tab-number' value="{$tab_number}">
    </div>
</div>
