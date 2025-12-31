/**
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
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/

$(document).ready(function() {

    for (let i = 3; i <= 21; i++) {
        $(`.form-wrapper .form-group:nth-child(${i}) .form-group`).css('margin-bottom', '0');
    }

	function showTab(tab_number) {
        $('.tv-tab-form-data').find('.tab-pane').removeClass('active'); // Remove active class
        $(tab_number).addClass('active'); // Add active class to the current tab
    }

    var tab_number = $('#tvcmstab-product-tab-number').val();
    showTab(tab_number);

    // Tab click handler
    $('.tvadmintab-product-tab').click(function(event) {
        event.preventDefault(); 
        var tab_number = $(this).attr('tab-number');
        $('.tvadmintab-product-tab').removeClass('active');
        $(this).addClass('active');
        $('#tvcmstab-product-tab-number').val(tab_number);
        showTab(tab_number);
    });

    $("input[name='TVGOOGLEBUSINESSREVIEWS_SELECT_PAID_AND_FREE_API_DATA']").change(function() {
        var selectedValue = $(this).val();
        showOptions(selectedValue);
    });
    var selectedValue = $("input[name='TVGOOGLEBUSINESSREVIEWS_SELECT_PAID_AND_FREE_API_DATA']:checked").val();
    showOptions(selectedValue); 
       
    function showOptions(selectedValue) {
        if (selectedValue === "free") {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_FREE_SERVICE').show();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_MAP_SERVICE').hide();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_PLACE_SERVICE').hide();
        } else if (selectedValue === "paid") {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_FREE_SERVICE').hide();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_MAP_SERVICE').show();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_PAID_PLACE_SERVICE').show();
        }
    }


    $("input[name='TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_LANGUAGE']").change(function() {
        var selectedLangValue = $(this).val();
        showLangOptions(selectedLangValue);
    });
    var selectedLangValue = $("input[name='TVGOOGLEBUSINESSREVIEWS_CUSTOMER_REVIEWS_LANGUAGE']:checked").val();
    showLangOptions(selectedLangValue); 
       
    function showLangOptions(selectedLangValue) {
        if (selectedLangValue === "1") {
            $('.TVGOOGLEBUSINESSREVIEWS_DEFAULT_REVIEWS_LANGUAGE').show();
        } else if (selectedLangValue === "0") {
            $('.TVGOOGLEBUSINESSREVIEWS_DEFAULT_REVIEWS_LANGUAGE').hide();
        }
    }

    $("input[name='TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE_STATUS']").change(function() {
        var selectedNameValue = $(this).val();
        showNameOptions(selectedNameValue);
    });
    var selectedNameValue = $("input[name='TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_TITLE_STATUS']:checked").val();
    showNameOptions(selectedNameValue); 
       
    function showNameOptions(selectedNameValue) {
        if (selectedNameValue === "1") {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HIDE_TITLE').show();
        } else if (selectedNameValue === "0") {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_HIDE_TITLE').hide();
        }
    }

    var selecthookvalue = $('#TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION').val();
    if (selecthookvalue == 'displayHome') {
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').show();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').hide();
    } else if (selecthookvalue == 'displayFooter') {
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').hide();
    } else if (selecthookvalue == 'FloatingPosition') {
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').show();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').hide();
    } else {
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').hide();
        $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').show();
    }

    $('#TVGOOGLEBUSINESSREVIEWS_GOOGLE_BADGE_POSITION').change(function() {
        var selecthookvalue = $(this).val();
        if (selecthookvalue == 'displayHome') {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').slideDown();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').slideUp();
        } else if (selecthookvalue == 'displayFooter') {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').slideUp();
        } else if (selecthookvalue == 'FloatingPosition') {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').slideDown();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').slideUp();
        } else {
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_ALIGNMENT_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_SHOW_HOME').slideUp();
            $('.TVGOOGLEBUSINESSREVIEWS_GOOGLE_HIDE_FOOTER_ALIGNMENT_HOME').slideDown();
        }
    });

    $(document).on('click', '#regeneratetvgooglebusinessreviewsToken', function () {
        var $this = $(this);
        $.ajax({
            url: TVCMS_GOOGLE_LINK_AJAX,
            type: 'POST',
            dataType: 'json',
            data: {
                tvcmsInsCheckTokenLiveTime: 1
            },
            beforeSend: function () {
                $this.addClass('loading');
                $this.prop('disabled', true);
            },
            success: function (res) {
                console.log(res); // Debug response
                if (res.success) {
                    // Update the token in the DOM
                    if ($('#token_changes').is('input') || $('#token_wget_changes').is('input')) {
                        $('#token_changes').val(res.new_token); // Use .val() for inputs
                        $('#token_wget_changes').val(res.new_token);
                    } else {
                        $('#token_changes').text(res.new_token);
                        $('#token_wget_changes').text(res.new_token); // Use .text() for spans/divs
                    }

                    // Generate the new href link
                    var hrefLink = tvcanonicalUrl + 'tvgooglecronjobtoken?tvgooglecron=' + res.new_token + '&id_shop=' + shop_id;
                    $('#tv_execute_cron_task').attr('href', hrefLink);

                    showSuccessMessage(res.message || 'Success');
                } else {
                    showErrorMessage(res.message || 'Error');
                }
            },
            complete: function () {
                $this.removeClass('loading');
                $this.prop('disabled', false);
            }
        });

        return false;
    });

    var hrefLink = tvcanonicalUrl + 'tvgooglecronjobtoken?tvgooglecron=' + tv_emails_token + '&id_shop=' + shop_id;
    $('#tv_execute_cron_task').attr('href', hrefLink);

    $('#TVGOOGLEBUSINESSREVIEWS_EMAILS_ORDER_NUMBER_OF_DAYS').on('input', function() { $(this).val($(this).val().replace(/\D/g, '')); });

  $('.google-badge-clr .col-lg-6').removeClass('col-lg-6').addClass('col-lg-3');

});


