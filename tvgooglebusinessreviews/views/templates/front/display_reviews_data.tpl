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
{if $badge_status == '1'}
<div class="{if $hook_name === 'displayFooterBefore' || $hook_name === 'displayFooterAfter'} {if $footer_layout === 'left'}footer_badge badge_layout_left col-lg-12 {else if $footer_layout === 'right'}footer_badge badge_layout_right col-lg-12 {else if $footer_layout === 'center'}footer_badge badge_layout_center col-lg-12{/if}{/if} footer_layouts">
    <div class="google-reviews-badge {if $hook_name === 'FloatingPosition'}floating_review {if $float_layout === 'top_left'}top_left{else if $float_layout === 'top_right'}top_right{else if $float_layout === 'center_left'}center_left{else if $float_layout === 'bottom_left'}bottom_left{else if $float_layout === 'bottom_right'}bottom_right{else if $float_layout === 'center_right'}center_right{/if} {else if $hook_name === 'displayFooterBefore'}footer_before_badge {if $footer_layout === 'left'}footer_before_left_badge{else if $footer_layout === 'right'}footer_before_right_badge{else if $footer_layout === 'center'}footer_before_center_badge {/if}{else if $hook_name === 'displayFooterAfter'}footer_after_badge {if $footer_layout === 'left'}footer_after_left_badge{else if $footer_layout === 'right'}footer_after_right_badge{else if $footer_layout === 'center'}footer_after_center_badge{/if}{else if $hook_name === 'displayFooter'}footer_badge{/if}">
        <a {if $popup_status === "1"} id="google_review_badge" {/if} {if $popup_status === "1"} href="#google_review_popup"{else if $popup_status === "0"}href="https://search.google.com/local/writereview?placeid={$google_place_id|escape:'html':'UTF-8'}"{/if}>
            {*<div class="google-reviews-header"></div>*}
            <div class="google-reviews-content" style="border-top-color:{$border_color}">
                <svg class="google_icon" width="40" height="40" viewBox="0 0 256 262" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                    <path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"></path>
                    <path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"></path>
                    <path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"></path>
                    <path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"></path>
                </svg>
                <div class="reviews-info">
                    {if $main_title_status === '1'}<div class="reviews-title">{$main_title|escape:'html':'UTF-8'}</div>{/if}
                    <div class="tv_badge_reviews">
                        <span class="tv_badge_note">{$reviews_note|escape:'html':'UTF-8'}</span>
                        {if $reviews_star_status === '1'}<span class="jq-stars tv_rating" data-rating="{$reviews_note|escape:'html':'UTF-8'}"></span>{/if}
                    </div>
                    {if $reviews_count_status === '1'}<div class="reviews-count">{l s='Based on %d reviews' sprintf=[$reviews_count] mod='tvgooglebusinessreviews'}</div>{/if}
                </div>
            </div>
        </a>
    </div>
</div>
    <!-- pops code -->
    {if $popup_status === "1"}
    <div id="google_review_popup" class="popup_wrapper">
        <div class="tv_google_wrapper">
            <div class="tv_google_left">
                <div class="tv_google_logo">
                    <span class="google_logo_wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 194.5" width="85" height="36">
                            {literal}<style>
                            .st0 {
                                fill: #3780ff
                            }

                            .st1 {
                                fill: #38b137
                            }

                            .st2 {
                                fill: #fa3913
                            }

                            .st3 {
                                fill: #fcbd06
                            }
                            </style>{/literal}
                            <path class="st0" d="M73.4 0h5.3c18.4.4 36.5 7.8 49.5 20.9-4.8 4.9-9.7 9.6-14.4 14.5-7.3-6.6-16.1-11.7-25.7-13.5-14.2-3-29.5-.3-41.4 7.8C33.7 38.2 24.9 52.6 23 68c-2.1 15.2 2.2 31.2 12.1 43 9.5 11.5 24 18.7 39 19.2 14 .8 28.6-3.5 38.8-13.3 8-6.9 11.7-17.4 12.9-27.6-16.6 0-33.2.1-49.8 0V68.7h69.9c3.6 22.1-1.6 47-18.4 62.8-11.2 11.2-26.7 17.8-42.5 19.1-15.3 1.5-31.1-1.4-44.7-8.8C24 133.1 11 118.4 4.6 101.1c-6-15.9-6.1-33.9-.5-49.9C9.2 36.6 19 23.7 31.6 14.7 43.7 5.8 58.4.9 73.4 0z" />
                            <path class="st1" d="M474.4 5.2h21.4V148c-7.1 0-14.3.1-21.4-.1.1-47.5 0-95.1 0-142.7z" />
                            <path class="st2" d="M193.5 54.7c13.2-2.5 27.5.3 38.4 8.2 9.9 7 16.8 18 18.9 30 2.7 13.9-.7 29.1-9.7 40.1-9.7 12.3-25.6 18.9-41.1 17.9-14.2-.8-28-7.9-36.4-19.5-9.5-12.8-11.8-30.4-6.6-45.4 5.2-16.1 19.9-28.4 36.5-31.3m3 19c-5.4 1.4-10.4 4.5-14 8.9-9.7 11.6-9.1 30.5 1.6 41.3 6.1 6.2 15.3 9.1 23.8 7.4 7.9-1.4 14.8-6.7 18.6-13.7 6.6-11.9 4.7-28.3-5.4-37.6-6.5-6-16-8.5-24.6-6.3z" />
                            <path class="st3" d="M299.5 54.7c15.1-2.9 31.6 1.3 42.9 11.9 18.4 16.5 20.4 47.4 4.7 66.4-9.5 12-24.9 18.6-40.1 17.9-14.5-.4-28.8-7.6-37.4-19.5-9.7-13.1-11.8-31.1-6.3-46.4 5.5-15.6 19.9-27.5 36.2-30.3m3 19c-5.4 1.4-10.4 4.5-14 8.8-9.6 11.4-9.2 30 1.1 40.9 6.1 6.5 15.6 9.7 24.4 7.9 7.8-1.5 14.8-6.7 18.6-13.7 6.5-12 4.6-28.4-5.6-37.7-6.5-6-16-8.4-24.5-6.2z" />
                            <path class="st0" d="M389.4 60.5c11.5-7.2 26.8-9.2 39.2-3 3.9 1.7 7.1 4.6 10.2 7.5.1-2.7 0-5.5.1-8.3 6.7.1 13.4 0 20.2.1V145c-.1 13.3-3.5 27.4-13.1 37.1-10.5 10.7-26.6 14-41.1 11.8-15.5-2.3-29-13.6-35-27.9 6-2.9 12.3-5.2 18.5-7.9 3.5 8.2 10.6 15.2 19.5 16.8 8.9 1.6 19.2-.6 25-8 6.2-7.6 6.2-18 5.9-27.3-4.6 4.5-9.9 8.5-16.3 10-13.9 3.9-29.2-.9-39.9-10.3-10.8-9.4-17.2-23.9-16.6-38.3.3-16.3 9.5-32 23.4-40.5m20.7 12.8c-6.1 1-11.8 4.4-15.7 9.1-9.4 11.2-9.4 29.1.1 40.1 5.4 6.5 14.1 10.1 22.5 9.2 7.9-.8 15.2-5.8 19.1-12.7 6.6-11.7 5.5-27.6-3.4-37.8-5.5-6.3-14.3-9.4-22.6-7.9z" />
                            <path class="st2" d="M521.5 65.6c12-11.2 30.5-15 45.9-9.1C582 62 591.3 75.9 596 90.2c-21.7 9-43.3 17.9-65 26.9 3 5.7 7.6 10.9 13.8 13 8.7 3.1 19.1 2 26.4-3.8 2.9-2.2 5.2-5.1 7.4-7.9 5.5 3.7 11 7.3 16.5 11-7.8 11.7-20.9 19.9-35 21.2-15.6 1.9-32.2-4.1-42.3-16.3-16.6-19.2-15-51.4 3.7-68.7m10.7 18.5c-3.4 4.9-4.8 10.9-4.7 16.8 14.5-6 29-12 43.5-18.1-2.4-5.6-8.2-9-14.1-9.9-9.5-1.7-19.4 3.4-24.7 11.2z" />
                        </svg>
                    </span>
                    {if $places_status == '1'}<div class="tv_customer">{$google_customer|escape:'html':'UTF-8'}</div>{/if}
                </div>
                <div class="tv_google_reviews_wrapper">
                    <div class="tv_google_reviews">
                        <span class="tv_google_note">{$reviews_note|escape:'html':'UTF-8'}</span>
                        {if $reviews_star_status === '1'}<span class="jq-stars tv_rating" data-rating="{$reviews_note|escape:'html':'UTF-8'}"></span>{/if}
                    </div>
                    {if $reviews_count_status === '1'}<div class="tv_google_count">{l s='%d reviews' sprintf=[$reviews_count] mod='tvgooglebusinessreviews'}</div>{/if}
                </div>
            </div>
            {if $button_status === '1'}
            <div class="tv_google_right">
                <a class="tv_btn_reviews" href="https://search.google.com/local/writereview?placeid={$google_place_id|escape:'html':'UTF-8'}" target="_blank">
                    <button class="btn btn-primary review_btn">
                        <span>{l s='Write a review' mod='tvgooglebusinessreviews'}</span>
                    </button>
                </a>
            </div>
            {/if}
        </div>
        {if $tvgoogle_ratings}
        <div class="tv_reviews_wrapper">
            {foreach from=$tvgoogle_ratings item=google_review}
            <div class="tv_reviews">
                <div class="tv_reviews_content">
                    <div class="clientimg_wrapper col-xs-3 col-sm-2 col-lg-1">
                        <img class="tv_reviews_avatar" src="{$google_review.avatar|escape:'html':'UTF-8'}" />
                    </div>
                    <div class="tv_reviews_right col-xs-9 col-sm-10 col-lg-11">
                        {if $customer_name === '1'} <div class="tv_reviews_name">{$google_review.name|escape:'html':'UTF-8'}</div>{/if}
                        <div class="tv_reviews_ratings">
                            {if $start_status === '1'}<div class="tv-stars tv_reviews_rating" data-rating="{$google_review.rating|escape:'html':'UTF-8'}"></div> {/if}
                            {if $year_ago_status === '1'} <div class="tv_reviews_date">{$google_review.date|escape:'html':'UTF-8'}</div>{/if}
                        </div>
                    </div>
                </div>
                {if $google_review.comment}
                <div class="tv_comment">{$google_review.comment|escape:'html':'UTF-8'}</div>
                {/if}
            </div>
            {/foreach}
        </div>
        {/if}
        <div class="viewmore_btn"><a target="_blank" href="https://search.google.com/local/reviews?placeid={$google_place_id|escape:'html':'UTF-8'}"><span>{l s='View More Reviews' mod='tvgooglebusinessreviews'}</span><span class="nextarrow_icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/></svg></span></a></div>
    </div>
    {/if}
{/if}    