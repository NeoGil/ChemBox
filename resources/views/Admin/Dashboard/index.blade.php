<section class="content-header">
    <h1>Панель инструментов</h1>
</section>
<div class="content">

    <a href="courses" style="text-decoration: none; color: #000000;" >
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon"><img src="/userfiles/files/free-icon-online-course-2000887.png"></span>
            <div class="info-box-content">
                <span class="info-box-text">Курсы — {{$activity_C['all']}}</span>
                <span class="info-box-number">Активные: {{$activity_C['Active']}}</span>
                <span class="info-box-number">Не активные: {{$activity_C['NonActive']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </a>
    <a href="materials" style="text-decoration: none; color: #000000;" >
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon"><img src="/userfiles/files/premium-icon-course-3195445.png"></span>
            <div class="info-box-content">
                <span class="info-box-text">Материалы — {{$activity_M['all']}}</span>
                <span class="info-box-number">Активные: {{$activity_M['Active']}}</span>
                <span class="info-box-number">Не активные: {{$activity_M['NonActive']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </a>
    <a href="methods" style="text-decoration: none; color: #000000;" >
        <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon"><img src="/userfiles/files/premium-icon-miscellaneous-3195457.png"></span>
            <div class="info-box-content">
                <span class="info-box-text">Методы обучения — {{$activity_Methods['all']}}</span>
                <span class="info-box-number">Активные: {{$activity_Methods['Active']}}</span>
                <span class="info-box-number">Не активные: {{$activity_Methods['NonActive']}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </a>

</div>
