<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/public/partials
 */
?>
 <div class="container" id="contenainer">
  <!-- Trigger the modal with a button -->
     
   


  <!-- Modal -->
  <div class="modal fade" id="TryOnModal" data-backdrop="false" role="dialog" style="z-index: 10000000;margin-top: 45px;">
    <div class="modal-dialog" id="TryOnModal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content try_on_popup">
       <div class="modal-header" style="padding-top: 5px;
    padding-left: 5px;padding-bottom: 0px;">
            <div class="row" style="margin-bottom:0px;">
                <div class="col-md-12 col-lg-12  col-xs-12  col-sm-12">
                                
                              
                        <span class="picture glyphicon glyphicon-repeat" data-toggle="tooltip" data-placement="top" title="Rotate Clockwise" onclick="rotate_right()">
                        </span>
                           
                    <span class="picture glyphicon glyphicon-repeat rotate-gly" onclick="rotate_left()" data-toggle="tooltip" data-placement="top" title="Rotate Anti Clock Wise">
                        </span> 
                    <span class="picture  glyphicon glyphicon-zoom-in" ontouchstart="zoom_in()" onclick="zoom_in()" data-toggle="tooltip" data-placement="top" title="Enlarge Glass size">
                                 </span>
                            <span class="picture glyphicon glyphicon-zoom-out" ontouchstart="zoom_out()" onclick="zoom_out()" data-toggle="tooltip" data-placement="top" title="Shrink Glass size">
                        </span>
                    
                       <!-- <a id="linkimage" onclick="this.css('display','none');"><span  id="download_btn"  style="display:none" class="picture glyphicon glyphicon-download"> </span></a>-->
                       
                    
                    
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>   </div>
          </div>
        <div class="modal-body" id="modal_body">
            <div class="row" style="margin-bottom:0px;">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="row" style="margin-bottom:0px;">
                        <div class="col-lg-12  col-md-12 col-xs-12 col-sm-12">
                            <div id="image_download" class="row" >
                                <div id="galssimagediv"  >
                            <img  id="galssimage" src=""  class="img-responsive img-thumbnail fixed_images"  >
                        </div>
                        <img style="width: 100%;"  src="<?php echo plugin_dir_url(__FILE__).'/images/man_face.jpg' ?>" id="imageCanvas" class="img-responsive img-thumbnail fixed_images" alt="Cinque Terre">
                        <img    id="front_uploaded"  style="display:none;width: 100%;" class="img-thumbnail fixed_images" />
                        <img     id="side_uploaded"  style="display:none;width: 100%;" class="img-thumbnail fixed_images"/>
                       </div>
                                
          
                        </div>
                        
                       
                         
                    </div>
                    
                </div>
                
                
            </div>
        </div>
        <div class="modal-footer">
        
            <?php echo "<a class='btn btn-info' id='addtocartlink' href=''><span class='glyphicons glyphicons-shoping-cart'></span>Add to cart</a>";?> 
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


