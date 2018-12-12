<?php
    function get_title(){
        echo 'home';
    }
    
    function get_content(){
        ?>
<div id="card" class="card fav_color" >
    <div class="card-header"><span class="close" onclick="document.getElementsByClassName('card')[0].style.display='none';">&times;</span></div>
    <div class="card-body">
        <!--content goes here-->
        <img class="card-img-top mb-1" src="../asset/images/css.jpg" width="100%" height="150px" alt="css"/>
        <div class="media">
            <img class=""  src="../asset/images/a.jpg" width="100vw" height="100vw" alt="a"/>
            <p class="ml-1">بنده علی نیکوخرد طراح و توسعه دهنده ی این سایت هستم و به تازگی این سایت را استارت زدم م</p>
        </div>
        <!--end content-->
    </div>
    <div class="card-footer">
        <table border="0" class="table" >
                <tr style="line-height: 5px;font-size: 1rem;width: 100%;">
                    <td>نویسنده مطلب:</td>
                    <td>علی نیکوخرد</td>
                    <td>تاریخ انتشار</td>
                    <td>امروز</td>
                    <td>فهرست</td>
                    <td>بدون فهرست</td>
                </tr>
        </table>
    </div>
</div>
        <?php    }
