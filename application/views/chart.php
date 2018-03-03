
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <h3 class="panel-title">Hasil Pemilihan</h3>
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
      hideHover: 'auto',
    });

    

    chart.setData(data);

    chart.redraw();
  }

  
</script>

    <!--script type="text/javascript" src="<?php echo base_url();?>assets/canvasjs/canvasjs.min.js"></script-->

