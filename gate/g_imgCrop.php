<style>
	.modal-lg {
		max-width: 1000px !important;
	}

	.image_area {
		position: relative;
	}

	img {
		display: block;
		max-width: 100%;
	}

	.preview {
		overflow: hidden;
		width: 160px;
		height: 160px;
		margin: 10px;
		border: 1px solid red;
	}
</style>

<body>
	<div class="container" align="center">
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="img-container">
							<div class="row">
								<div class="col-md-8">
									<img src="" id="sample_image" />
								</div>
								<div class="col-md-4">
									<div class="preview"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary" id="crop">Crop</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	$(document).ready(function() {

		var $modal = $('#modal');
		var image = document.getElementById('sample_image');
		var cropper;

		$('#upload_image').change(function(event) {
			var files = event.target.files;
			var done = function(url) {
				image.src = url;
				$modal.modal('show');
			};

			if (files && files.length > 0) {
				reader = new FileReader();
				reader.onload = function(event) {
					done(reader.result);
				};
				reader.readAsDataURL(files[0]);
			}
		});

		$modal.on('shown.bs.modal', function() {
			cropper = new Cropper(image, {
				aspectRatio: false,
				viewMode: 3,
				preview: '.preview'
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		$("#crop").click(function() {
			canvas = cropper.getCroppedCanvas({
				width: 400,
				height: 400,
			});

			canvas.toBlob(function(blob) {
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function() {
					var base64data = reader.result;

					$.ajax({
						url: "g_imgUpload.php",
						method: "POST",
						data: {
							image: base64data
						},
						success: function(data) {
							console.log(data);
							$modal.modal('hide');
							$('#uploaded_image').attr('src', data);
							document.getElementById("imgName").value = data;
							// alert(data);
						}
					});
				}
			});
		});
	});
</script>