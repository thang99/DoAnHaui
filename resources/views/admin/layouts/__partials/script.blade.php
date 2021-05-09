<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
  CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor1');
</script>

<script>
   CKEDITOR.replace( 'ckeditor', {
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
  });
  CKEDITOR.replace( 'ckeditor1', {
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      setTimeout(function(){
        $("div.alert").remove();
      }, 3000 );

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $("input").keypress(function(){
          $(this).removeClass("is-invalid")
          $(this).next("span").hide();
      });
  });
</script>

{{-- change status comment  --}}
<script type="text/javascript">
  $(document).ready(function(){
    $(".status-comment").change(function(){
      var comment_id = $(this).find(':selected').attr('data-id');
      var status_comment = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{url('/admin/change-status')}}" ,
        method: "POST",
        data: {comment_id: comment_id, status_comment: status_comment, _token: _token},
        success: function(data) {
          window.location.reload();
        }
      })
    })
  })
</script>

{{-- change status feedback  --}}
<script type="text/javascript">
  $(document).ready(function(){
    $(".status-feedback").change(function(){
      var feedback_id = $(this).find(':selected').attr('data-id');
      var status_feedback = $(this).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{url('/admin/change-status-feedback')}}" ,
        method: "POST",
        data: {feedback_id: feedback_id, status_feedback: status_feedback, _token: _token},
        success: function(data) {
          window.location.reload();
        }
      })
    })
  })
</script>

{{-- change status order --}}
<script type="text/javascript">
  $(document).ready(function() {
    $(".change-status-order").change(function() {
        var order_id =$(this).find(':selected').attr('data-id');
        var order_status = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url: "{{url('/admin/change-status-order')}}",
          method: "POST",
          data: {order_id: order_id, order_status: order_status, _token: _token},
          success: function() {
            window.location.reload();
          }
        })
    })
  })
</script>