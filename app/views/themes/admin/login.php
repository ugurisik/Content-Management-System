<!DOCTYPE html>
<!--
Author: İMER YAZILIM
Product Name: Kurumsal Website Yönetim Paneli
Product Version: 2.1.3
Website: http://www.imeryazilim.com
Contact: info@imeryazilim.com
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your website.
-->
<html lang="en">
<head>
    <title>SWP İçerik Yönetim Sistemi</title>
    <meta charset="utf-8" />
    <meta name="description" content="İMER YAZILIM Kurumsal Script v2.1" />
    <meta name="keywords" content="imer yazilim,imer,kurumsal script,kurumsal,kurumsal website, kurumsal website script, kurumsal yazılım" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="XXX Yönetim Paneli" />
    <meta property="og:url" content="https://imeryazilim.com" />
    <meta property="og:site_name" content="XXX | Yönetim Paneli" />
    <link rel="canonical" href="<?= SITE_URL ?>" />
    <link rel="shortcut icon" href="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/auth/bg10.jpeg');
            }

            [data-theme="dark"] body {
                background-image: url('<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/auth/bg10-dark.jpeg');
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/auth/agency.png" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/auth/agency-dark.png" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                    <div class="text-gray-600 fs-base text-center fw-semibold">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam nam sequi consectetur ex exercitationem iure quia incidunt porro facilis dolorem, temporibus in accusamus ullam eos eligendi possimus maxime sapiente ad amet voluptatum. Repudiandae vero placeat expedita excepturi, itaque minima est ipsum impedit numquam, sint perspiciatis atque, tenetur facere odio ratione?
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <div class="w-md-400px">
                        <form class="form w-100" method="POST">
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Hoş Geldiniz!</h1>
                                <div class="text-gray-500 fw-semibold fs-6">SWP Yönetim Paneli</div>
                            </div>
                            <div class="row g-3 mb-9">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        <img alt="Logo" src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        <img alt="Logo" src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
                                        <img alt="Logo" src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                                </div>
                            </div>
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Kullanıcı adı ya da e-posta adresiniz..." name="email" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Şifreniz..." name="password" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="reset-password.html" class="link-primary">Şifremi Unuttum</a>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="button" id="signBtn" class="btn btn-primary">
                                    Giriş Yap
                                </button>
                            </div>
                            <!-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                <a href="sign-up.html" class="link-primary">Sign up</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
          var hostUrl = "<?= SITE_URL.'/'.THEME_PATH.'admin/assets' ?>";
    </script>
    <script src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/plugins/global/plugins.bundle.js"></script>
    <script src="<?= SITE_URL . '/' . THEME_PATH . 'admin/assets' ?>/js/scripts.bundle.js"></script>
    <script>
        $(document).ready(()=>{
            $('#signBtn').click(()=>{
                var email = $('input[name="email"]').val();
                var password = $('input[name="password"]').val();
                $.ajax({
                    url: '<?= SITE_URL ?>/admincp/login',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    success: (data)=>{
                        var data = JSON.parse(data);
                        console.log(data)
                        if(data.Status){
                            window.location.href = '<?= SITE_URL ?>/admincp';
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.Message,
                            })
                        }
                    }
                })
            })
        });
    </script>
</body>

</html>