<!-- Open Source Rich Text Editor (Jodit) Partial -->
<!-- Usage: add class="richtext" (full editor) or "richtext-simple" (minimal toolbar) to <textarea> elements -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.11/jodit.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.11/jodit.min.js"></script>

<style>
/* Adjust Jodit's appearance to match the sleek green admission theme */
.jodit-container {
    border-radius: 12px !important;
    border: 1px solid #e2e8f0 !important;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02) !important;
}
.jodit-toolbar__box {
    border-radius: 12px 12px 0 0 !important;
    background-color: #f8fafc !important;
    border-bottom: 1px solid #e2e8f0 !important;
}
.jodit-wysiwyg {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
    font-size: 15px !important;
    line-height: 1.7 !important;
    color: #1e293b !important;
    padding: 1.5rem !important;
}
.jodit-status-bar {
    border-radius: 0 0 12px 12px !important;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // ── Full Editor: for long-form content, page body, notice content ──
    const fullEditors = document.querySelectorAll('textarea.richtext');
    fullEditors.forEach(el => {
        Jodit.make(el, {
            height: 450,
            theme: 'default',
            placeholder: 'Start writing your content here...',
            buttons: [
                'source', '|',
                'bold', 'strikethrough', 'underline', 'italic', '|',
                'ul', 'ol', '|',
                'outdent', 'indent', '|',
                'font', 'fontsize', 'brush', 'paragraph', '|',
                'image', 'video', 'table', 'link', '|',
                'align', 'undo', 'redo', '|',
                'hr', 'eraser', 'fullsize'
            ],
            uploader: { 
                insertImageAsBase64URI: true 
            },
            showCharsCounter: false,
            showWordsCounter: false,
            showXPathInStatusbar: false
        });
    });

    // ── Simple Editor: for short descriptions, messages, excerpts ──
    const simpleEditors = document.querySelectorAll('textarea.richtext-simple');
    simpleEditors.forEach(el => {
        Jodit.make(el, {
            height: 250,
            theme: 'default',
            placeholder: 'Write a brief snippet...',
            buttons: [
                'bold', 'italic', 'underline', '|',
                'ul', 'ol', '|',
                'link', '|',
                'eraser', 'source'
            ],
            showCharsCounter: false,
            showWordsCounter: false,
            showXPathInStatusbar: false,
            toolbarAdaptive: false
        });
    });

    // ── Fix: Editor inside Bootstrap tabs needs re-initialization ──
    // When switching tabs (e.g. EN -> BN), trigger resize so the editor canvas draws correctly.
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function (tabBtn) {
        tabBtn.addEventListener('shown.bs.tab', function () {
            // Dispatch a global resize event to force Jodit to recalculate its bounds
            setTimeout(function() {
                window.dispatchEvent(new Event('resize'));
            }, 50);
        });
    });
});
</script>

