<?php
## Logolar 
if($_GET["p"]=="logolar"){
	
	$logo 	= $_FILES["logo"]["tmp_name"][0];
	$favicon 	= $_FILES["favicon"]["tmp_name"][0];
	$footerLogo 	= $_FILES["footer_logo"]["tmp_name"][0];
	if(empty($logo) && empty($footerLogo) && empty($favicon)){
		echo "bos-deger";
	}else{
		require_once("app-upload/app.upload.php");
		if(strlen($logo)>3){
			require_once("app-upload/logo_edit.php");
		}
		if(strlen($footerLogo)>3){
			require_once("app-upload/footer_logo_edit.php");
		}
		if(strlen($favicon)>3){
			require_once("app-upload/favicon.php");
		}
		if($updateSuccess || $updateSuccess2 || $updateSuccess3){
			echo "basarili";
		}else{
			echo "basarisiz";
		}
	}
}
if($_GET["p"]=="seo_ayarlari"){
	$ayar_id 		= p("ayar_id");
	$site_title 	= p("site_title");
	$site_desc 		= p("site_desc");
	$site_keyw 		= p("site_keyw");

	$en_site_title 	= p("en_site_title");
	$en_site_desc 		= p("en_site_desc");
	$en_site_keyw 		= p("en_site_keyw");

	$ar_site_title 	= p("ar_site_title");
	$ar_site_desc 		= p("ar_site_desc");
	$ar_site_keyw 		= p("ar_site_keyw");

	$fa_site_title 	= p("fa_site_title");
	$fa_site_desc 		= p("fa_site_desc");
	$fa_site_keyw 		= p("fa_site_keyw");

	$main_tablo 	= p("main_tablo");
	if(!$ayar_id  || !$site_title || !$site_desc || !$site_keyw){
		echo 'bos-deger';
	}else{

		$updateSeo = $db->query("UPDATE ayarlar SET 
			site_title	= '$site_title',
			site_desc 	= '$site_desc',
			en_site_title	= '$en_site_title',
			en_site_desc 	= '$en_site_desc',
			en_site_keyw 	= '$en_site_keyw',
			ar_site_title	= '$ar_site_title',
			ar_site_desc 	= '$ar_site_desc',
			ar_site_keyw 	= '$ar_site_keyw',
			fa_site_title	= '$fa_site_title',
			fa_site_desc 	= '$fa_site_desc',
			fa_site_keyw 	= '$fa_site_keyw',
			main_tablo  = '$main_tablo',
			site_keyw 	= '$site_keyw' WHERE ayar_id='$ayar_id'");

		if($updateSeo->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}
if($_GET["p"]=="anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="en_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar_en SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="ar_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");

	$update = $db->query("UPDATE bloklar_ar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="fa_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$update = $db->query("UPDATE bloklar_fa SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}



if($_GET["p"]=="detaytagayarlari"){
	$baslik1 		= htmlspecialchars(p("baslik1"));
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE csskod SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="reklamalanlari"){
	$baslik1 		= htmlspecialchars(ptirnak("baslik1"));
	$desc1 			= htmlspecialchars(ptirnak("desc1"));
	$baslik2 		= htmlspecialchars(ptirnak("baslik2"));
	$desc2 			= htmlspecialchars(ptirnak("desc2"));
	$baslik3 		= htmlspecialchars(ptirnak("baslik3"));
	$desc3 			= htmlspecialchars(ptirnak("desc3"));
	$baslik4 		= htmlspecialchars(ptirnak("baslik4"));
	$desc4 			= htmlspecialchars(ptirnak("desc4"));
	$baslik5 		= htmlspecialchars(ptirnak("baslik5"));
	$desc5 			= htmlspecialchars(ptirnak("desc5"));
	$baslik6 		= htmlspecialchars(ptirnak("baslik6"));
	$desc6 			= htmlspecialchars(ptirnak("desc6"));
	$baslik7 		= htmlspecialchars(ptirnak("baslik7"));
	$desc7 			= htmlspecialchars(ptirnak("desc7"));
	$baslik8 		= htmlspecialchars(ptirnak("baslik8"));
	$desc8 			= htmlspecialchars(ptirnak("desc8"));
	$baslik9 		= htmlspecialchars(ptirnak("baslik9"));
	$desc9 			= htmlspecialchars(ptirnak("desc9"));
	$baslik10 		= htmlspecialchars(ptirnak("baslik10"));
	$desc10 			= htmlspecialchars(ptirnak("desc10"));
	$baslik11 		= htmlspecialchars(ptirnak("baslik11"));
	$desc11 			= htmlspecialchars(ptirnak("desc11"));
	$baslik12 		= htmlspecialchars(ptirnak("baslik12"));
	$desc12 			= htmlspecialchars(ptirnak("desc12"));
	$baslik13 		= htmlspecialchars(ptirnak("baslik13"));
	$desc13 			= htmlspecialchars(ptirnak("desc13"));
	$baslik14 		= htmlspecialchars(ptirnak("baslik14"));
	$desc14 			= htmlspecialchars(ptirnak("desc14"));
	$baslik15 		= htmlspecialchars(ptirnak("baslik15"));
	$desc15 			= htmlspecialchars(ptirnak("desc15"));
	$baslik16 		= htmlspecialchars(ptirnak("baslik16"));
	$desc16 			= htmlspecialchars(ptirnak("desc16"));
	$baslik17 		= htmlspecialchars(ptirnak("baslik17"));
	$desc17 			= htmlspecialchars(ptirnak("desc17"));
	$baslik18 		= htmlspecialchars(ptirnak("baslik18"));
	$desc18 			= htmlspecialchars(ptirnak("desc18"));
	$baslik19 		= htmlspecialchars(ptirnak("baslik19"));
	$desc19 			= htmlspecialchars(ptirnak("desc19"));
	$baslik20 		= htmlspecialchars(ptirnak("baslik20"));
	$desc20 			= htmlspecialchars(ptirnak("desc20"));
	$baslik21 		= htmlspecialchars(ptirnak("baslik21"));
	$desc21 			= htmlspecialchars(ptirnak("desc21"));
	$baslik22 		= htmlspecialchars(ptirnak("baslik22"));
	$desc22			= htmlspecialchars(ptirnak("desc22"));
	$baslik23 		= htmlspecialchars(ptirnak("baslik23"));
	$desc23 			= htmlspecialchars(ptirnak("desc23"));
	$baslik24 		= htmlspecialchars(ptirnak("baslik24"));
	$desc24 			= htmlspecialchars(ptirnak("desc24"));
	$baslik25 		= htmlspecialchars(ptirnak("baslik25"));
	$desc25 			= htmlspecialchars(ptirnak("desc25"));
	$baslik26		= htmlspecialchars(ptirnak("baslik26"));
	$desc26 			= htmlspecialchars(ptirnak("desc26"));
	$baslik27 		= htmlspecialchars(ptirnak("baslik27"));
	$desc27 			= htmlspecialchars(ptirnak("desc27"));
	$baslik28 		= htmlspecialchars(ptirnak("baslik28"));
	$desc28 			= htmlspecialchars(ptirnak("desc28"));
	$baslik29 		= htmlspecialchars(ptirnak("baslik29"));
	$desc29 			= htmlspecialchars(ptirnak("desc29"));
	$baslik30 		= htmlspecialchars(ptirnak("baslik30"));
	$desc30 			= htmlspecialchars(ptirnak("desc30"));
	$baslik31 		= htmlspecialchars(ptirnak("baslik31"));
	$desc31 			= htmlspecialchars(ptirnak("desc31"));
	$baslik32 		= htmlspecialchars(ptirnak("baslik32"));
	$desc32 			= htmlspecialchars(ptirnak("desc32"));
	$baslik33 		= htmlspecialchars(ptirnak("baslik33"));
	$desc33 			= htmlspecialchars(ptirnak("desc33"));
	$baslik34 		= htmlspecialchars(ptirnak("baslik34"));
	$desc34 			= htmlspecialchars(ptirnak("desc34"));
	$baslik35 		= htmlspecialchars(ptirnak("baslik35"));
	$desc35 			= htmlspecialchars(ptirnak("desc35"));
	$baslik36 		= htmlspecialchars(ptirnak("baslik36"));
	$desc36 			= htmlspecialchars(ptirnak("desc36"));
	$baslik37 		= htmlspecialchars(ptirnak("baslik37"));
	$desc37 			= htmlspecialchars(ptirnak("desc37"));
	$baslik38 		= htmlspecialchars(ptirnak("baslik38"));
	$desc38 			= htmlspecialchars(ptirnak("desc38"));
	$baslik39 		= htmlspecialchars(ptirnak("baslik39"));
	$desc39 			= htmlspecialchars(ptirnak("desc39"));
	$baslik40 		= htmlspecialchars(ptirnak("baslik40"));
	$desc40 			= htmlspecialchars(ptirnak("desc40"));
	$baslik41 		= htmlspecialchars(ptirnak("baslik41"));
	$desc41 			= htmlspecialchars(ptirnak("desc41"));
	$baslik42 		= htmlspecialchars(ptirnak("baslik42"));
	$desc42 			= htmlspecialchars(ptirnak("desc42"));
	$baslik43 		= htmlspecialchars(ptirnak("baslik43"));
	$desc43 			= htmlspecialchars(ptirnak("desc43"));
	$baslik44 		= htmlspecialchars(ptirnak("baslik44"));
	$desc44 			= htmlspecialchars(ptirnak("desc44"));
	$baslik45 		= htmlspecialchars(ptirnak("baslik45"));
	$desc45 			= htmlspecialchars(ptirnak("desc45"));
	$baslik46 		= htmlspecialchars(ptirnak("baslik46"));
	$desc46 			= htmlspecialchars(ptirnak("desc46"));
	$baslik47 		= htmlspecialchars(ptirnak("baslik47"));
	$desc47 			= htmlspecialchars(ptirnak("desc47"));
	$update = $db->query("UPDATE reklamalanlari SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}


if($_GET["p"]=="anasayfasablon_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE siterenk SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="dil_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil_bloklar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="dil_en_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil_bloklar_en SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'

		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="dil_ar_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil_bloklar_ar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="dil_fa_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil_bloklar_fa SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="iletisim_smtp"){
	$ayar_id 		= p("ayar_id");
	$gemail 			= p("gemail");
	$gsmtp 		= p("gsmtp");
	$gport 			= p("gport");
	$gmailkullanici 		= p("gmailkullanici");
	$gmailkullanicisifre	= p("gmailkullanicisifre");
	if(!$ayar_id || !$gemail || !$gsmtp || !$gport || !$gmailkullanici || !$gmailkullanicisifre){
		echo 'bos-deger';
	}else{
		$updateContact = $db->query("UPDATE ayarlar SET 
			gemail 		= '$gemail',
			gsmtp 	= '$gsmtp',
			gport 		= '$gport',
			gmailkullanici 	= '$gmailkullanici',
			gmailkullanicisifre 		= '$gmailkullanicisifre' WHERE ayar_id='$ayar_id'");
		if($updateContact->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}

}
if($_GET["p"]=="iletisim_bilgileri"){
	$ayar_id 		= ptirnak("ayar_id");
	$email 			= ptirnak("email");
	$telefon 		= ptirnak("telefon");
	$email2 			= ptirnak("email2");
	$telefon2 		= ptirnak("telefon2");
	$email3 			= ptirnak("email3");
	$telefon3 		= ptirnak("telefon3");
	$gsm 			= ptirnak("gsm");
	$faks 			= ptirnak("faks");
	$adres 			= ptirnak("adres");
	$tablobaslangic 			= ptirnak("tablobaslangic");
	$tablobitis 			= ptirnak("tablobitis");
	$adres2 			= ptirnak("adres2");
	$adres3 			= ptirnak("adres3");
	$google_maps 	= ptirnak("google_maps");
	$cdestek 	= htmlspecialchars(ptirnak("cdestek"));
	$ganaltyc 	= htmlspecialchars(ptirnak("ganaltyc"));
	$gconsol 	= htmlspecialchars(ptirnak("gconsol"));
	$footercop 	= p("footercop");
	if(!$ayar_id || !$email || !$telefon || !$gsm || !$faks || !$adres){
		echo 'bos-deger';
	}else{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'gecersiz-eposta';
		}else{
			$updateContact = $db->query("UPDATE ayarlar SET 
				email 		= '$email',
				telefon 	= '$telefon',
				email2 		= '$email2',
				telefon2 	= '$telefon2',
				email3 		= '$email3',
				telefon3 	= '$telefon3',
				gsm 		= '$gsm',
				cdestek 		= '$cdestek',
				ganaltyc 		= '$ganaltyc',
				gconsol 		= '$gconsol',
				footercop 		= '$footercop',
				google_maps = '$google_maps',
				faks 		= '$faks',
				adres 		= '$adres',
				tablobaslangic 		= '$tablobaslangic',
				tablobitis 		= '$tablobitis',
				adres2 		= '$adres2',
				adres3 		= '$adres3' WHERE ayar_id='$ayar_id'");
			if($updateContact->rowCount()){
				echo 'basarili';
			}else{
				echo 'degisiklik-yok';
			}
		}
	}
}
if($_GET["p"]=="sosyal_medya"){
	$ayar_id 		= p("ayar_id");
	$facebook_url 	= p("facebook_url");
	$twitter_url 	= p("twitter_url");
	$instagram_url 	= p("instagram_url");
	$google_url 	= p("google_url");
	$linkedin_url 	= p("linkedin_url");
	if(!$ayar_id || !$facebook_url || !$twitter_url || !$instagram_url || !$google_url || !$linkedin_url){
		echo 'bos-deger';
	}else{
		$updateSocial = $db->query("UPDATE ayarlar SET 
			facebook_url 	= '$facebook_url',
			twitter_url 	= '$twitter_url',
			instagram_url 	= '$instagram_url',
			google_url 		= '$google_url',
			linkedin_url 	= '$linkedin_url'
			WHERE ayar_id='$ayar_id'");
		if($updateSocial->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}


if($_GET["p"]=="bakimModu"){ 

	$bakim_mod      = p("mod");
	$bakim_yazi         = p("yazi");
	$bakim_tarih        = p("bitisdate");
	$bakim_saat         = p("bitistime");
	$bakim_cep      = p("ceptel");
	$bakim_harita       = p("harita");

	$bakim_id=1;


	if(!$bakim_id ){
		echo 'bos-deger';exit();
	}else{

		$bakim = $db->query("UPDATE bakim SET
			bakim_mod       = '$bakim_mod',
			bakim_yazi  = '$bakim_yazi',
			bakim_tarih     = '$bakim_tarih',
			bakim_saat      = '$bakim_saat',
			bakim_cep   = '$bakim_cep',
			bakim_harita    = '$bakim_harita'
			WHERE bakim_id='$bakim_id'");
		if($bakim->rowCount()){
			echo 'basarili';exit();
		}else{
			echo 'basarisiz';exit();
		}


	}

}

if($_GET["p"]=="karanlikmod"){
	$id = 1;
	$kontrol = $db->query("SELECT * FROM ayarlar WHERE ayar_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["site_tema"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE ayarlar SET site_tema=0 WHERE ayar_id='$id'");
			if($update->rowCount()){
				echo 'acik';exit();
			}
		}else{
			$update = $db->query("UPDATE ayarlar SET site_tema=1 WHERE ayar_id='$id'");
			if($update->rowCount()){
				echo 'karanlik';exit();
			}
		}
	}

}








if($_GET["p"]=="dil2_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil2_bloklar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="dil2_en_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil2_bloklar_en SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'

		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}
if($_GET["p"]=="dil2_ar_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil2_bloklar_ar SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="dil2_fa_anasayfa_ayarlari"){
	$baslik1 		= p("baslik1");
	$desc1 			= p("desc1");
	$baslik2 		= p("baslik2");
	$desc2 			= p("desc2");
	$baslik3 		= p("baslik3");
	$desc3 			= p("desc3");
	$baslik4 		= p("baslik4");
	$desc4 			= p("desc4");
	$baslik5 		= p("baslik5");
	$desc5 			= p("desc5");
	$baslik6 		= p("baslik6");
	$desc6 			= p("desc6");
	$baslik7 		= p("baslik7");
	$desc7 			= p("desc7");
	$baslik8 		= p("baslik8");
	$desc8 			= p("desc8");
	$baslik9 		= p("baslik9");
	$desc9 			= p("desc9");
	$baslik10 		= p("baslik10");
	$desc10 			= p("desc10");
	$baslik11 		= p("baslik11");
	$desc11 			= p("desc11");
	$baslik12 		= p("baslik12");
	$desc12 			= p("desc12");
	$baslik13 		= p("baslik13");
	$desc13 			= p("desc13");
	$baslik14 		= p("baslik14");
	$desc14 			= p("desc14");
	$baslik15 		= p("baslik15");
	$desc15 			= p("desc15");
	$baslik16 		= p("baslik16");
	$desc16 			= p("desc16");
	$baslik17 		= p("baslik17");
	$desc17 			= p("desc17");
	$baslik18 		= p("baslik18");
	$desc18 			= p("desc18");
	$baslik19 		= p("baslik19");
	$desc19 			= p("desc19");
	$baslik20 		= p("baslik20");
	$desc20 			= p("desc20");
	$baslik21 		= p("baslik21");
	$desc21 			= p("desc21");
	$baslik22 		= p("baslik22");
	$desc22			= p("desc22");
	$baslik23 		= p("baslik23");
	$desc23 			= p("desc23");
	$baslik24 		= p("baslik24");
	$desc24 			= p("desc24");
	$baslik25 		= p("baslik25");
	$desc25 			= p("desc25");
	$baslik26		= p("baslik26");
	$desc26 			= p("desc26");
	$baslik27 		= p("baslik27");
	$desc27 			= p("desc27");
	$baslik28 		= p("baslik28");
	$desc28 			= p("desc28");
	$baslik29 		= p("baslik29");
	$desc29 			= p("desc29");
	$baslik30 		= p("baslik30");
	$desc30 			= p("desc30");
	$baslik31 		= p("baslik31");
	$desc31 			= p("desc31");
	$baslik32 		= p("baslik32");
	$desc32 			= p("desc32");
	$baslik33 		= p("baslik33");
	$desc33 			= p("desc33");
	$baslik34 		= p("baslik34");
	$desc34 			= p("desc34");
	$baslik35 		= p("baslik35");
	$desc35 			= p("desc35");
	$baslik36 		= p("baslik36");
	$desc36 			= p("desc36");
	$baslik37 		= p("baslik37");
	$desc37 			= p("desc37");
	$baslik38 		= p("baslik38");
	$desc38 			= p("desc38");
	$baslik39 		= p("baslik39");
	$desc39 			= p("desc39");
	$baslik40 		= p("baslik40");
	$desc40 			= p("desc40");
	$baslik41 		= p("baslik41");
	$desc41 			= p("desc41");
	$baslik42 		= p("baslik42");
	$desc42 			= p("desc42");
	$baslik43 		= p("baslik43");
	$desc43 			= p("desc43");
	$baslik44 		= p("baslik44");
	$desc44 			= p("desc44");
	$baslik45 		= p("baslik45");
	$desc45 			= p("desc45");
	$baslik46 		= p("baslik46");
	$desc46 			= p("desc46");
	$baslik47 		= p("baslik47");
	$desc47 			= p("desc47");
	$update = $db->query("UPDATE dil2_bloklar_fa SET
		baslik1 		= '$baslik1',
		desc1 		= '$desc1',
		baslik2 		= '$baslik2',
		desc2 		= '$desc2',
		baslik3 		= '$baslik3',
		desc3 		= '$desc3',
		baslik4 		= '$baslik4',
		desc4 		= '$desc4',
		baslik5 		= '$baslik5',
		desc5 		= '$desc5',
		baslik6 		= '$baslik6',
		desc6 		= '$desc6',
		baslik7 		= '$baslik7',
		desc7 		= '$desc7',
		baslik8 		= '$baslik8',
		desc8 		= '$desc8',
		baslik9 		= '$baslik9',
		desc9 		= '$desc9',
		baslik10 		= '$baslik10',
		desc10 		= '$desc10',
		baslik11 		= '$baslik11',
		desc11 		= '$desc11',
		baslik12 		= '$baslik12',
		desc12 		= '$desc12',
		baslik13 		= '$baslik13',
		desc13 		= '$desc13',
		baslik14 		= '$baslik14',
		desc14 		= '$desc14',
		baslik15 		= '$baslik15',
		desc15 		= '$desc15',
		baslik16 		= '$baslik16',
		desc16 		= '$desc16',
		baslik17 		= '$baslik17',
		desc17 		= '$desc17',
		baslik18 		= '$baslik18',
		desc18 		= '$desc18',
		baslik19 		= '$baslik19',
		desc19 		= '$desc19',
		baslik20 		= '$baslik20',
		desc20 		= '$desc20',
		baslik21 		= '$baslik21',
		desc21 		= '$desc21',
		baslik22 		= '$baslik22',
		desc22 		= '$desc22',
		baslik23 		= '$baslik23',
		desc23 		= '$desc23',
		baslik24 		= '$baslik24',
		desc24 		= '$desc24',
		baslik25 		= '$baslik25',
		desc25		= '$desc25',
		baslik26 		= '$baslik26',
		desc26		= '$desc26',
		baslik27 		= '$baslik27',
		desc27		= '$desc27',
		baslik28 		= '$baslik28',
		desc28 = '$desc28',
		baslik29 = '$baslik29',
		desc29 = '$desc29',
		baslik30 = '$baslik30',
		desc30 = '$desc30',
		baslik31 = '$baslik31',
		desc31 = '$desc31',
		baslik32 = '$baslik32',
		desc32 = '$desc32',
		baslik33 = '$baslik33',
		desc33 = '$desc33',
		baslik34 = '$baslik34',
		desc34 = '$desc34',
		baslik35 = '$baslik35',
		desc35 = '$desc35',
		baslik36 = '$baslik36',
		desc36 = '$desc36',
		baslik37 = '$baslik37',
		desc37 = '$desc37',
		baslik38 = '$baslik38',
		desc38 = '$desc38',
		baslik39 = '$baslik39',
		desc39 = '$desc39',
		baslik40 = '$baslik40',
		desc40 = '$desc40',
		baslik41 = '$baslik41',
		desc41 = '$desc41',
		baslik42 = '$baslik42',
		desc42 = '$desc42',
		baslik43 = '$baslik43',
		desc43 = '$desc43',
		baslik44 = '$baslik44',
		desc44 = '$desc44',
		baslik45 = '$baslik45',
		desc45 = '$desc45',
		baslik46 = '$baslik46',
		desc46 = '$desc46',
		baslik47 = '$baslik47',
		desc47 = '$desc47'
		WHERE blok_id='1'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}



if($_GET["p"]=="log_tek_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM kullanici_logkaydi WHERE log_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$delete = $db->query("DELETE FROM kullanici_logkaydi WHERE log_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}


if($_GET["p"]=="log_bosalt_sil"){
		$delete = $db->query("TRUNCATE TABLE kullanici_logkaydi");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarili';
		}
	
}



if($_GET["p"]=="log_kaydi_baslat"){
$log_kadi 			= p("log_kadi");
$log_kip 			= p("log_kip");
$log_bsayfa 			= p("log_bsayfa");
$log_islemdurum 			= p("log_islemdurum");
$insert = $db->query("INSERT INTO kullanici_logkaydi SET
log_kadi 		= '$log_kadi',
log_kip 		= '$log_kip',
log_bsayfa 	= '$log_bsayfa',
log_islemdurum 	= '$log_islemdurum'
");
if($insert->rowCount()){
return true;
}else{
return false;
}
}



	


?>