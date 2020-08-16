<div class="login-box" style="margin-top: 100px;">
	<div class="login-logo">
		<a href="#"><?php if (!empty($site_name)) {
						echo $site_name;
					} ?> </a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Silahkan masuk untuk melanjutkan</p>

			<form method="post" id="form-login">
				<div class="input-group mb-3">
					<input type="email" class="form-control" placeholder="Email" name="username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mb-2">
						<div id="gchap" class="d-flex" style="justify-content: center; align-items: center;"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Masuk</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<div class="social-auth-links text-center">
				<p>-- Belum Punya Akun ? --</p>
				<a href="#" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
					<i class="fas fa-user-edit mr-2"></i> Mendaftar sekarang
				</a>
				<!-- <a href="#" class="" data-toggle="modal" data-target="#modal-alur">Alur Pendaftaran</a>
            | -->
				<a href="#" class="" data-toggle="modal" data-target="#modal-lupa">Lupa Password</a>
			</div>
			<!-- /.social-auth-links -->
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->


<!-- MODAL ADD PESERTA -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Pendaftaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php if ($tutup_daftar == 'tidak') : ?>
				<?php echo form_open($url . '/tambah', 'id="form-tambah"'); ?>
				<div class="modal-body">
					<div class="container-fluid">

						<div id="form-pesan-tambah"></div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="tambah-email" name="tambah-email" placeholder="Email Peserta" autocomplete="off">
						</div>

						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label>Password</label>
								<input type="password" class="form-control" id="tambah-password" name="tambah-password" placeholder="Password" autocomplete="off">
							</div>

							<div class="form-group col-12 col-md-6">
								<label>Konfirmasi Password</label>
								<input type="password" class="form-control" id="tambah-re-password" name="tambah-re-password" placeholder="ketik Ulang Password" autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control" id="tambah-nama" name="tambah-nama" placeholder="Nama Lengkap Peserta" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Asal Sekolah</label>
							<input type="text" class="form-control" id="tambah-detail" name="tambah-detail" placeholder="Asal Sekolah" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Kelas</label>
							<select name="tambah-kelas" id="tambah-kelas" class="form-control input-sm">
								<option value="">-- Pilih Kelas (TA. 2019/2020) --</option>
								<?php for ($i = 1; $i < 10; $i++) : ?>
									<option value="<?= $i ?>" 0>Kelas <?= $i ?></option>
								<?php endfor ?>
							</select>
						</div>

						<div class="form-group">
							<label>Nomer Telepon (WhatsApp)</label>
							<input type="text" class="form-control" id="tambah-telepon" name="tambah-telepon" placeholder="Masukkan Nomer Telepon" autocomplete="off">
						</div>

						<div class="row">
							<div class="form-group col-sm-6">
								<label>Pilihan Lomba</label>
								<select name="tambah-lomba" id="tambah-lomba" class="form-control input-sm">
									<option value="">-- Pilih Lomba --</option>
									<option value="matematika">Matematika</option>
									<option value="sains">Sains</option>
									<option value="all">Matematika & Sains</option>
								</select>
							</div>

							<div class="form-group col-sm-6">
								<label>Level</label>
								<select name="tambah-group" id="tambah-group" class="form-control input-sm">
									<option value="">-- Pilih Level --</option>
									<?php if (!empty($select_group)) {
										echo $select_group;
									} ?>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-12">
								<div class="custom-control custom-checkbox" style="display: flex;">
									<input type="checkbox" class="custom-control-input" style="margin-right: 10px;" id="customCheck1" value="ya">
									<label class="custom-control-label" for="customCheck1" style="text-align: justify;">Saya akan menyediakan sendiri semua fasilitas untuk mengikuti lomba (laptop/komputer, internet dan perangkat lainnya).</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="custom-control custom-checkbox" style="display: flex;">
									<input type="checkbox" class="custom-control-input" style="margin-right: 10px;" id="customCheck2" value="ya">
									<label class="custom-control-label" for="customCheck2" style="text-align: justify;">Saya akan jujur selama proses pendaftaran dan selama lomba berlangsung.</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12" style="margin-bottom: 10px; display: flex; justify-content: flex-start;">
								<div id="gchap2"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer d-flex" style="justify-content: space-between;">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary btn-sm">Mendaftar</button>
				</div>

				<?php echo form_close(); ?>
			<?php endif ?>
		</div>
	</div>
</div>


<!-- MODAL LUPA PASSWORD -->
<div style="max-height: 100%;overflow-y:auto;" class="modal fade" id="modal-lupa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<?php echo form_open($url . '/request_lupa', 'id="form-lupa"'); ?>
	<div class="modal-dialog-centered modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 id="trx-judul text-center text-bold" style="font-weight: bold; text-align: center">Lupa password</h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="box-body">
						<div id="form-pesan-lupa"></div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="lupa-email" placeholder="Email Peserta" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer d-flex" style="justify-content: space-between;">
				<a href="#" class="btn btn-default btn-sm" data-dismiss="modal">Batal</a>
				<button type="submit" id="lupa-simpan" class="btn btn-primary btn-sm">Kirim</button>
			</div>
		</div>
	</div>

	</form>
</div>


<script type="text/javascript">
	let gchap, gchap2;
	var onloadCallback = function() {
		gchap =
			grecaptcha.render('gchap', {
				'sitekey': '6LfwH6YZAAAAAKJDW9B51NeACPfGXewFNtyFmlSR',
			});
		gchap2 =
			grecaptcha.render('gchap2', {
				'sitekey': '6LfwH6YZAAAAAKJDW9B51NeACPfGXewFNtyFmlSR',
			});
	};

	function showpassword() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	$(function() {
		$('#username').focus();

		$('#show-password').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});

		$('#show-password').on('ifChanged', function(event) {
			showpassword();
		});

		$('#form-login').submit(function() {
			if (grecaptcha.getResponse(gchap) == '' || grecaptcha.getResponse(gchap) == null) {
				SW.toast({
					title: 'Captcha harus diisi.',
					icon: 'warning'
				})
				return false;
			}
			SW.loading()
			$.ajax({
				url: "<?php echo site_url(); ?>/welcome/login",
				type: "POST",
				data: $('#form-login').serialize(),
				cache: false,
				success: function(respon) {
					var obj = $.parseJSON(respon);
					if (obj.status == 1) {
						window.open("<?php echo site_url(); ?>/tes_dashboard", "_self");
					} else {
						SW.toast({
							title: obj.error,
							icon: 'error'
						})
						$('#username').focus();
					}
				}
			});

			return false;
		});
	});

	$('#btnModalTambah').on('click', function() {
		$('#modal-tambah').modal('show')
	})

	$('#form-tambah').submit(function() {
		if (grecaptcha.getResponse(gchap2) == '' || grecaptcha.getResponse(gchap2) == null) {
			SW.toast({
				title: 'Captcha harus diisi.',
				icon: 'warning'
			})
			return false;
		}
		SW.loading()

		let check1 = $('#customCheck1').is(':checked')
		let check2 = $('#customCheck2').is(':checked')

		if (check1 && check2) {
			$.ajax({
				url: "<?php echo site_url() . '/' . $url; ?>/tambah",
				type: "POST",
				data: $('#form-tambah').serialize(),
				cache: false,
				success: function(respon) {
					var obj = $.parseJSON(respon);
					if (obj.status == 1) {
						$("#modal-tambah").modal('hide');
						SW.toast({
							title: obj.pesan,
							icon: 'success'
						})
					} else {
						SW.toast({
							title: obj.pesan,
							icon: 'error'
						})
					}
				}
			});
		} else {
			SW.show({
				title: 'Uppss !',
				text: 'Anda belum mencentang semua persyaratan dan persetujuan.',
				icon: 'error'
			})
		}
		return false;
	});

	$('#form-lupa').submit(function() {
		SW.loading()
		$.ajax({
			url: "<?php echo site_url() . '/' . $url; ?>/request_lupa",
			type: "POST",
			data: $('#form-lupa').serialize(),
			cache: false,
			success: function(respon) {
				var obj = $.parseJSON(respon);
				if (obj.status == 1) {
					$("#modal-lupa").modal('hide');
					SW.toast({
						title: obj.error,
						icon: 'success'
					})
				} else {
					SW.toast({
						title: obj.error,
						icon: 'error'
					})
				}
			}
		});
		return false;
	});
</script>