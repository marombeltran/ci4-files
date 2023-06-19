<script>
$(document).ready(() => {
    <?php 
        // Determine upload limit from PHP settings
        helper('files');

        $uploadLimitBytes = max_file_upload_in_bytes();

        // Buffer chunks to just under the limit (maintain bytes)
        $chunkSize = $uploadLimitBytes - 1000;

        // Limit file to the MB equivalent of 500 bytes
        $maxFileSize = round($chunkSize * 500 / 1024 / 1024, 1);
    ?>

    Dropzone.options.filesDropzone = {

        // Reload file list after uploads
        init: function () {
            this.on("queuecomplete", function () {
                $('#files-wrapper').load('<?= current_url(); ?>');
            }),

            maxFilesize: <?= $maxFileSize; ?>,
            timeout: 0,

            chunking: true,
            chunkSize: <?= $chunkSize; ?>,
            retryChunks: true,
            retryChunksLimit: 3,

            // When chunking include chunk data as POST fields
            params: (files, xhr, chunk) => {
                return chunk ? { uuid: chunk.file.upload.uuid, totalChunks: chunk.file.upload.totalChunkCount, chunkIndex: chunk.index } : null;
            }
        }
    };

    Dropzone.discover();

});
</script>
