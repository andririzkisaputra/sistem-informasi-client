<?= $this->extend('layouts/admin') ?>
<?php $this->section('styles') ?>
<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?> " rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
    <?php
        if(session()->getFlashData('success')){
        ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
        }
        ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Mahasiswa
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Nim</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Angkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $key => $mahasiswa) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $mahasiswa['nama'] ?></td>
                            <td><?= $mahasiswa['nim'] ?></td>
                            <td><?= $mahasiswa['jurusan'] ?></td>
                            <td><?= $mahasiswa['alamat'] ?></td>
                            <td><?= $mahasiswa['email'] ?></td>
                            <td><?= $mahasiswa['angkatan'] ?></td>
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-<?= $mahasiswa['id'] ?>">Edit</button>
                            <a href="<?= base_url('mahasiswa/delete/'.$mahasiswa['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add Contact Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('mahasiswa') ?>" method="post">
            <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Nim" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" id="angkatan" placeholder="Angkatan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Contact Modal -->
<div class="modal fade" id="editModal-<?= $mahasiswa['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('mahasiswa/edit/'.$mahasiswa['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama'] ?>" placeholder="Nama" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim'] ?>"  placeholder="Nim" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $mahasiswa['jurusan'] ?>"  placeholder="Jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $mahasiswa['alamat'] ?>"  placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $mahasiswa['email'] ?>"  placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" id="angkatan" value="<?= $mahasiswa['email'] ?>" placeholder="Angkatan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Validasi Contact Modal -->
<div class="modal fade" id="validasiModal-<?= $mahasiswa['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Validasi Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('validasi/'.$mahasiswa['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama'] ?>" placeholder="Nama" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $mahasiswa['nim'] ?>"  placeholder="Nim" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $mahasiswa['jurusan'] ?>"  placeholder="Jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $mahasiswa['alamat'] ?>"  placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $mahasiswa['email'] ?>"  placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="validasi" class="form-control" id="validasi" value="1"  placeholder="Email" required>
                    </div>

                    <div class="form-group">
                            <input type="hidden" name="email" class="form-control" value="<?= $mahasiswa['email'] ?>">
                    </div>

                    <div class="form-group">
                            <input type="hidden" name="username"  class="form-control" value="<?= $mahasiswa['nama'] ?>">
                    </div>

                    <div class="form-group">
                            <input type="hidden" name="password_hash" class="form-control" value="<?= $mahasiswa['nim'] ?>">
                    </div>
                    <div class="form-group">
                            <input type="hidden" name="active" class="form-control" value="1">
                    </div>

                    <div class="form-group">
                            <input type="hidden" name="role" class="form-control" autocomplete="off" value="2">
                    </div>
                </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Validasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?php $this->section('scripts')?>
<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>
<?php $this->endSection()?>