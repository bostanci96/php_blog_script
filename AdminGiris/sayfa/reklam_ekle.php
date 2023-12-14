<?php echo !defined('ADMIN') ? die( go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Reklam Ekle</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=reklamlar">Tüm Reklamlar</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Reklam Ekle</a>
                </li>
            </ol>
        </div>
    </div>
</div>
</div>
</div>
<div class="content-body">
<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=reklam_ekle"  enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                  <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Reklam Başlık</span>
                                            </div>
                                            <div class="col-md-10">
                                                <fieldset class="position-relative has-icon-left">
                                                    <input type="text" id="first-name" class="form-control" name="fotograf_shortDesc" placeholder="">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-type"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="input-text" class="col-sm-2 control-label">Reklam Seçenekleri</label>
                                        <div class="col-sm-9">
                                            <select name="reklamtype" class="form-control">
                                                <option selected disabled>---Seçeneği Seçiniz---</option>
                                                <option value="0">Resim Olarak Yükle</option>
                                                <option value="1">Kod Olarak Yükle</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12" id="reklamaType1" style="display: none;">
                                  
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Reklam Yönlenecek Link</span>
                                            </div>
                                            <div class="col-md-10">
                                                <fieldset class="position-relative has-icon-left">
                                                    <input type="text" id="first-name" class="form-control" name="fotograf_href" placeholder="">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-type"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Reklam Resmi</span>
                                            </div>
                                            <div class="col-md-10">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="dosya[]" id="dosya[]">
                                                        <label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" id="reklamaType2" style="display: none;">
                                 
                                    <div class="col-12" >
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Reklam Kodu</span>
                                            </div>
                                            <div class="col-md-10">
                                                <fieldset class="position-relative has-icon-left">
                                                    <textarea type="text" id="first-name" class="form-control" name="fotograf_longDesc" placeholder=""></textarea>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-type"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group col-md-8 offset-md-4">
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Reklamı Ekle</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
<script>
$(document).ready(function(event) {
$('#forms').ajaxForm({
uploadProgress: function(event, position, total, percentComplete) {
swal({
title: "Yükleniyor",
text : "Yükleniyor. Lütfen Bekleyiniz",
type : "info",
closeOnConfirm : false,
showLoaderOnConfirm:true,
});
},
success: function(data) {
if(data=="bos-deger"){
sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
return false;
}else if(data=="basarili"){
Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarılı')
sweetAlert({
title   : "Başarılı",
text    : "Relam Başarılı Bir Şekilde Eklendi",
type    : "success"
},
function(){
window.location.reload(true);
});
return false;
}else{
Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarısız')
sweetAlert(data,"Bir hata oluştu !","error");
return false;
}
}
});
});
$("select[name=reklamtype]").change(function(){
var menuVal = $("select[name=reklamtype]").val();
if(menuVal==0){
$("#reklamaType1").show(500);
$("#reklamaType2").hide(500);
}else if(menuVal==1){
$("#reklamaType1").hide(500);
$("#reklamaType2").show(500);
}else{
$("#reklamaType1").hide(500);
$("#reklamaType2").hide(500);
}
});
</script>