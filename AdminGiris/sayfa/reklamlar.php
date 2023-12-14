<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Reklam Ayarları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item active"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=reklamlar">Reklam Ayarları</a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
</div>
<div class="content-body">
<!-- Data list view starts -->
<section id="data-list-view" class="data-list-view-header">
	<!-- DataTable starts -->
	<div class="table-responsive">
		<div class="actions action-btns"><div class="dt-buttons btn-group">
			<a href="<?php echo ADMIN_URL?>index.php?sayfa=reklam_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
			<table class="table data-list-view">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
							<th>Reklam Kısa Kod</th>
						<th>Reklam Adı</th>
						<th>Yönlendirme Linki</th>
						<th>Reklam Kodu</th>
										<th>Reklam Görsel</th>
						<th>Kayıt Tarihi</th>
					
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$slideQuery = $db->query("SELECT * FROM reklamlar LIMIT ".$tablobaslangic.",".$tablobitis." ");
					if($slideQuery->rowCount()){
						foreach($slideQuery as $slideRow){
							if(strlen($slideRow["fotograf_href"])>5){$slideButton = '<a target="_blank" href="'.$slideRow["fotograf_href"].'">'.$slideRow["fotograf_href"].'</a>';}else{$slideButton = "Link Belirtilmemiş";}
					?>
					                            <?php if ($slideRow["fa_fotograf_longDesc"]==1) { ?>



	<tr>
						<td></td>
						<td><?php echo $slideRow["fotograf_id"];?></td>
								<td>[{=r:<?php echo $slideRow["fotograf_id"];?>=}]</td>
						
						<td><?php echo $slideRow["fotograf_shortDesc"];?></td>
						<td></td>
						<td>
							
						</td>
							<td>
							
						</td>
						<td><?php echo tarih($slideRow["fotograf_tarih"]);?></td>
						
			
						<td >
							<a class="btn btn-sm btn-secondary mb-1" type="button" href="<?php echo ADMIN_URL ;?>index.php?sayfa=reklam_duzenle&id=<?php echo $slideRow["fotograf_id"];?>">
							Düzenle
							</a>
							<br>
							<button class="btn btn-danger " type="button" onclick="TekSil(<?php echo $slideRow["fotograf_id"];?>);">
							Sil
							</button>
					</td>

			
					
				</tr>


                                
<?php }else{ ?>

         	<tr>
						<td></td>
						<td><?php echo $slideRow["fotograf_id"];?></td>
						<td>[{=r:<?php echo $slideRow["fotograf_id"];?>=}]</td>
					
						<td><?php echo $slideRow["fotograf_shortDesc"];?></td>
						<td><?php echo $slideButton;?></td>
						<td>
							&lt;a href="<?php echo $slideRow["fotograf_href"] ?>" target="_blank"&gt;&lt;img src="<?php echo URL;?>images/reklam/big/<?php echo $slideRow["fotograf_src"];?>" class="img-fluid"&gt;&lt;/a&gt;
						</td>
						<td>
							<img src="<?PHP echo URL;?>images/reklam/thumb/<?php echo $slideRow["fotograf_src"];?>" style="width:50px">
							
						</td>
						<td><?php echo tarih($slideRow["fotograf_tarih"]);?></td>
							
						
						<td >
							<button class="btn btn-danger " type="button" onclick="TekSil(<?php echo $slideRow["fotograf_id"];?>);">
							Sil
							</button>
					</td>

			
					
				</tr>

<?php } ?>
				
				<?php
				}
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- DataTable ends -->
	<!-- add new sidebar ends -->
</section>
<!-- Data list view end -->
</div>
</div>
<script>
	$(document).ready(function() {
		$('.datatable').dataTable({
			"bSort":false
		});
			$("td #updateSira").click(function(){
			var id = $(this).attr("get-id");
			var inputValue = $("input[name=sira_no"+id+"]").val();
			$.post('ajax.php?p=mansetSiraGuncelle', {sira_no: inputValue,fotograf_id:id}, function (data) {
				alert(data);
			});
		});
	});
	
		function TekSil(slideId){
swal({
title: "Emin misin?",
text: "Bu Reklamı kurtaramayacaksınız!",
type: "warning",
showCancelButton: true,
confirmButtonColor: '#DD6B55',
confirmButtonText: 'Evet eminim!',
cancelButtonText: "Hayır, iptal et!",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm){
if (isConfirm){
$.post('ajax.php?p=tek_reklam_sil', {id: slideId}, function (data) {
			if(data=="basarili"){
				sweetAlert({
						title	: "Başarılı",
						text 	: "Reklam başarılı bir şekilde silindi.",
						type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else if(data=="basarisiz"){
				swal("Başarısız","Silinemedi","error");
				return false;
			}
		});
} else {
swal("İptal edildi", "Reklam güvende :)", "error");
return false;
}
});

}
var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('.js-copytextarea');
  copyTextarea.focus();
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});
</script>
		