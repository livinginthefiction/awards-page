<?php include('components/header.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include('components/sidebar.php'); ?>

     <div class="main-panel">        
        <div class="content-wrapper py-1">
          <div class="row">
            
           
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Awards List </h4>      
                    <div id="toolbar"></div>
                    <table
  id="table"
  data-toolbar="#toolbar"
  data-search="true"
  data-show-refresh="true"
  data-detail-formatter="detailFormatter"
  data-minimum-count-columns="2"
  data-pagination="true"
  data-id-field="id"
  data-page-size="5"
  data-page-list="[5, 10, 25, 50, 100, all]"
  data-show-footer="true"
  data-side-pagination="server"
  data-buttons="buttons"
  data-url="ajax/getawards.php"
  data-response-handler="responseHandler">
</table>
                
                </div>
              </div>
            </div>

    
          </div>
        </div>
    
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
     
      </div>
     
    </div>

  </div>
 
<script>
  var $table = $('#table')
  var $remove = $('#remove')
  var selections = []

  function buttons () {
    return {
      btnAdd: {
        text: 'Add new row',
        icon: 'fa-plus',
        event: function () {
          // alert('Do some stuff to e.g. add a new row')
          window.location.replace('editAward.php?id=');
        },
        attributes: {
          title: 'Add new Category'
        }
      }
    }
  }

  function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
      return row.id
    })
  }

  function responseHandler(res) {
    $.each(res.rows, function (i, row) {
      row.state = $.inArray(row.id, selections) !== -1
    })
    return res
  }

  function detailFormatter(index, row) {
    var html = []
    $.each(row, function (key, value) {
      html.push('<p><b>' + key + ':</b> ' + value + '</p>')
    })
    return html.join('')
  }

  function imageFormatter(value, row, index) {
    // console.log('imageFormatter',value,row,index);
    // console.log(JSON.parse(row.image)[0]);
    return [
      '<img class="w-10" src="../'+JSON.parse(row.image)[0]+'">',
    ].join('')
  }

  function operateFormatter(value, row, index) {
    // console.log('operateFormatter',value,row,index);
    return [
      '<a class="like" href="editAward.php?id='+row.id+'" title="Edit">',
      '<i style="font-size: 22px;" class="mx-1 fas fa-edit"></i>',
      '</a>  ',
      '<a class="remove" href="ajax/deleteaward.php?id='+row.id+'" title="Remove">',
      '<i style="font-size: 22px;" class="mx-1 fa fa-trash"></i>',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like action, row: ' + JSON.stringify(row))
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function totalTextFormatter(data) {
    return 'Total'
  }

  function totalNameFormatter(data) {
    return data.length
  }

  function totalPriceFormatter(data) {
    var field = this.field
    return '$' + data.map(function (row) {
      return +row[field].substring(1)
    }).reduce(function (sum, i) {
      return sum + i
    }, 0)
  }

  function initTable() {
    $table.bootstrapTable('destroy').bootstrapTable({
      // height: 550,
      locale: 'en-US',
      columns: [
        {
          field: 'counter',
          title: 'Id',
          sortable: true,
          // footerFormatter: totalNameFormatter,
          align: 'center'
        },
        {
          field: 'name',
          title: 'Award Name',
          sortable: true,
          // footerFormatter: totalNameFormatter,
          align: 'center'
        }, {
          field: 'image',
          title: 'Image',
          sortable: true,
          align: 'center',
          formatter: imageFormatter
          // footerFormatter: totalPriceFormatter
        }, {
          field: 'category',
          title: 'Category',
          sortable: true,
          align: 'center',
          // formatter: imageFormatter
          // footerFormatter: totalPriceFormatter
        }, {
          field: 'operate',
          title: 'Item Operate',
          align: 'center',
          clickToSelect: false,
          // events: window.operateEvents,
          formatter: operateFormatter
        }
      ]
    })
   
  
  }

  $(function() {
    initTable()

  })
</script>
</body>

</html>
