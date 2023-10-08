<?php include "inc/header.php" ?>

<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="row">
        <div class="col-xl-12 my-5 mt-0">
            <div class="card card-flush">
                <div class="card-header">
                    <h3 class="card-title">
                        Hakkımızda Sayfası
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                            <li class="nav-item">
                                <a class="nav-link w-100 active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                    <span class="svg-icon fs-2"><svg>...</svg></span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Link 1</span>
                                        <span class="fs-7">Description</span>
                                    </span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_5">
                                    <span class="svg-icon fs-2"><svg>...</svg></span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Link 2</span>
                                        <span class="fs-7">Description</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link w-100 btn btn-flex btn-active-light-danger" data-bs-toggle="tab" href="#kt_vtab_pane_6">
                                    <span class="svg-icon fs-2"><svg>...</svg></span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bold">Link 3</span>
                                        <span class="fs-7">Description</span>
                                    </span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body py-3">
                    <form name="FormData">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_vtab_pane_4" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="Title" name="Title" placeholder="Safari Yazılım Nedir?" />
                                                    <label for="Title">Başlık</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div id="kt_docs_quill_basic" name="kt_docs_quill_basic">
                                                    <h1>Quick and Simple Quill Integration</h1>

                                                </div>
                                            </div>
                                            <div class="col-12 mb-3" style="margin-top:3.5rem">
                                                <div class="dropzone" id="kt_dropzonejs_example_1">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Görseller</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="dropzone" id="kt_dropzonejs_example_2">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Videolar</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="separator my-10"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-3">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <span class="fs-3 fw-bold text-gray-700">Misyon, Vizyon & Değerler</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="MissionTitle" name="MissionTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="MissionTitle">Misyon Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="MissionContent" name="MissionContent" style="height: 100px"></textarea>
                                                                <label for="MissionContent">Misyon İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Misyon Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="separator my-3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="VisionTitle" name="VisionTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="VisionTitle">Vizyon Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="VisionContent" name="VisionContent" style="height: 100px"></textarea>
                                                                <label for="VisionContent">Vizyon İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Vizyon Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="separator my-3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="ValueTitle" name="ValueTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="ValueTitle">Değerlerimiz Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="ValueContent" name="ValueContent" style="height: 100px"></textarea>
                                                                <label for="ValueContent">Değerlerimiz İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Değerlerimiz Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="separator my-10"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-3">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <span class="fs-3 fw-bold text-gray-700">Biz Kimiz, Neden Biz & Ne Yapıyoruz?</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="MissionTitle" name="MissionTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="MissionTitle">Biz Kimiz Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="MissionContent" name="MissionContent" style="height: 100px"></textarea>
                                                                <label for="MissionContent">Biz Kimiz İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Biz Kimiz Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="separator my-3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="VisionTitle" name="VisionTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="VisionTitle">Neden Biz Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="VisionContent" name="VisionContent" style="height: 100px"></textarea>
                                                                <label for="VisionContent">Neden Biz İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Neden Biz Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="separator my-3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-floating mb-3 mt-3">
                                                                <input type="email" class="form-control" id="ValueTitle" name="ValueTitle" placeholder="Safari Yazılım Nedir?" />
                                                                <label for="ValueTitle">Ne Yapıyoruz Başlık</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="İçerik Giriniz..." id="ValueContent" name="ValueContent" style="height: 100px"></textarea>
                                                                <label for="ValueContent">Ne Yapıyoruz İçerik</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="dropzone" id="kt_dropzonejs_example_2">
                                                                <!--begin::Message-->
                                                                <div class="dz-message needsclick">
                                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                                    <!--begin::Info-->
                                                                    <div class="ms-4">
                                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Ne Yapıyoruz Görseller</h3>
                                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                                    </div>
                                                                    <!--end::Info-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="separator my-10"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-3">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <span class="fs-3 fw-bold text-gray-700">Bilgi Alanı</span>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                                ...2
                            </div> -->
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<?php include "inc/footer.php" ?>

<script>
    var quill = new Quill('#kt_docs_quill_basic', {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'],
                [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    },
                    {
                        indent: '-1'
                    }, {
                        indent: '+1'
                    },
                    {
                        align: []
                    },
                    {
                        color: []
                    },
                    {
                        background: []
                    }
                ],
                ['clean']
                ['clean'],
                ['link'],
                ['video'],
                ['formula'],
                ['blockquote'],
                ['align'],
                ['indent'],
                ['color'],
                ['background'],
                ['font'],
                ['size'],
                ['direction'],
                ['code-block'],
                ['script'],
                ['strike'],
                ['table'],
                ['width'],
                ['height'],
                ['header'],

            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });

    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });
    var myDropzone = new Dropzone("#kt_dropzonejs_example_2", {
        url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }
    });
</script>