<?php
global $settings;

 
?>
<div class="accordion">

<div class="accordion" id="faq1-accodian">
                            
                            
                            <?php $i=1; while($i < 7){ 
							
							if($i > 3 && $settings['faq'.$i.'_title'] == ""){ $i++; continue; }
							
							?>
                            <div class="card border mb-3">
                              <div class="bg-white">
                              
                                <button class="btn text-dark font-weight-bold w-100 text-left <?php if($i != 1){ echo ""; }?>" type="button" data-toggle="collapse" data-target="#collapse-faq1-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                
                                    <i class="fa fa-info-circle mr-2"></i>
                                    
                                    <?php if($settings['faq'.$i.'_title'] == ""){ ?>
                                    Example FAQ Title Here
                                    <?php }else{ ?>
                                    <?php echo $settings['faq'.$i.'_title']; ?>
                                    <?php } ?>
                                  </button>
                                  
                              </div>
                             </div> 
                              
                          
                              <div id="collapse-faq1-<?php echo $i; ?>" class="collapse <?php if($i == 1){ echo "show"; }?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#faq1-accodian" style="">
                                <div class="pb-3 text-muted">
                                    
                                    <?php if($settings['faq'.$i.'_desc'] == ""){ ?>
                                     
                                    Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem eos. Mazim nemore singulis an ius, nullam ornatus nam ei. 
                                    Ut dicat euismod invidunt pro, ne his dolorum molestie reprehendunt, quo luptatum evertitur ex.
									<?php }else{ ?>
                                    
                                    <?php echo $settings['faq'.$i.'_desc']; ?>
                                    
                                    <?php } ?>
                                </div>
                              </div>
                            
                            <?php $i++; } ?>
                            
                             
 
	</div>
</div>             
<?php  ?>