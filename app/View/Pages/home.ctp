<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>

<div class="row">
    <div id="feature-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#feature-carousel" data-slide-to="1"></li>
            <li data-target="#feature-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="http://i.imgur.com/NQpW6hm.jpg" alt="">
            <div class="carousel-caption">
            </div>
            </div>
            <div class="item">
            <img src="http://www.spinealign.net.au/wp-content/uploads/2016/01/header-Carla-Gasparin.jpg" alt="">
            <div class="carousel-caption">
            </div>
            </div>
            <div class="item">
            <img src="http://i.imgur.com/biVYjls.jpg" alt="">
            <div class="carousel-caption">
            </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#feature-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#feature-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="row top30">
<div class="col-sm-12 well"><h2 class="text-center">Welcome to the Hawke Mediation Centre</h2>
    <p>Welcome to the Mediation Centre home page. We are a local, donation based, community driven service that provides professionally developed mediation courses to enrolled members of the public.</p>
    <p>If you’d like to be a part of our ever-growing community, book a course, or even just keep up to date on our available services, then don’t hesitate to sign up today! It’s absolutely free and with no strings attached.</p>
    <p>To find out more about us or the courses we have on offer, feel free to browse the relevant pages on the navigation bar located at the top of this page.</p>
    <p>Thank you for visiting our page. We hope to be seeing you soon!</p>
    <p> - <i>Centre Managers.</i></p>
    <?php if (!AuthComponent::user('id')): ?>
            <div class="text-center">
                <a href="/users/add" class="text-center btn btn-lg btn-primary">Become a Member</a>
            </div>
        <?php endif; ?>
        </div>
</div>

<div class = "row top30">
  <div class = "col-sm-12 well">
    <h2>Ready to enrol in a course?</h2>
    <p>Once signed up, please feel free to enrol in the course of your choice below. All new students must first complete the 10 day Introductory course before you can enrol in the Express or Buddhist courses.</p>
    <p>After completing the Introductory course, members are welcome to enrol again in any other course as a student or a volunteer server. To find out more about becoming a server, please visit the 'About' page.</p>
  </div>
</div>

<div class="row top30">

    <div class="col-sm-4">
        <div class="col-sm-12 thumbnail text-center">
            <img alt="" class="img-responsive" src="http://3.thailandcamp.com/wp-content/uploads/2012/06/yogapose.jpg">
            <div class="caption">
                <h4>Introductory (10 day)</h4>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="col-sm-12 thumbnail text-center">
            <img alt="" class="img-responsive" src="http://blog.posturepodiatry.com/wp-content/uploads/2014/11/Yoga-1-300x300.jpg">
            <div class="caption">
                <h4>Express (3 day)</h4>
            </div>
        </div>
    </div>
        <div class="col-sm-4">
        <div class="col-sm-12 thumbnail text-center">
            <img alt="" class="img-responsive" src="https://image.spreadshirtmedia.net/image-server/v1/compositions/119596348/views/1,width=300,height=300,appearanceId=29,version=1469440032/buddha-statue-meditation-buddhism-t-shirts-womens-premium-t-shirt.jpg">
            <div class="caption">
                <h4>Buddhist (30 day)</h4>
            </div>
        </div>
    </div>
</div>
