<div class="newappointment">
    <div class="newappointment_title">
        <h3>New appointment</h3>
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="newappointment_content">
        <div class="calendar-pickday calendar-filter-item">
            <?php
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
            $next_date = date('Y-m-d', strtotime($date .' +1 day'));
            ?>
            <div class="calendar-pickday-item"><a href="?page=calendar&prev=1&date=<?=$prev_date;?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
            <div class="calendar-pickday-item"><a href="?page=calendar&today=1&date=<?=$date;?>">Today</a></div>
            <div class="calendar-pickday-item" id="day">
            <?php
                    // $mydate=getdate(date("U"));
                    // echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                    if(isset($_GET['prev'])){
                        echo $prev_date;
                    }else if(isset($_GET['next'])){
                        echo $next_date;
                    }else{
                        echo $date;
                    }
                ?>
            </div>
            <div class="calendar-pickday-item"><a href="?page=calendar&next=1&date=<?=$next_date;?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>