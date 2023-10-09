<div id="kt_app_content_container" class="app-container container-fluid">
    <?php
    $users = $this->model('sampleModel')->getData('user', ['Role' => 1]);
    $u = [];
    foreach ($users as $user) {
        $lastLogins = $this->model('sampleModel')->getOneData('user_login_info', ['UserGuid' => $user['Guid']]);
        $lastLoginError = $this->model('sampleModel')->getOneData('user_login_error', ['UserGuid' => $user['Guid']]);
        $u[] = [
            'User' => $user,
            'LastLogins' => $lastLogins,
            'LastLoginError' => $lastLoginError
        ];
    }
    ?>
    <?php if ($params['type'] == 'list') : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-p-3 card-flush">
                    <div class="card-header">
                        <div class="card-title">
                            Yönetici Listesi
                        </div>
                        <div class="card-toolbar">
                            <a href="<?= ADMIN_URL ?>admin/add" class="btn btn-light-primary">
                                <i class="bi bi-database-add"></i>
                                <?= $params['lang']['langs_add'] ?>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="langList" class="table table-row-bordered table-row-striped gy-5">
                            <thead>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <th>Image</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Login Date</th>
                                    <th>Last Incorrect Login Date</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($u as $user) : ?>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="http://localhost:8890/ContentManagementSystem/app/views/themes/admin/assets/media/avatars/300-2.jpg">
                                            </div>
                                        </td>
                                        <td><span class="badge badge-light-secondary fw-bold text-success fs-7">FULL NAME</span></td>
                                        <td><span class="badge badge-light-secondary fw-bold text-success fs-7"><?= $user['User']['UserName'] ?></span></td>
                                        <td><span class="badge badge-light-secondary fw-bold text-success fs-7"><?= $user['User']['Email'] ?></span></td>
                                        <td>
                                            <?php if ($user['User']['Status'] == 0) : ?>
                                                <span class="badge badge-light-warning fs-7">Inactive</span>
                                            <?php elseif ($user['User']['Status'] == 1) : ?>
                                                <span class="badge badge-light-primary fs-7">Active</span>
                                            <?php elseif ($user['User']['Status'] == 2) : ?>
                                                <span class="badge badge-light-danger fs-7">Banned</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="badge badge-light-secondary fw-bold text-muted"><?= $user['LastLogins']['CreatedDate'] ?></span></td>
                                        <td><span class="badge badge-light-secondary fw-bold text-muted"><?= $user['LastLoginError']['CreatedDate'] ?></span></td>
                                        <td><span class="badge badge-light-secondary fw-bold text-muted"><?= $user['User']['CreatedDate'] ?></span></td>
                                        <td><span class="badge badge-light-secondary fw-bold text-muted"><?= $user['User']['UpdatedDate'] ?></span></td>
                                        <td>
                                            <a href="<?= ADMIN_URL ?>langs/edit/<?= $lang['Guid'] ?>" class="btn btn-outline btn-outline-dashed p-3 m-1"> <i class="bi bi-eye-fill fs-3 text-success position-relative" style="left: 2px;"></i></a>
                                            <a href="<?= ADMIN_URL ?>langs/edit/<?= $lang['Guid'] ?>" class="btn btn-outline btn-outline-dashed p-3 m-1"> <i class="bi bi-pencil-square fs-3 text-warning position-relative" style="left: 2px;"></i></a>
                                            <a href="javascript:;" onclick="del('<?= $lang['Guid'] ?>')" class="btn btn-outline btn-outline-dashed p-3 m-1"> <i class="bi bi-trash fs-3 text-danger position-relative" style="left: 2px;"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function del(guid) {
                Swal.fire({
                    title: '<?= $params['lang']['langs_delete_sure'] ?>',
                    text: "<?= $params['lang']['langs_delete_not_back'] ?>",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<?= $params['lang']['langs_delete_yes'] ?>',
                    cancelButtonText: '<?= $params['lang']['langs_delete_no'] ?>',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = [];
                        data.push({
                            name: 'guid',
                            value: guid
                        });
                        data.push({
                            name: '_token',
                            value: '<?= $this->session->getSession('_token') ?>'
                        });
                        $.ajax({
                            type: "POST",
                            url: "<?= ADMIN_URL ?>langs/delete",
                            data: data,
                            success: function(response) {
                                var obj = JSON.parse(response);
                                if (obj.Status == true) {
                                    Swal.fire(
                                        'Silindi!',
                                        obj.Message,
                                        'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Hata!',
                                        obj.Message,
                                        'error'
                                    )
                                }
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            '<?= $params['lang']['langs_delete_cancelled'] ?>',
                            '<?= $params['lang']['langs_delete_cancelled_subtitle'] ?>',
                            'warning'
                        )
                    }
                })
            }
            document.addEventListener("DOMContentLoaded", function() {
                $('#langList').DataTable();
            });
        </script>
    <?php endif; ?>
    <?php if ($params['type'] == 'add') : ?>
        <form action="">
            <div class="row">
                <div class="col-12 mb-5 mb-xl-10">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-5">
                            <div class="card-title">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="http://localhost:8890/ContentManagementSystem/app/views/themes/admin/assets/media/avatars/300-2.jpg">
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><span class="text-success fw-bold fs-5">UĞUR IŞIK</span></div>
                                    <div class="col-md-12"><span class="text-gray-600 fw-bold fs-7">peniaugur80@gmail.com</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-6">
                            <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-2 pb-1 active" style="height: 60px !important; width: 150px !important;" data-bs-toggle="pill" href="#userInformation" aria-selected="false" role="tab" tabindex="-1">
                                        <div class="nav-icon mb-1">
                                            <i class="bi bi-info-circle fs-1"></i>
                                        </div>
                                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1"> Genel Bilgiler </span>
                                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-2 pb-1" style="height: 60px !important; width: 150px !important;" data-bs-toggle="pill" href="#userSettings" aria-selected="false" role="tab" tabindex="-1">
                                        <div class="nav-icon mb-1">
                                            <i class="bi bi-person-gear fs-1"></i>
                                        </div>
                                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Yönetim Ayarları</span>
                                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-2 pb-1" style="height: 60px !important; width: 150px !important;" data-bs-toggle="pill" href="#logs" aria-selected="false" role="tab" tabindex="-1">
                                        <div class="nav-icon mb-1">
                                            <i class="bi bi-person-lines-fill fs-1"></i>
                                        </div>
                                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Kullanıcı İşlemleri</span>
                                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                    <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-2 pb-1" style="height: 60px !important; width: 150px !important;" data-bs-toggle="pill" href="#report" aria-selected="false" role="tab" tabindex="-1">
                                        <div class="nav-icon mb-1">
                                            <i class="bi bi-activity fs-1"></i>
                                        </div>
                                        <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Genel Rapor</span>
                                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="userInformation" role="tabpanel">
                                    Tab 1
                                </div>
                                <div class="tab-pane fade" id="userSettings" role="tabpanel">
                                    Tab 2
                                </div>
                                <div class="tab-pane fade" id="logs" role="tabpanel">
                                    Tab 3
                                </div>
                                <div class="tab-pane fade" id="report" role="tabpanel">
                                    Tab 4
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    <?php endif; ?>
    <?php if ($params['type'] == 'edit') :
        $lang = $this->model('sampleModel')->getOneData('langs', ['Guid' => $params['guid']]);
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-p-3 card-flush">
                    <div class="card-header">
                        <div class="card-title">
                            <?= $params['lang']['langs_edit_lang'] ?> (<?= $lang['Title'] ?>)
                        </div>
                        <div class="card-toolbar">
                            <a href="<?= ADMIN_URL ?>langs/list" class="btn btn-light-primary">
                                <i class="bi bi-reply-fill"></i>
                                <?= $params['lang']['langs_return_list'] ?>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form name="formData">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><?= $params['lang']['langs_edit_lang_name'] ?></span>
                                        <input type="text" name="langTitle" class="form-control" value="<?= $lang['Title'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group mb-5 disable">
                                        <span class="input-group-text " id="inputGroup-sizing-default"><?= $params['lang']['langs_edit_lang_code'] ?></span>
                                        <input type="text" name="langSubTitle" class="form-control" value="<?= $lang['SubTitle'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12 mb-3" style="display: flex; align-items: center;justify-content: center;gap: 10px;">
                                    <input type="radio" class="btn-check" name="status" value="1" <?php if ($lang['Status'] == 1) echo 'checked' ?> id="kt_radio_buttons_2_option_1" />
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" style="width:49%" for="kt_radio_buttons_2_option_1">
                                        <i class="bi bi-check-circle fs-1"></i>
                                        <span class="d-block fw-semibold text-start">
                                            <span class="text-dark fw-bold d-block fs-3"><?= $params['lang']['langs_status_active'] ?></span>
                                            <span class="text-muted fw-semibold fs-6">
                                                <?= $params['lang']['langs_edit_active_subtitle'] ?>
                                            </span>
                                        </span>
                                    </label>
                                    <input type="radio" class="btn-check" name="status" value="0" <?php if ($lang['Status'] == 0) echo 'checked' ?> id="kt_radio_buttons_2_option_2" />
                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-danger p-7 d-flex align-items-center" style="width:49%" for="kt_radio_buttons_2_option_2">
                                        <i class="bi bi-x-lg fs-1"></i>
                                        <span class="d-block fw-semibold text-start">
                                            <span class="text-dark fw-bold d-block fs-3"><?= $params['lang']['langs_status_inactive'] ?></span>
                                            <span class="text-muted fw-semibold fs-6"><?= $params['lang']['langs_edit_inactive_subtitle'] ?></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12 d-flex">
                                    <div class="d-flex flex-stack">
                                        <div class="me-5">
                                            <label class="fs-6 fw-semibold form-label"><?= $params['lang']['langs_edit_default_title'] ?></label>
                                            <div class="fs-7 fw-semibold text-muted"><?= $params['lang']['langs_edit_default_subtitle'] ?></div>
                                        </div>
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <span class="form-check-label fw-semibold text-muted" style="margin-right: 5px;">
                                                <?= $params['lang']['langs_edit_default_no'] ?>
                                            </span>
                                            <input class="form-check-input" name="defaultLang" type="checkbox" <?php if ($lang['DefaultLang'] == 1) echo 'checked' ?> />
                                            <span class="form-check-label fw-semibold text-muted">
                                                <?= $params['lang']['langs_edit_default_yes'] ?>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12" style="display: flex; align-items: flex-start; flex-direction: column; justify-content: center;">
                                    <label for="basic-url" class="form-label"><?= $params['lang']['langs_edit_cover_title'] ?></label>
                                    <div class="input-group input-group-solid mb-3">
                                        <div id="cover" orakuploader="on"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" onclick="updateLang(this)" class="btn btn-light-primary"><?= $params['lang']['langs_edit_save'] ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var Img = <?php
                            if ($lang['Img'] != '') {
                                if (substr($lang['Img'], 0, 1) != '/') {
                                    $lang['Img'] = '/' . $lang['Img'];
                                }
                                echo '["' . SITE_URL . $lang['Img'] . '"];';
                            } else {
                                echo '[];';
                            }
                            ?>
                orakuploader("cover", "<?= SITE_URL ?>/", "langs/logos", "<?= $params['lang']['langs_edit_choose_cover'] ?>", "image/*", 1, Img);
            });

            function updateLang(_this) {
                var formData = $('form[name=formData]').serializeArray();
                $(this).attr('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "<?= ADMIN_URL ?>langs/update/<?= $params['guid'] ?>",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        var obj = JSON.parse(response);
                        if (obj.Status == true) {
                            Swal.fire(
                                'Başarılı!',
                                obj.Message,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    $(this).attr('disabled', false);
                                    location.reload();
                                }
                            })
                        } else {
                            Swal.fire(
                                'Hata!',
                                obj.Message,
                                'error'
                            )
                            console.log(obj.EmptyDatas)
                            if (obj.EmptyDatas != undefined) {
                                for (var k in obj.EmptyDatas) {
                                    $('input[name=' + k + ']').addClass('is-invalid');
                                }
                            }
                        }
                    }
                });
            }
        </script>
    <?php endif; ?>
    <?php if ($params['type'] == 'translate') :
        $lang = $this->model('sampleModel')->getOneData('langs', ['Guid' => $params['guid']]);
        $fileName = 'admin';
        $translates = $this->utils->readLangTranslates($lang['Url'], $fileName);
        $langFiles = $this->utils->readLangFiles($lang['Url']);
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title py-3">
                            <div class="col-md-12">
                                <label class="required form-label">Select File</label>
                                <select class="form-select translateSelect" onchange="getDatas(this)" style="width: 225px;" aria-label="Select File">
                                    <?php foreach ($langFiles as $file) : ?>
                                        <option value="<?= $file ?>" <?php if ($fileName == $file) echo 'checked' ?>><?= ucfirst($file) ?> File</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <a href="javascript:;" onclick="saveTranslate()" class="btn btn-light-primary m-3">
                                <i class="bi bi-file-plus fs-3"></i>
                                Kaydet
                            </a>
                            <a href="<?= ADMIN_URL ?>langs/list" class="btn btn-light-primary">
                                <i class="bi bi-reply-fill"></i>
                                Listeye Dön
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="display: flex; flex-wrap: wrap;">
                        <form name="formData">
                            <div class="row">
                                <div class="col-md-12 translates" style="display: contents;">
                                    <?php
                                    foreach ($translates as $key => $value) :
                                        $keyName = explode('_', $key);
                                        if (count($keyName) > 1)
                                            array_shift($keyName);
                                        $keyName = implode('_', $keyName);
                                        // replace _ to space and uppercase first letter
                                        $keyName = ucwords(str_replace('_', ' ', $keyName));
                                    ?>
                                        <div class="m-3">
                                            <label class="form-label"><?= $keyName ?></label>
                                            <input type="text" class="form-control inputs" name='<?= $key ?>' style="width: 225px;" value="<?= $value ?>" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" name="fileName" value="<?= $fileName ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                $('.translateSelect').select2();
                $('.inputs').on('change', function() {
                    $(this).addClass('border-primary');
                });
            });

            function getDatas(_this) {
                var val = $(_this).val();
                $('input[name=fileName]').val(val);
                $('.translates').html('');
                var token = $('input[name=_token]').val();
                var data = [];
                data.push({
                    name: '_token',
                    value: token
                });
                $.ajax({
                    type: "POST",
                    url: "<?= ADMIN_URL ?>langs/translate/<?= $params['guid'] ?>/" + val,
                    data: data,
                    success: function(response) {
                        var obj = JSON.parse(response);
                        if (obj.Status == true) {
                            Swal.fire(
                                'Başarılı!',
                                obj.Message,
                                'success'
                            )
                            var translates = obj.Datas;
                            for (var k in translates) {
                                var keyName = k.split('_');
                                if (keyName.length > 1)
                                    keyName.shift();
                                keyName = keyName.join('_');
                                keyName = keyName.replace(/_/g, ' ');
                                keyName = keyName.replace(/\w\S*/g, function(txt) {
                                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                                });
                                $('.translates').append('<div class="m-3"><label class="form-label">' + keyName + '</label><input type="text" class="form-control inputs" name="' + k + '" style="width: 225px;" value="' + translates[k] + '" /></div>');
                            }
                        } else {
                            Swal.fire(
                                'Hata!',
                                obj.Message,
                                'error'
                            )
                        }
                    }
                });
            }

            function saveTranslate() {
                var formData = $('form[name=formData]').serializeArray();
                $.ajax({
                    type: "POST",
                    url: "<?= ADMIN_URL ?>langs/translate/<?= $params['guid'] ?>",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        var obj = JSON.parse(response);
                        if (obj.Status == true) {
                            Swal.fire(
                                'Başarılı!',
                                obj.Message,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        } else {
                            Swal.fire(
                                'Hata!',
                                obj.Message,
                                'error'
                            )
                        }
                    }
                });
            }
        </script>
    <?php endif; ?>
</div>