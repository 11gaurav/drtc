<div class="content-wrapper" style="margin-top: 60px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pickup Request</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin">Home</a></li>
            <li class="breadcrumb-item active">Pickup_Request</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Source-station</th>
                    <th>Destination</th>
                    <th>Collection-Point</th>
                    <th>Weight</th>
                    <th>Articles_number</th>
                    <th>Company_name</th>
                    <th>Address</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pickup->result() as $record) : ?>
                    <tr>
                      <td><?php echo empty($record->source_station) ? NULL :  $record->source_station; ?></td>
                      <td><?php echo empty($record->destination) ? NULL :  $record->destination; ?></td>
                      <td><?php echo empty($record->collection_point_address) ? NULL :  $record->collection_point_address; ?></td>
                      <td><?php echo empty($record->weight) ? NULL :  $record->weight; ?></td>
                      <td><?php echo empty($record->articles_number) ? NULL :  $record->articles_number; ?></td>
                      <td><?php echo empty($record->company_name) ? NULL :  $record->company_name; ?></td>
                      <td><?php echo empty($record->address) ? NULL :  $record->address; ?></td>
                      <td><?php echo empty($record->fname) ? NULL :  $record->fname; ?></td>
                      <td><?php echo empty($record->mobile) ? NULL :  $record->mobile; ?></td>
                      <td><?php echo empty($record->email) ? NULL :  $record->email; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>