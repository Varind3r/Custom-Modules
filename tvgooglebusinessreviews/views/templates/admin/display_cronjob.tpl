{**
* Loulou66
* tvgooglebusinessreviews module for Prestashop
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php*
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author Loulou66.fr <contact@loulou66.fr>
    * @copyright loulou66.fr
    * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
    *}
    <div class="panel cronjob_wrapper">
        <div class="panel-heading">
            <i class="icon-cogs"></i>
            {l s='Cronjob Configuration' mod='tvgooglebusinessreviews'}
        </div>
        <div class="alert alert-info">
            <p class="cronjob_heading">{l s='Set up a scheduled task to automate the process of sending emails to customers, inviting them to leave reviews.' mod='tvgooglebusinessreviews'}</p>
            <br>
            <br>
            <div class="cronjobs">
                <span class="label label-default">{l s='Cronjob' mod='tvgooglebusinessreviews'}</span>
                <p class="cronjob_code">php {$ps_root_dir}/tvgooglecronjobtoken?tvgooglecron=<span id="token_changes">{$tv_emails_token}</span>&id_shop={$shop_id}</p>
            </div>
            <div class="cronjobs_options">
                <span style="margin-left:30px;" class="icon-arrows-v"></span>
                <span>{l s='Select and install one of the two available cronjobs based on your requirements.' mod='tvgooglebusinessreviews'}</span>
            </div>
            <div class="cronjobs">
                <span class="label label-default">{l s='Cronjob' mod='tvgooglebusinessreviews'}</span>
                <code class="cronjob_code">wget {$tvcanonicalUrl}tvgooglecronjobtoken?tvgooglecron=<span id="token_wget_changes">{$tv_emails_token}</span>&id_shop={$shop_id}</code>
            </div>
            <hr>
            {* <form action="{$module_url|escape:'htmlall':'UTF-8'}" method="post"> *}
                <button name="{$regenerateTokenModule|escape:'htmlall':'UTF-8'}" id="{$regenerateTokenModule|escape:'htmlall':'UTF-8'}" type="submit" class="btn btn-primary"><i class="material-icons">refresh</i>
                    {l s='Refresh Token' mod='tvgooglebusinessreviews'}
                </button>
                <a class="btn btn-primary" id="tv_execute_cron_task" href="#" target="_blank">
                <i class="material-icons">launch</i>
                    
                {l s='Execute cron task manually' mod='tvgooglebusinessreviews'}</a>
                {* </form> *}
            {if $modulecronIsEnable}
            <hr>
            {l s='You can configure the' mod='tvgooglebusinessreviews'}
            <a class="label label-success" href="{$pathModuleCronjob|escape:'htmlall':'UTF-8'}" target="_blank">
                {l s='CRONJOB HERE' mod='tvgooglebusinessreviews'}</a>
            {/if}
        </div>
    </div>