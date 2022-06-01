<?php include("Controllers/SessionController.php");  include("resources/views/header.php"); error_reporting(0); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>


    <title>Blog Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
    </head>

    <body>
    <!-- MENU -->
    <?php include("resources/views/menu.php"); ?>
    <!-- /MENU -->

    <!-- MAIN CONTENT -->
    <main class="main">
    <div class="container-fluid">
    <div class="row">

    <!-- MAIN TITLE -->
    <div class="col-12">
    <div class="main__title">
    <h2>Blog Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
    <!-- /MAIN TITLE -->

    <?php include('Controllers/EditBlogController.php'); ?>

	<?php $query_blog = mysqli_query($db, "SELECT * FROM shop_blog WHERE token = '$token_blog'"); $data_blog = mysqli_fetch_array($query_blog); ?>


    <div class="col-12">
    <form name="editblog" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="row">
        
    <div class="col-12">
    <div class="form__img">
    <label for="form__img-upload">Blog Fotoğrafı</label>
    <input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
    <img id="form__img" src="https://turkmahallshop.com/public/images/blog/<?php echo $data_blog['image']; ?>" alt="image">
    </div>
    </div>

    <div class="col-12">
	<input type="text" name="title" class="form__input" title="Başlangıç Tarihi" value="<?php echo $data_blog['title']; ?>" required="required">
    </div>

    <div class="col-12">
    <textarea name="blog" class="summernote" id="summernote"><?php echo $data_blog['blog'];?></textarea>
    </div>

    <div class="col-12">
    <br>
    <input type="text" name="seokey" class="form__input" placeholder="Google Anahtar Kelimeler" value="<?php echo $data_blog['seokey']; ?>">
    </div>

    <div class="col-12">
    <textarea id="text" name="seodesc" class="form__textarea" placeholder="Google Description Metni"><?php echo $data_blog['seodesc']; ?></textarea>
    </div>

    <div class="col-12" style="text-align: center;">
    <input type="submit" class="form__btn" name="update" value="Blog Güncelle ">
    </div>
    </div>
    </form>
    </div>

    </div>
    </div>

    </main>
    <!-- /MAIN CONTENT -->

    <!-- JS -->
    <?php include("resources/js/app.js.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>$('#summernote').summernote({placeholder: 'Blog Metni',tabsize: 2,height: 740});$(".js-example-tokenizer").select2({tags: true,tokenSeparators: [',', ' ']})</script>
    </body>

    </html>