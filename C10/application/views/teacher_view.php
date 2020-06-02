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
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>DATA OF TEACHER</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                  <th style="text-align: center;">NO</th>
                  <th style="text-align: center;">TEACHER ID</th>
                  <th style="text-align: center;">TEACHER NAME</th>
                  <th style="text-align: center;">SUBJECT</th>
                  
                  <th style="text-align: center;">IMAGE</th>
                  <th style="text-align: center;">COURSE ID</th>
                  <th style="margin-left:auto;margin-right:auto;display:block;margin-bottom:0% style="width: 80%; text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php 
                        $no = 1;
                        foreach($teacher as $hbs){
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $hbs->teacher_id;?></td>
                            <td><?php echo $hbs->teacher_name;?></td>
                            <td><?php echo $hbs->subject;?></td>
                            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $hbs->teacher_image ).'"/ width = "90">';?></td>
                            <td><?php echo $hbs->course_id;?></td>
                            <td>
                              <button type="edit"  class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editlecturer"></i> EDIT</button>

                              <a class="btn btn-sm btn-danger"  href="<?= base_url();?>teacher_controller/hapus/<?= $hbs->teacher_id; ?>" onclick ="return confirm('Yakin Data Ini Akan di Hapus?');"><i class="glyphicon glyphicon-trash"></i>DELETE</a>

                              <button type="submit"  class="btn btn-sm btn-primary" href= "<?php echo base_url('teacher_controller/tambah'); ?>"></i>ADD</button>
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
  <body class="bg-dark">
  <div class="modal fade" id="editlecturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><b>EDIT LECTURER DATA</b>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url(). 'teacher_controller/tambah'; ?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">TEACHER ID</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?= $hbs->teacher_id;?>" name="teacher_id" placeholder="Enter Lecturer Code">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">TEACHER NAME</label>
                <input class="form-control" id="exampleInputLastName" name="teacher_name" type="text" aria-describedby="nameHelp" value="<?= $hbs->teacher_name;?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">SUBJECT</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?= $hbs->subject;?>" name="subject" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">COURSE_ID</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="course_id" value="<?= $hbs->course_id;?>" placeholder="Enter NIDN">
              </div>
            </div>
            <div class="form-row">
              <!-- <div class="col-md-6">
                <label for="exampleInputName">Distribution</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="distribution" placeholder="Enter Distribution" value="<?= $lec->DISTRIBUTION;?>">
              </div> -->
              <!-- <div class="col-md-6">
                <label for="exampleInputLastName">Distribution Even</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="distribution_even" placeholder="Enter Distribution Even" value="<?= $lec->DISTRIBUTION_EVEN;?>">
              </div> -->
            </div>
          </div>
         <!--  <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input class="form-control" id="exampleInputEmail1" type="number" name="phone_number" aria-describedby="emailHelp" placeholder="Enter Phone Number" value="<?= $lec->PHONE_NUMBER;?>">
          </div> -->
          <div class="form-group">
            <div class="form-row">
              <!-- <div class="col-md-6">
                <label for="exampleInputPassword1">Subject</label>
                <input class="form-control" id="exampleInputPassword1" name="subject" type="text" value="<?= $lec->SUBJECT;?>">
              </div> -->
              <!-- <div class="col-md-6">
                <label for="exampleConfirmPassword">Status</label>
                <input class="form-control" id="exampleConfirmPassword" name="status" type="text" placeholder="Enter Lecturer Status" value="<?= $lec->STATUS;?>">
              </div> -->
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit" type="submit">Edit</button>
        </form>
      </div>
    </div>
  </div>