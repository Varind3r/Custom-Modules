{**
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
{extends file="helpers/form/form.tpl"}
{block name="input"}
	{* {if $input.type == 'select_address'}
		<div class="col-lg-9">
		    <div class="form-group">
		        <div class="col-lg-9">
		            <div class="dummyfile input-group" style="width: 90%">
		                <select class="tvcms-name chosen" id="sort-2" name="{$input.name|escape:'htmlall':'UTF-8'}" multiple>
		                	{if $controllerNames}
			                    {foreach $controllerNames as $controllerName}
			                        <option value="{$controllerName.id_page}" {if strpos($getcontrollerNames, $controllerName.id_page) !== false}selected{/if}>{$controllerName.name}</option>
			                    {/foreach}
		                    {/if}
		                </select>
		            </div>
		        </div>
		    </div>
		</div>
	{/if} *}

	{if $input.type == 'select_countries'}
		<div class="col-lg-9">
		    <div class="form-group">
		        <div class="col-lg-9">
		            <div class="dummyfile input-group" style="width: 90%">
		                <select class="tvcms-name chosen" id="sort-2" name="{$input.name|escape:'htmlall':'UTF-8'}" multiple>
		                    {foreach $contriesNames as $contriesName}
		                        <option value="{$contriesName.iso_code}" {if strpos($getrcontriesNames, $contriesName.iso_code) !== false}selected{/if}>{$contriesName.name}</option>
		                    {/foreach}
		                </select>
		        		<p class="help-block">{l s='Allow address selection based on country choices.' mod='tvgooglebusinessreviews'}</p>
		            </div>
		        </div>
		    </div>
		</div>
	{/if}
	{if $input.type == 'select_back_countries'}
		<div class="col-lg-9">
		    <div class="form-group">
		        <div class="col-lg-9">
		            <div class="dummyfile input-group" style="width: 90%">
		                <select class="tvcms-name chosen" id="sort-2" name="{$input.name|escape:'htmlall':'UTF-8'}" multiple>
		                    {foreach $contriesNames as $contriesName}
		                        <option value="{$contriesName.iso_code}" {if strpos($getrcontriesBackNames, $contriesName.iso_code) !== false}selected{/if}>{$contriesName.name}</option>
		                    {/foreach}
		                </select>
		                <p class="help-block">{l s='Allow address selection based on country choices.' mod='tvgooglebusinessreviews'}</p>
		            </div>
		        </div>
		    </div>
		</div>
	{/if}
    {$smarty.block.parent}
{/block}
