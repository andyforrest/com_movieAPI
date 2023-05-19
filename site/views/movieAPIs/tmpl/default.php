<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_movieAPI
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');



// echo "this works";

//echo $this->content['movies'][0]->title;
// var_dump($this->content['movies']);
//echo $this->content['movies'][0];
//print_r($this->content['movies'][0]);

// var_dump($this->content['movies']);

?>


<!--<div class="movie-listing">-->
    <?php if (!empty($this->content['movies'])): ?>
        <div class="d-flex flex-wrap">
        <?php foreach ($this->content['movies'] as $movie): ?>
            <?php

            $image = $movie['#content']['image'];
            $title = $movie['#content']['title'];
            $description = $movie['#content']['description'];

            ?>



                    <div class="flex-item border">
                        <?php echo "<div class ='image'><img src=$image alt=$title></div>"; ?>
                        <?php echo "<h2 class='title'>$title</h2>"; ?>
                        <?php echo "<p class='description'>$description</p>"; ?>
                    </div>




        <?php endforeach; ?>
        </div>
    <?php endif; ?>


<?php //echo "<div class='card text-center' style='width: 18rem '";?>

<!--col-md-3 d-flex justify-content-center-->


