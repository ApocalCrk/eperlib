/*=========================================================================================
	File Name: form-quill-editor.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  var Font = Quill.import('formats/font');
  Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
  Quill.register(Font, true);

  var fullEditor = new Quill('#tentang_area .editor', {
    bounds: '#tentang_area .editor',
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: []
          },
          {
            size: []
          }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: []
          },
          {
            background: []
          }
        ],
        [
          {
            script: 'super'
          },
          {
            script: 'sub'
          }
        ],
        [
          {
            header: '1'
          },
          {
            header: '2'
          },
          'blockquote',
          'code-block'
        ],
        [
          {
            list: 'ordered'
          },
          {
            list: 'bullet'
          },
          {
            indent: '-1'
          },
          {
            indent: '+1'
          }
        ],
        [
          'direction',
          {
            align: []
          }
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ]
    },
    theme: 'snow'
  });

  var editors = fullEditor;
})(window, document, jQuery);
