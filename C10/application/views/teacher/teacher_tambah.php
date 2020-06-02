

 <div class="content-wrapper">
    <div class="container-fluid">
<div class="container">
<div class="row mt-4">
    <div class="col-md-6">
      
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-6">
      
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header"> 
          Form Tambah Data Mahasiswa
      </div>
      <div class="card-body">
        <!-- untuk menampilkan pesan error -->
      <?php if (validation_errors()):?>
      <div class="alert alert-danger" role = "alert">
        <?= validation_errors(); ?>
      </div>
        <?php endif ?>
        <form action="<?php echo base_url().'teacher_controller/tambah'; ?>" method="post">
          <div class="form-group">
            <label for="nama">Teacher ID</label>
            <input type="text" class="form-control" id="nama" name="teacher_id" >
          </div>
          <div class="form-group">
            <label for="nim">TEACHER NAME</label>
            <input type="text" class="form-control" id="nim" name="teacher_name">
          </div>
          <div class="form-group">
            <label for="email">SUBJECT</label>
            <input type="text" class="form-control" id="email" name="subject">
          </div>
          <div class="form-group">
            <label for="email">COURSE ID</label>
            <input type="text" class="form-control" id="email" name="course_id">
          </div>
          <!-- <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan" >
              <?php foreach ($jurusan as $key ): ?>
                <option value="<?= $key ?>" selected><?= $key ?>
                </option> 
              <?php endforeach; ?>
            </select>
          </div> -->
          <button  type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>