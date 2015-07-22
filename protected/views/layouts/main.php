<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript" src="../../../scripts/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../../css/ionicons-1.4.1/css/ionicons.css">
    <script type="text/javascript" src="../../../scripts/PL-javascript.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
	<div class="wrapper_site">
        <div class="admin_nav">
            <a href="/Categories/categoriesManagement"><div id="categories_mng" class="admin_nav_item">Quản lý danh mục</div></a>
            <div id="career_mng" class="admin_nav_item">Quản lý tuyển dụng</div>
            <a href="/Information/informationsManagement"><div id="info_mng" class="admin_nav_item">Quản lý thông tin</div></a>
            <a href="/Gallery/slideManagement"><div id="slide_mng" class="admin_nav_item">Quản lý Slide ảnh</div></a>
        </div>
        <div class="admin_content">
            <?php echo $content; ?>
        </div>
    </div>
</body>
</html>
			