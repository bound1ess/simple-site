copy-assets: copy-medium copy-dropzone copy-jquery ;

copy-medium: ; cp -r bower_components/medium-editor/dist/* public/
copy-dropzone: ; cp -r bower_components/dropzone/dist/min/* public/dropzone/
copy-jquery: ; cp bower_components/jquery/dist/jquery.min.js public/
