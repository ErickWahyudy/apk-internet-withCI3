<?php $this->load->view('template/header'); ?>

<form action="" method="POST">
    <table class="table table-striped">
        <tr>
            <th>Nama</th>
            <td><input type="text" name="nama" class="form-control" value="<?= $nama ?>" required=""></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><input type="text" name="username" class="form-control" value="<?= $username ?>" required=""></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="password" class="form-control" value="" required=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="../" class="btn btn-warning">Kembali</a>&nbsp;&nbsp;&nbsp;
				<input type="submit" name="kirim" value="Entri Data" class="btn btn-primary">
			</td>
        </tr>
    </table>
</form>

<?php $this->load->view('template/footer'); ?>