(function () {
    var input = document.getElementById('watch_image');
    var wrap = document.getElementById('watch-image-preview-wrap');
    var img = document.getElementById('watch-image-preview');
    if (!input || !wrap || !img) return;

    input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (!file || !/^image\//.test(file.type)) {
            wrap.classList.add('d-none');
            img.removeAttribute('src');
            return;
        }
        var url = URL.createObjectURL(file);
        img.onload = function () {
            URL.revokeObjectURL(url);
        };
        img.src = url;
        wrap.classList.remove('d-none');
    });
})();
