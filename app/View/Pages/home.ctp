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
    <div data-component="HomeCarousel"></div>
</div>

<style>
  .img1 {
	    max-width: 100%;
      width: 1200px;
	    height: 50px;
	    width: auto\9;
      border-radius: 50%;
}
</style>


<div class="row top30">
<div class="col-sm-12 well"><h2 class="text-center">Welcome to the Hawke Mediation Centre</h2>
    <p>Welcome to the Meditation Centre home page. We are a local, donation based, community driven service that provides professionally developed mediation courses to enrolled members of the public.</p>
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
      <img class = "img1" src="http://i.imgur.com/2bP73ei.jpg" alt = ""/>
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
            <a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/"> <img alt="" class="img-responsive" src="http://3.thailandcamp.com/wp-content/uploads/2012/06/yogapose.jpg"></a>
            <div class="caption">
                <h4><a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/">Introductory (10 day)</a></h4>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="col-sm-12 thumbnail text-center">
            <a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/"> <img alt="" class="img-responsive" src="http://blog.posturepodiatry.com/wp-content/uploads/2014/11/Yoga-1-300x300.jpg"></a>
            <div class="caption">
                <h4><a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/">Express (3 day)</a></h4>
            </div>
        </div>
    </div>
        <div class="col-sm-4">
        <div class="col-sm-12 thumbnail text-center">
        <a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/"> <img alt="" class="img-responsive" src="https://image.spreadshirtmedia.net/image-server/v1/compositions/119596348/views/1,width=300,height=300,appearanceId=29,version=1469440032/buddha-statue-meditation-buddhism-t-shirts-womens-premium-t-shirt.jpg"></a>
            <div class="caption">
                <h4><a href = "https://teamhawk-meditation-centre.herokuapp.com/courses/">Buddhist (30 day)</a></h4>
            </div>
        </div>
    </div>
</div>
