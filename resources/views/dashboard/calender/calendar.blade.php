@extends('dashboard.layouts.master')

@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" href="assets/plugins/fullcalendar/main.css">
@endpush

@section('content')
<!-- Main content -->
<!-- The modal For create workorder-->
<div class="modal fade" id="workorderModal" tabindex="-1" role="dialog" aria-labelledby="workorderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workorderModalLabel">Create Work Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="position-relative card p-4">

                            <div class="">
                                <livewire:dashboard.widget.search-product />
                            </div>

                            <livewire:dashboard.widget.list-product />





                        </div>



                    </div>
                </div>

                @livewire('dashboard.workorder.create-workorder')
            </div>
        </div>
    </div>
</div>

<!-- The modal For edit workorder-->
<div class="modal fade" id="editWorkorderModal" tabindex="-1" role="dialog" aria-labelledby="editWorkorderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWorkorderModalLabel">Edit Work Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="position-relative card p-4">

                            <div class="">
                                <livewire:dashboard.widget.search-product />
                            </div>

                            <livewire:dashboard.widget.list-product />





                        </div>



                    </div>
                </div>

                <livewire:dashboard.workorder.edit-workorder/>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="display:none">
                <div class="sticky-top mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Events</h4>
                        </div>
                        <div class="card-body">
                            <!-- the events -->
                            <div id="external-events">
                                <div class="external-event bg-success">Lunch</div>
                                <div class="external-event bg-warning">Go home</div>
                                <div class="external-event bg-info">Do homework</div>
                                <div class="external-event bg-primary">Work on UI design</div>
                                <div class="external-event bg-danger">Sleep tight</div>
                                <div class="checkbox">
                                    <label for="drop-remove">
                                        <input type="checkbox" id="drop-remove">
                                        remove after drop
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Event</h3>
                        </div>
                        <div class="card-body">
                            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                <ul class="fc-color-picker" id="color-chooser">
                                    <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                                <div class="input-group-append">
                                    <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                </div>
                                <!-- /btn-group -->
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('scripts')
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                        'background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            //   events: [
            //     {
            //       title          : 'All Day Event',
            //       start          : new Date(y, m, 1),
            //       backgroundColor: '#f56954', //red
            //       borderColor    : '#f56954', //red
            //       allDay         : true
            //     },
            //     {
            //       title          : 'Long Event',
            //       start          : new Date(y, m, d - 5),
            //       end            : new Date(y, m, d - 2),
            //       backgroundColor: '#f39c12', //yellow
            //       borderColor    : '#f39c12' //yellow
            //     },
            //     {
            //       title          : 'Meeting',
            //       start          : new Date(y, m, d, 10, 30),
            //       allDay         : false,
            //       backgroundColor: '#0073b7', //Blue
            //       borderColor    : '#0073b7' //Blue
            //     },
            //     {
            //       title          : 'Lunch',
            //       start          : new Date(y, m, d, 12, 0),
            //       end            : new Date(y, m, d, 14, 0),
            //       allDay         : false,
            //       backgroundColor: '#00c0ef', //Info (aqua)
            //       borderColor    : '#00c0ef' //Info (aqua)
            //     },
            //     {
            //       title          : 'Birthday Party',
            //       start          : new Date(y, m, d + 1, 19, 0),
            //       end            : new Date(y, m, d + 1, 22, 30),
            //       allDay         : false,
            //       backgroundColor: '#00a65a', //Success (green)
            //       borderColor    : '#00a65a' //Success (green)
            //     },
            //     {
            //       title          : 'Click for Google',
            //       start          : new Date(y, m, 28),
            //       end            : new Date(y, m, 29),
            //       url            : 'https://www.google.com/',
            //       backgroundColor: '#3c8dbc', //Primary (light-blue)
            //       borderColor    : '#3c8dbc' //Primary (light-blue)
            //     }
            //   ],
            events: @json($events),
            editable: true,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            dateClick: function(info) {
                // Create a Livewire component instance
                // Livewire.emit('openNewWorkorderPopup', info.dateStr);
                console.log(info);
                $('input[name="appointment_date"]').val(info.dateStr);
                $('#workorderModal').modal('show');
            },
            eventClick: function(info) {

                console.log(info,info.event.id);
                Livewire.emit('openEditWorkorderPopup', info.event.id);
                $('#editWorkorderModal').modal('show');

            },
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            // Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
        })
    })
</script>
@endpush
