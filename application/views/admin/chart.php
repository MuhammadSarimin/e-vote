    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <center><h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Real Count Pemira</h3></center>
        </div>
        
        <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-pemilihan" style="height: 230px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


      </div>
    </div>

<script type="text/javascript">
  window.onload = function(){
    //$.getJSON('<?php echo base_url('index.php/autentikasi/chart_js');?>', myCallback);

    $.ajax({
      url: '<?php echo base_url('index.php/autentikasi/chart_js');?>',
      type: 'GET',
      dataType: 'json',
      success: function(data){
        myCallback(data);
      }
    });
    setTimeout(window.onload, 2000);
  }

  function myCallback(data){
    $("#bar-pemilihan").html("");
    
    var chart = new Morris.Bar({
      element: 'bar-pemilihan',
      data: [],
      xkey: 'kandidat',
      ykeys: ['persentase'],
      ymax: 100,
      labels: ['Suara'],
      units: '%',
      hideHover: false
    });

    chart.setData(data);

    chart.redraw();
  }

  
</script>

