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

    if(customerStarcolor){
        $('.tv_reviews_rating').starRating({
            totalStars: 5,
            readOnly: true,
            starSize: 18,
            hoverColor: '#e7711b',
            activeColor: '#e7711b',
            starGradient: {
                start: customerStarcolor,
                end: customerStarcolor
            },
        });
    } else {
        $('.tv_reviews_rating').starRating({
            totalStars: 5,
            readOnly: true,
            starSize: 18,
            hoverColor: '#e7711b',
            activeColor: '#e7711b',
            starGradient: {
                start: '#e7711b',
                end: '#e7711b'
            },
        });
    }    

    if(badgeStarcolor){
        $('.tv_rating').starRating({
            totalStars: 5,
            readOnly: true,
            starSize: 20,
            hoverColor: '#e7711b',
            activeColor: '#e7711b',
            starGradient: {
                start: badgeStarcolor,
                end: badgeStarcolor
            },
        });
    } else {
        $('.tv_rating').starRating({
            totalStars: 5,
            readOnly: true,
            starSize: 20,
            hoverColor: '#e7711b',
            activeColor: '#e7711b',
            starGradient: {
                start: '#e7711b',
                end: '#e7711b'
            },
        });
    }    
    // google review slider intialisation start
    $('.tv_reviews_content_wrapper').owlCarousel({
        loop: false,
        dots: false,
        nav: false,
        smartSpeed: 600,
        margin: 20,
        responsive: {
            0: { items: 1, margin: 0 },
            320: { items: 1, slideBy: 1, margin: 0 },
            450: { items: 2, slideBy: 1 },
            575: { items: 2, slideBy: 1 },
            768: { items: 3, slideBy: 1 },
            992: { items: 3, slideBy: 1 },
            1200: { items: 3, slideBy: 1 },
            1600: { items: 3, slideBy: 1 },
            1800: { items: 3, slideBy: 1 }
        },
    });
    $('.tvreviews-prev').click(function(e) {
        e.preventDefault();
        $('.google-reviews-wrapper .owl-nav .owl-prev').trigger('click');
    });
    $('.tvreviews-next').click(function(e) {
        e.preventDefault();
        $('.google-reviews-wrapper .owl-nav .owl-next').trigger('click');
    });

    $('.slider_wrapper .tv_comment').balance();
    $('.slider_wrapper .tv_reviews_content').balance();
    $('.gridview_wrapper .tv_comment').balance();
    $('.gridview_wrapper .tv_reviews_content').balance();

    $('#google_review_badge').fancybox({
        'width': 750,
        'height': 'auto',
        'maxHeight': '600',
        'autoSize': false,
        'showCloseButton': true,
    });

});