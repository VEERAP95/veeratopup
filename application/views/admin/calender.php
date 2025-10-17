<?php include("header.php"); ?>

<div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Calendar</a></li>
                                <li class="breadcrumb-item active">Calendar</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-calendar-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">JavaScript Calendar</h1>
                                    <small>the most popular full-sized.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <div class="row">
                            <div class="col-lg-12 col-xl-3">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div id='external-events'>
                                            <h4 class="fs-19 mb-3">Draggable Events</h4>
                                            <div id='external-events-list'>
                                                <div class='fc-event'>My Event 1</div>
                                                <div class='fc-event'>My Event 2</div>
                                                <div class='fc-event'>My Event 3</div>
                                                <div class='fc-event'>My Event 4</div>
                                                <div class='fc-event'>My Event 5</div>
                                            </div>
                                            <div class="mt-3">
                                                <input type='checkbox' id='drop-remove' />
                                                <label for='drop-remove'>remove after drop</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4 class="fs-19 mb-3">FullCalendar</h4>
                                        <p> is a jQuery plugin that provides a full-sized, drag &amp; drop calendar like the one below. It uses AJAX to fetch events on-the-fly for each month and is
                                            easily configured to use your own feed format (an extension is provided for Google Calendar).</p>
                                        <p><a href="https://fullcalendar.io/" target="_blank">FullCalendar documentation</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- calender -->
                                        <!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.body content-->
                </div><!--/.main content-->
<?php include("footer.php"); ?>