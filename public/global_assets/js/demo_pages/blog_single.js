/* ------------------------------------------------------------------------------
 *
 *  # Blog page - detailed
 *
 *  Demo JS code for blog page kit - detailed view
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var BlogSingle = function() {


    //
    // Setup module components
    //
    var getCKEditorContent = function() {
        if (typeof CKEDITOR == 'undefined') {
            console.warn('Warning - ckeditor.js is not loaded.');
            return '';
        }

        var editor = CKEDITOR.instances['add-comment'];
        if (editor) {
            return editor.getData();
        }

        return '';
    };
    // CKEditor
    var _componentCKEditor = function() {
        if (typeof CKEDITOR == 'undefined') {
            console.warn('Warning - ckeditor.js is not loaded.');
            return;
        }

        // Initialize
        CKEDITOR.replace('add-comment', {
            height: 200,
            removeButtons: 'Subscript,Superscript',
            toolbarGroups: [
                { name: 'styles' },
                { name: 'editing',     groups: [ 'find', 'selection' ] },
                { name: 'basicstyles', groups: [ 'basicstyles' ] },
                { name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'colors' },
                { name: 'tools' },
                { name: 'others' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] }
            ]
        });
    };

    // Lightbox
    var _componentFancybox = function() {
        if (!$().fancybox) {
            console.warn('Warning - fancybox.min.js is not loaded.');
            return;
        }

        // Image lightbox
        $('[data-popup="lightbox"]').fancybox({
            padding: 3
        });
    };

    // var handleFormSubmission = function() {
    //     var commentForm = document.getElementById('commentForm');

    //     if (commentForm) {
    //         commentForm.addEventListener('submit', function(event) {
    //             // Prevent the default form submission
    //             event.preventDefault();

    //             // Get CKEditor content
    //             var commentContent = getCKEditorContent();

    //             // Do something with the comment content (e.g., send it to the server)
    //             console.log('Comment Content:', commentContent);
    //             $.ajax({
    //                 type: 'POST',
    //                 url: commentForm.getAttribute('action'),
    //                 data: {
    //                     _token: '{{ csrf_token() }}', // Include CSRF token for Laravel
    //                     comment_content: commentContent
    //                 },
    //                 success: function(response) {
    //                     // Handle the success response if needed
    //                     console.log('Comment submitted successfully:', response);
    //                 },
    //                 error: function(error) {
    //                     // Handle the error if needed
    //                     console.error('Error submitting comment:', error);
    //                 }
    //             });
    //             // Continue with form submission if needed
    //             // commentForm.submit();
    //         });
    //     }
    // };
    var handleFormSubmission = function() {
        var commentForm = document.getElementById('commentForm');
    
        if (commentForm) {
            commentForm.addEventListener('submit', function(event) {
                // Prevent the default form submission
                event.preventDefault();
    
                // Get CKEditor content
                var commentContent = getCKEditorContent();
    
                // Set CKEditor content as the value of a hidden input
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'comment_content';
                hiddenInput.value = commentContent;
                commentForm.appendChild(hiddenInput);
    
                // Continue with form submission
                commentForm.submit();
            });
        }
    };
    

    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentCKEditor();
            _componentFancybox();
            
            handleFormSubmission();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    BlogSingle.init();
});
