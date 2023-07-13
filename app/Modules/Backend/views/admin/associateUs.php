<div class="content-wrapper" style="margin-top: 60px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">AssociateUs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="admin">Home</a></li>
                <li class="breadcrumb-item active">AssociateUs</li>
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
                        <th>Nmae</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Breif_profile</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($associate->result() as $record) : ?>

                        <tr>
                          <td><?php echo empty($record->fname) ? NULL :  $record->fname; ?></td>
                          <td><?php echo empty($record->address) ? NULL :  $record->address; ?></td>
                          <td><?php echo empty($record->city) ? NULL :  $record->city; ?></td>
                          <td><?php echo empty($record->state) ? NULL :  $record->state; ?></td>
                          <td><?php echo empty($record->pincode) ? NULL :  $record->pincode; ?></td>
                          <td><?php echo empty($record->mobile) ? NULL :  $record->mobile; ?></td>
                          <td><?php echo empty($record->email) ? NULL :  $record->email; ?></td>
                          <td><?php echo empty($record->brief_profile) ? NULL :  $record->brief_profile; ?></td>
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