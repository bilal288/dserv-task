<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel task</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
  <!-- Datatables -->

  <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('builds/css/custom.min.css') }}" rel="stylesheet">
  <style>

  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title"><i class="fa fa-user"></i> <span>Users</span></a>
          </div>

          <div class="clearfix"></div>

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>User Management</h3>
              <ul class="nav side-menu">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Users List</a></li>
                <li><a href="{{url('user/add')}}"><i class="fa fa-plus-square"></i> Add User</a></li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </div>
      <!-- /top navigation -->
      @yield('body')
      <!-- footer content -->
      <!-- <footer>
        <div class="pull-right">
          Laravel - task done by <a href="https://github.com/Bilal288">Bilal</a>
        </div>
        <div class="clearfix"></div>
      </footer> -->
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
  <!-- NProgress -->
  <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
  <!-- Datatables -->
  <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
  <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
  <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
  <script src="{{ asset('vendors/pdfmake/builds/pdfmake.min.js') }}"></script>
  <script src="{{ asset('vendors/pdfmake/builds/vfs_fonts.js') }}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{ asset('builds/js/custom.min.js') }}"></script>
  <script>
    $(function() {
      $('.is_active').on('change', function() {
        var is_active = $(this).val(); // get the selected status
        var id = $(this).data('id'); // get the user ID from the data-id attribute
        window.location.reload();
        $.ajax({
          url: '{{ route("user.activate") }}',
          type: 'POST',
          data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
            "is_active": is_active
          },
          dataType: 'json',
          success: function(response) {
            console.log(response);
              window.location.reload();

          },
          error: function(xhr) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
  <script>
    (function($) {
      $.fn.multiselect = function() {

        var selector = this;
        var options = $.extend({
          onChange: function() {}
        }, arguments[0] || {});

        activate();



        function activate() {

          //events
          $(selector).find('.title').on('click', function(e) {
            $(this).parent().find('.select-options').toggle();
          });

          $(selector).find('input[type="checkbox"]').change(function(e) {
            options.onChange.call(this);
          });

        }
      };

    }(jQuery));

    $(document).ready(function() {
      $('.select-list').multiselect({
        onChange: updateTable
      });
    });

    function updateTable() {
      var checkboxValue = $(this).val();
      var isChecked = $(this).is(':checked');

    }
  </script>
</body>

</html>