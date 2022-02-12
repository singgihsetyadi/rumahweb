<main>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(); ?>">Rumahweb</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">User</a>
            </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-3">
    <div class="card">
      <h5 class="card-header">User List</h5>
      <div class="card-body">
        <a href="<?= base_url('dashboard/add'); ?>" class="btn btn-primary btn-sm">Tambah Data</a>
        <h5 class="card-title"></h5>
        <table class="table table-responsive table-striped" id="tabel">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="tablecontent">
          </tbody>
        </table>
        <!-- <div class="content"></div> -->
      </div>
    </div>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $.ajax({
    url: "https://reqres.in/api/users?page=2",
    method: "GET",
    timeout: 0,
    async: true,
    dataType: "json",
    success: function(response) {
      console.log(response);
      if (response == '') {
        const isicontent = "<tr><td colspan=4>Tidak ada data!</td></tr>";
        $("#tabel .tablecontent").append(isicontent);
      } else {
        for (let i = 0, x = 1; i, x < response.data.length; i++, x++) {
          const isicontent = "<tr><td>" + x + "</td><td>" + response.data[i].first_name + " " + response.data[i].last_name + "</td><td>" + response.data[i].email + "</td><td><a href='<?= base_url('dashboard/edit/'); ?>" + response.data[i].id + "' class='badge bg-success'>edit</a> | <a href='javascript:void(0)' onclick='del(" + response.data[i].id + ")' class='badge bg-danger'>hapus</a></td></tr>";
          $("#tabel .tablecontent").append(isicontent);
        }
      }
    }
  });

  function del(id) {
    if (confirm('Anda yakin akan menghapus data ini?')) {
      // ajax delete data to database
      $.ajax({
        url: "https://reqres.in/api/users?delay=3",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
          //if success reload ajax table
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error deleting data');
        }
      });
    }
  }
</script>