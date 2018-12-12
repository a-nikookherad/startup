<?php
    function get_title(){
        global $db_page;
        $title=$db_page['title'];
        echo $title;
    }
    
    function get_content(){
        global $db_page;
        $content=$db_page['content'];
        filter_output($content);
        ?>
<div id="card" class="card">

    <div class="card-header">
        <span class="close" onclick="document.getElementsByClassName('card')[0].style.display='none';">&times;</span>
    </div>

    <div class="card-body">
        <!--content goes here-->
        <img class="card-img-top mb-1" src="../asset/images/css.jpg" width="100%" height="150px" alt="css"/>
        <div class="media">
            <img class=""  src="../asset/images/a.jpg" width="100vw" height="100vw" alt="a"/>
            <p class="mr-3"><?php echo $content; ?></p>
        </div>
        <!--end content-->
    </div>


    <div class="card-footer">
        <table border="0" >
                <tr style="line-height: 5px;font-size: 1rem;width: 60%;">
                    <td>نویسنده مطلب</td>
                    <td></td>
                    <td>تاریخ انتشار</td>
                    <td></td>
                    <td>فهرست</td>
                    <td></td>
                </tr>
        </table>
    </div>

</div>
        <?php
    }

