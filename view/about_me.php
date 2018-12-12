<?php
    function get_title(){
        echo 'درباره من';
    }
    
    function get_content(){
        
    ?>
<div id="card" class="card">
    <div class="card-header"><span class="close" onclick="document.getElementsByClassName('card')[0].style.display='none';">&times;</span></div>
    <div class="card-body">
        <!--content goes here-->
        <div class="media">
            <img class=""  src="../asset/images/a.jpg" width="100vw" height="100vw" alt="a"/>
            <p class="ml-1">بنده علی نیکوخرد طراح و توسعه دهنده ی این سایت هستم و به تازگی این سایت را استارت زدم امید است که در زاه ترقی و پیشرفت موفق  ومعظم باشم</p>
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
