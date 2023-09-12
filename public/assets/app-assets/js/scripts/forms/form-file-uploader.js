/*=========================================================================================
    File Name: form-file-uploader.js
    Description: dropzone
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

Dropzone.autoDiscover = false;

$(function () {
  'use strict';

  var singleFile = $('#dpz-single-file');
  var multipleFiles = $('#dpz-multiple-files');
  var buttonSelect = $('#dpz-btn-select-files');
  var limitFiles = $('#dpz-file-limits');
  var acceptFiles = $('#dpz-accept-files');
  var removeThumb = $('#dpz-remove-thumb');
  var removeAllThumbs = $('#dpz-remove-all-thumb');

  // Basic example
  singleFile.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFiles: 1,
    init: function () {
      // Using a closure.
      var _this = this;

      var myclass=document.querySelector('.dropzone');
      var inner=myclass[0];

      // Setup the observer for the button.
      $(inner).on('click', function () {
        // Using "_this" here, because "this" doesn't point to the dropzone anymore
       alert("hello")
        _this.removeAllFiles()
        // If you want to cancel uploads as well, you
        // could also call _this.removeAllFiles(true);
      });
    }
  });

  // Multiple Files
  multipleFiles.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 0.5, // MB
    clickable: true
  });

  // Use Button To Select Files
  buttonSelect.dropzone({
    clickable: '#select-files' // Define the element that should be used as click trigger to select files.
  });

  // Limit File Size and No. Of Files
  limitFiles.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 0.5, // MB
    maxFiles: 5,
    maxThumbnailFilesize: 1 // MB
  });

  // Accepted Only Files
  acceptFiles.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    acceptedFiles: 'image/*'
  });

  //Remove Thumbnail
  var uploadedImages = [];

  removeThumb.dropzone({
    url: removeThumb.data('url'),
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    dictRemoveFile: ' Trash',
    acceptedFiles: 'image/*',
    headers: {
        'X-CSRF-TOKEN': removeThumb.data('token')
    },

    success: function (file, response) {
        // Add the uploaded image URL to the array
        uploadedImages.push(response.data);

        // Create a hidden field with the uploaded image URL
        var hiddenField = $('<input>').attr('type', 'hidden').attr('name', 'images[]').val(response.data);
        file.previewElement.querySelector("[data-dz-thumbnail]").setAttribute("data-url",response.data)
        $('#productForm').append(hiddenField);

        file.previewElement.classList.add('dz-success');
    },
    removedfile: function (file) {


        var imageUrl = file.previewElement.querySelector("[data-dz-thumbnail]").getAttribute("data-url");
        console.log('image',imageUrl)
        // Remove the corresponding hidden field by matching the URL
        var hiddenField = $('#productForm').find('input[name="images[]"][value="' + imageUrl + '"]');
        hiddenField.remove();

        // Remove the image URL from the array
        var index = uploadedImages.indexOf(imageUrl);
        if (index !== -1) {
            uploadedImages.splice(index, 1);
        }

        file.previewElement.parentNode.removeChild(file.previewElement);
    }
  });

  // Remove All Thumbnails
  removeAllThumbs.dropzone({
    paramName: 'file', // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    init: function () {
      // Using a closure.
      var _this = this;

      // Setup the observer for the button.
      $('.dz-details"').on('click', function () {
        // Using "_this" here, because "this" doesn't point to the dropzone anymore
        _this.removeFiles()
        // If you want to cancel uploads as well, you
        // could also call _this.removeAllFiles(true);
      });
    }
  });
});
