import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube aqui tu archivo",
    acceptedFiles: ".png,.jpg,.gif,.jpeg",
    addRemoveLink: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false
});