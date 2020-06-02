<div class="content-wrapper">
    <div class="container-fluid">
    
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3" width="100%">
      <?php if($this->session->flashdata('flash-data') ): ?>
    <div class="row mt-4">
      <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">Position Data Has Been
        <strong>Successfully</strong> <?= $this->session->flashdata('flash-data');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  </div>
</div>
<?php endif; ?>
        <div class="card-header">
          <i class="fa fa-table">COURSE DATA</i>
        </div>
        <div class="btn-group" style="margin-left:auto;margin-right:auto;display:block;margin-bottom:0%" >
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addlecturer">ADD COURSE DATA</button>
          <!-- <a href="<?php echo base_url('lecturer/export_excel'); ?>" class="btn btn-success">EXPORT TO EXCEL</a>
          <br> <br>
          <form method="POST" action="<?php echo base_url() ?>lecturer/upload" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="exampleInputEmail1">IMPORT TO DATABASE</label>
                  <input type="file" name="file" class="form-control"> 
                  <input type="submit" class="btn btn-success" value="UPLOAD">
              </div>
          </form> -->
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO</th>
                  <th style="text-align: center;">COURSE ID</th>
                  <th style="text-align: center;">COURSE NAME</th>
                  <th style="text-align: center;">PRICE</th>
                  <th style="text-align: center;" width="100%">COURSE DESCRIPTION</th>
                  <th style="width: 100%; text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php 
                        $no = 1;
                        foreach($course as $lec){
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $lec->course_id;?></td>
                            <td><?php echo $lec->course_name;?></td>
                            <td><?php echo $lec->price;?></td>
                             <td><?php echo $lec->course_desc;?></td>
                            <!-- <td><?php echo $lec->KELAS;?></td>
                            <td><?php echo $lec->TAHUN;?></td>
                            <td><?php echo $lec->SEMESTER;?></td> -->
                            <td style="text-align: center;">
                                <!-- <button type="edit"  class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editlecturer"></i> EDIT</button> -->
                                <a class="btn btn-sm btn-danger"  href="<?= base_url();?>course_controller/delete/<?= $lec->course_id; ?>" onclick ="return confirm('Yakin Data Ini Akan di Hapus?');"><i class="glyphicon glyphicon-trash"></i>DELETE</a>
                            </td>
                        </tr>
                    <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    </div>

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

<body class="bg-dark">
  <div class="modal fade" id="addlecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><b>ADD COURSE DATA</b>
      <button type="button" href="<?php echo base_url(). 'course_controller/index'; ?>" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url(). 'course_controller/insert'; ?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">COURSE_ID</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="course_id" placeholder="Enter COURSE ID">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">COURSE NAME</label>
                <input class="form-control" id="exampleInputLastName" name="course_name" type="text" aria-describedby="nameHelp" placeholder="Enter COURSE NAME">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">PRICE</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="price" placeholder="Enter price">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">COURSE DESCRIPTION</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="course_desc" placeholder="Enter Course Description">
              </div>
              <!-- <div class="col-md-6">
                <label for="exampleInputLastName">TAHUN</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="tahun" placeholder="Enter TAHUN">
              </div> -->
            </div>
            <div class="form-row">
              <!-- <div class="col-md-6">
                <label for="exampleInputName">SEMESTER</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="semester" placeholder="Enter Distribution">
              </div> -->
              <!-- <div class="col-md-6">
                <label for="exampleInputLastName">Distribution Even</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="distribution_even" placeholder="Enter Distribution Even">
              </div> -->
            </div>
          </div>
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input class="form-control" id="exampleInputEmail1" type="number" name="phone_number" aria-describedby="emailHelp" placeholder="Enter Phone Number">
          </div> -->
          <div class="form-group">
            <div class="form-row">
              <!-- <div class="col-md-6">
                <label for="exampleInputPassword1">Subject</label>
                <input class="form-control" id="exampleInputPassword1" name="subject" type="text" placeholder="Enter Password">
              </div> -->
              <!-- <div class="col-md-6">
                <label for="exampleConfirmPassword">Status</label>
                <input class="form-control" id="exampleConfirmPassword" name="status" type="text" placeholder="Enter Lecturer Status">
              </div> -->
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

<body class="bg-dark">
  <div class="modal fade" id="editlecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><b>EDIT COURSE DATA</b>
      <button type="button" href="<?php echo base_url(). 'course_controller/index'; ?>" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url(). 'course_controller/insert'; ?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">COURSE ID</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?= $lec->course_id;?>" name="course_id" placeholder="Enter Lecturer Code">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">COURSE NAME</label>
                <input class="form-control" id="exampleInputLastName" name="course_name" type="text" aria-describedby="nameHelp" value="<?= $lec->course_name;?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">PRICE</label>
                <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp" value="<?= $lec->price;?>" name="price" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">NIDN</label>
                <<!-- input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nidn" value="<?= $lec->NIDN;?>" placeholder="Enter NIDN"> -->
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Distribution</label>
                <!-- <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="distribution" placeholder="Enter Distribution" value="<?= $lec->DISTRIBUTION;?>"> -->
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Distribution Even</label>
                <!-- <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="distribution_even" placeholder="Enter Distribution Even" value="<?= $lec->DISTRIBUTION_EVEN;?>"> -->
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <!-- <input class="form-control" id="exampleInputEmail1" type="number" name="phone_number" aria-describedby="emailHelp" placeholder="Enter Phone Number" value="<?= $lec->PHONE_NUMBER;?>"> -->
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Subject</label>
                <!-- <input class="form-control" id="exampleInputPassword1" name="subject" type="text" value="<?= $lec->SUBJECT;?>"> -->
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Status</label>
                <!-- <input class="form-control" id="exampleConfirmPassword" name="status" type="text" placeholder="Enter Lecturer Status" value="<?= $lec->STATUS;?>"> -->
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit" type="submit">Edit</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js"></script>