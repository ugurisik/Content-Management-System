function orakuploader(id, siteurl, path, title, accept, maxupload, attach) {
    const d = new Date();
    let year = d.getFullYear();
    $("#" + id).orakuploader({
        orakuploader_path: siteurl + "public/orakuploader/",

        orakuploader_main_path: siteurl + "public/images/" + year + "/" + path,
        orakuploader_thumbnail_path: siteurl + "public/images/" + year + "/" + path + "/thumb",

        orakuploader_add_image: siteurl + "public/orakuploader/images/add.png",
        orakuploader_add_label: title,
        orakuploader_resize_to: 1920,
        orakuploader_thumbnail_size: 450,
        orakuploader_hide_on_exceed: true,
        orakuploader_attach_images: attach,
        orakuploader_field_name: "" + id + "",
        orakuploader_maximum_uploads: maxupload,
        orakuploader_siteurl: siteurl,
        orakuploader_max_exceeded: function () {
            alert(
                maxupload +
                " Adet resim yükleyebilirsiniz. Lütfen öncelikle yüklü resmi siliniz."
            );
        },
        orakuploader_auto_start: true,
        orakuploader_accept_types: "" + accept + "",
        orakuploader_failed_upload: function (args) {
            alert(args.errors[0]);
        },

        orakuploader_use_sortable: true,
        orakuploader_use_dragndrop: true,
    });
}