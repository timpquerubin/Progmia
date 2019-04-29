<style>
     div.activity-block {padding: 20px 20px 20px 20px;}
     div.activity-block > div {padding: 10px 0px 10px 0px; width: 80%; margin: 0px auto;}
     div.container.activity {}
     div.wrapper.activity {display: flex; padding: 20px 10px; background-color: #00464d; color: #fff; border: 1px solid transparent; border-radius: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); overflow: hidden;}
     /* div.wrapper.activity > div {display: inline-block;} */

     div.container.stage-logo {width: 20%;}
     div.container.stage-logo > div.wrapper.stage-logo {width: 100%;}
     div.container.stage-logo > div.wrapper.stage-logo > img {width: 80%; margin: 0px auto;}

     div.container.user-info {width: 40%;}
     div.container.user-info > div.wrapper.user-info {margin: 0px; padding: 5px 10px; width: 70%; position: relative; background-color: #0094a2; border: 1px solid transparent; border-radius: 25px;}
     div.container.user-info > div.wrapper.user-info > div {display: inline-block;}
     /* div.container.user-info > div > div.wrapper.user-info {position: relative; background-color: #0094a2;} */
     /* div.container.user-info > div > div.wrapper.user-info > div {display: inline-block;} */
     /* div.container.avatar {width: 39%;} */
     div.container.username {position: absolute; top: 50%; transform: translateY(-50%);}
     div.container.username > p {margin: 0px; padding: 0px 0px 0px 10px;}
     div.container.avatar > div.wrapper.avatar > img {width: 40px;}


</style>

<div class="activity-block">
     <?php foreach ($progress as $key => $prog_val) { ?>
          <div class="">
               <div class="container activity">
                    <div class="wrapper activity" style="">
                         <div class="container stage-logo">
                              <div class="wrapper stage-logo">
                                   <img src="<?php echo base_url(); ?>/assets/images/STAGES/<?php echo $prog_val['STG_FILENAME'] ?>" alt="">
                                   <div class="" style="position: absolute; display: none;">
                                        <div class="" style=" position: relative; background-color: #000; width: 30px; height: 30px; border: 1px solid transparent; border-radius: 50%;">
                                             <div class="" style="position: absolute; width: 100%; top: 50%; transform: translateY(-50%);">
                                                  <p style="margin: 0px; text-align: center;"><?php echo $prog_val['LVL_NUM'] ?></p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="container user-info">
                                   <div class="wrapper user-info">
                                        <div class="container avatar">
                                             <div class="wrapper avatar">
                                                  <img src="<?php echo base_url(); ?>/assets/images/avatars/THUMBNAIL/<?php echo $prog_val['AVTR_ID'] ?>.png" alt="">
                                             </div>
                                        </div>
                                        <div class="container username">
                                             <p><strong><?php echo $prog_val['USER_USERNAME'] ?></strong></p>
                                        </div>
                                   </div>
                         </div>



                         <div class="" style="width: 40%;">
                              <div class="">
                                   <div class="">
                                        <p style="margin: 0px;"><?php echo $prog_val['DATE_PLAYED'] ?></p>
                                   </div>
                              </div>
                              <div class="">
                                   <div class="">
                                        <p>Level <?php echo $prog_val['LVL_NUM'] ?></p>
                                   </div>
                              </div>
                              <div class="">
                                   <div class="">
                                        <p><?php echo $prog_val['GAME_SCORE'] ?></p>
                                   </div>
                              </div>
                         </div>

                    </div>

               </div>
          </div>
     <?php } ?>
</div>
