
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    
                                  
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
   
    <script src="cal.js"></script>
    <!-- jQuery Knob -->
    <script src="vendors/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="js/lib/fullcalendar/fullcalendar.min.js"></script>
	<script src="js/lib/fullcalendar/fullcalendar-init.js"></script>
	<script>
	function SchedulePlan( element ) {
   this.element = element;
   this.timeline = this.element.find('.timeline');
   //...
  
   this.eventsWrapper = this.element.find('.events');
   this.eventsGroup = this.eventsWrapper.find('.events-group');
   this.singleEvents = this.eventsGroup.find('.single-event');
   //..

   this.scheduleReset();
   this.initEvents();
}


var self = this;
this.singleEvents.each(function(){
   //place each event in the grid -> need to set top position and height
   var start = getScheduleTimestamp($(this).attr('data-start')), //getScheduleTimestamp converts hh:mm to timestamp
       duration = getScheduleTimestamp($(this).attr('data-end')) - start;

   var eventTop = self.eventUnitHeight*(start - self.timelineStart)/self.timelineUnitDuration,
       eventHeight = self.eventUnitHeight*duration/self.timelineUnitDuration;
  
   $(this).css({
      top: (eventTop -1) +'px',
      height: (eventHeight+1)+'px'
   });
});

SchedulePlan.prototype.openModal = function(event) {
   var self = this;
   var mq = self.mq();
   this.animating = true;

   //update event name and time
   this.modalHeader.find('.event-name').text(event.find('.event-name').text());
   this.modalHeader.find('.event-date').text(event.find('.event-date').text());
   this.modal.attr('data-event', event.parent().attr('data-event'));

   //update event content
   this.modalBody.find('.event-info').load(event.parent().attr('data-content')+'.html .event-info > *', function(data){
      //once the event content has been loaded
      self.element.addClass('content-loaded');
   });

   this.element.addClass('modal-is-open');

   if( mq == 'mobile' ) {
      self.modal.one(transitionEnd, function(){
         self.modal.off(transitionEnd);
         self.animating = false;
      });
   } else {
      //change modal height/width and translate it
      self.modal.css({
         top: eventTop+'px', //this is the selected event top position
         left: eventLeft+'px', //this is the selected event left position
         height: modalHeight+'px', //this is the modal final height
         width: modalWidth+'px', //this is the modal final width
      });
      transformElement(self.modal, 'translateY('+modalTranslateY+'px) translateX('+modalTranslateX+'px)');

      //set modalHeader width
      self.modalHeader.css({
         width: eventWidth+'px',  //this is the selected event width
      });
      //set modalBody left margin
      self.modalBody.css({
         marginLeft: eventWidth+'px',
      });

      //change modalBodyBg height/width and scale it
      self.modalBodyBg.css({
         height: eventHeight+'px',
         width: '1px',
      });
      transformElement(self.modalBodyBg, 'scaleY('+HeaderBgScaleY+') scaleX('+BodyBgScaleX+')');

      //change modal modalHeaderBg height/width and scale it
      self.modalHeaderBg.css({
         height: eventHeight+'px',
         width: eventWidth+'px',
      });
      transformElement(self.modalHeaderBg, 'scaleY('+HeaderBgScaleY+')');

      self.modalHeaderBg.one(transitionEnd, function(){
         //wait for the  end of the modalHeaderBg transformation and show the modal content
         self.modalHeaderBg.off(transitionEnd);
         self.animating = false;
         self.element.addClass('animation-completed');
      });
   }
};

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
