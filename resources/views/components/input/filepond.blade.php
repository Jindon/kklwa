<div
    wire:ignore
    x-data
    x-init="
        FilePond.registerPlugin(FilePondPluginFileValidateSize);

        FilePond.setOptions({
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },

                revert: (filename, load, error) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            },
        });


        let pond = FilePond.create($refs.input, {
            maxFileSize: '2MB'
        });

        this.addEventListener('pondReset', e => {
            pond.removeFiles();
        });
    "
>

    <input type="file" x-ref="input" id="filepond">
</div>

