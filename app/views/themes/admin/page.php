<?php include "inc/header.php" ?>

<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="card card-docs">
        <div class="card-header">
            <h3 class="card-title">Sayfa Ekle</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-light-primary fw-bold" name="set">Ekle</button>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row rounded border p-10 my-5">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">

                    <li class="nav-item me-0 mb-md-2">
                        <a class="nav-link btn btn-flex btn-active-light-info  active" data-bs-toggle="tab" href="#tab">
                            <span class="symbol symbol-20px me-4"> <img class="rounded-1" src="<?= 1 ?>/media/flags/<?= "img" ?>" alt=""></span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bolder">Sayfa</span>
                                <span class="fs-7"><?= "Title" ?></span>
                            </span>
                        </a>
                    </li>
                </ul>
                <form name="form" class="w-100">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Kategori</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <select name="category[]" id="category" multiple="multiple" class="form-select form-select-solid" required data-control="select2" data-placeholder="Kategori Seçiniz">
                                <option value="1"> Kategori 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="tab-content w-100" id="myTabContent">
                        <?php
                        $c = 0;
                        foreach (dildizi as $lang) :
                            if ($c % 2 == 0 and $c < 1) {
                                $activeshow = "active show";
                            } else {
                                $activeshow = "";
                            }
                            $c++;
                        ?>
                            <div class="tab-pane fade <?= $activeshow ?>" id="tab<?= $lang['id'] ?>" role="tabpanel">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Banner Görseli<small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container ">

                                        <div class="gorseller" id="gorsel<?= $lang['id'] ?>" orakuploader="on"></div>

                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Sayfa Başlığı <small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" required name="title[<?= $lang['id'] ?>]" class="form-control form-control-lg  mb-3 mb-lg-0" value="">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Sayfa İçeriği <small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <textarea required class="form-control form-control-lg  mb-3 mb-lg-0 tynmcearea" id="editor" name="content[<?= $lang['id'] ?>]" rows="7"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Diğer Görseller(varsa)<small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container ">

                                        <div class="gorseller2" id="gorseller<?= $lang['id'] ?>" orakuploader="on"></div>
                                        <div class="alert alert-secondary" role="alert"> <i class="fa-solid fa-triangle-exclamation"></i> Sürükle bırak ile resimleri sıralayabilirsiniz.</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-6 text-center">
                                    <div class="col-md-12 text-center">
                                        <label class="col-lg-4 col-form-label fw-bold fs-4">SEO Ayarları</label>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">SEO URL <small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container ">
                                                <input disabled type="text" required name="slug[<?= $lang['id'] ?>]" class="form-control form-control-lg  mb-3 mb-lg-0" value="">
                                                <div class="fv-plugins-message-container invalid-feedback">Sayfa başlığına göre otomatik oluşturulur.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Anahtar Kelimeler <small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container ">
                                                <input type="text" required name="keywords[<?= $lang['id'] ?>]" id="tagify<?= $lang['id'] ?>" class="form-control form-control-lg  mb-3 mb-lg-0" value="">
                                                <div class="fv-plugins-message-container invalid-feedback">Kelimeleri virgül kullanarak ayırınız!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Sayfa Özeti <small>[<?= $lang['title'] ?>]</small></label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container ">
                                                <input type="text" required name="summary[<?= $lang['id'] ?>]" class="form-control form-control-lg  mb-3 mb-lg-0" value="">
                                                <div class="fv-plugins-message-container invalid-feedback">Sayfayı tanıtan özet bir içerik.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <div class="row mb-6 text-center">
                        <div class="col-md-12 text-center">
                            <label class="col-lg-4 col-form-label fw-bold fs-4">Bağlantı Ayarları</label>
                        </div>
                    </div>
                    <?php
                    $tag = "";
                    $keywords = $this->model("keywordsModel")->getAllData("pages", $param['pages']['ID']);
                    foreach ($keywords as $keyword) {
                        $tag .= $keyword['keyword'] . ",";
                    }
                    $tag = substr($tag, 0, strlen($tag) - 1);
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include "inc/footer.php" ?>