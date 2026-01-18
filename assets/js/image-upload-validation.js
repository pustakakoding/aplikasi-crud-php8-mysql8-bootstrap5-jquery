/**
 * Validasi dan preview image sebelum upload
 * - Validasi tipe file (jpg, jpeg, png)
 * - Validasi ukuran file (max 1MB)
 * - Tampilkan preview image
 * - Notifikasi menggunakan Bootstrap Toasts
 */

(function ($) {
    'use strict';

    // Konstanta konfigurasi
    const CONFIG = {
        maxFileSize: 1000000, // 1MB dalam bytes
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        defaultImage: 'images/img-default.png'
    };

    const $fileInput = $('#image');
    const $previewImage = $('#preview-image');

    // Jika tidak ada file dipilih atau elemen preview tidak ditemukan
    if (!$fileInput.length || !$previewImage.length) {
        return;
    }

    /**
     * Buat container untuk toast jika belum ada
     */
    function initToastContainer() {
        if ($('#toast-container').length === 0) {
            $('body').append(`
                <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                </div>
            `);
        }
    }

    /**
     * Tampilkan toast notification
     */
    function showToast(message, type = 'danger') {
        initToastContainer();

        const toastId = 'toast-' + Date.now();
        const iconClass = type === 'danger' ? 'fa-solid fa-triangle-exclamation' : 'fa-solid fa-circle-check';
        const title = type === 'danger' ? 'Error' : 'Success';

        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="${iconClass} me-1"></i>
                        <strong>${title}:</strong> ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white align-items-start mt-2 me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;

        $('#toast-container').append(toastHtml);

        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: 5000
        });

        toast.show();

        // Hapus toast dari DOM setelah ditutup
        $(toastElement).on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    /**
     * Validasi tipe file
     */
    function isValidFileType(fileName) {
        const extension = fileName.split('.').pop().toLowerCase();
        return CONFIG.allowedExtensions.includes(extension);
    }

    /**
     * Validasi ukuran file
     */
    function isValidFileSize(fileSize) {
        return fileSize <= CONFIG.maxFileSize;
    }

    /**
     * Format ukuran file ke format yang lebih readable
     */
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    /**
     * Reset input file dan preview
     */
    function resetFileInput() {
        $fileInput.val('');
        $previewImage.attr({
            'src': CONFIG.defaultImage,
            'alt': 'Preview image'
        });
    }

    /**
     * Tampilkan preview image
     */
    function showPreview(file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $previewImage.attr({
                'src': e.target.result,
                'alt': file.name
            });
        };

        reader.onerror = function () {
            showToast('Gagal membaca file. Silakan coba lagi.', 'danger');
            resetFileInput();
        };

        reader.readAsDataURL(file);
    }

    /**
     * Handler untuk perubahan file input
     */
    function handleFileChange(event) {
        const file = event.target.files[0];

        // Cek apakah ada file yang dipilih
        if (!file) {
            resetFileInput();
            return;
        }

        // Validasi tipe file
        if (!isValidFileType(file.name)) {
            const message = `
                Tipe file tidak sesuai.<br>
                <small>Format diperbolehkan: ${CONFIG.allowedExtensions.join(', ').toUpperCase()}<br>
                File Anda: ${file.name.split('.').pop().toUpperCase()}</small>
            `;
            showToast(message, 'danger');
            resetFileInput();
            return;
        }

        // Validasi ukuran file
        if (!isValidFileSize(file.size)) {
            const maxSizeMB = CONFIG.maxFileSize / 1000000;
            const message = `
                Ukuran file terlalu besar.<br>
                <small>Maksimal: ${maxSizeMB} MB<br>
                File Anda: ${formatFileSize(file.size)}</small>
            `;
            showToast(message, 'danger');
            resetFileInput();
            return;
        }

        // Jika semua validasi lolos, tampilkan preview
        showPreview(file);
    }

    // Event listener untuk perubahan file menggunakan jQuery
    $fileInput.on('change', handleFileChange);

})(jQuery);