@extends('theme.master')

@section('body')
    <main class="rbt-main-wrapper">

        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="rbt-course-field-wrapper rbt-default-form">

                            <div class="course-field mb--15">
                                <label for="field-1">Post Title</label>
                                <input id="field-1" type="text" placeholder="New Post">
                                <small class="d-block mt_dec--5"><i class="feather-info"></i> Title should be 30 characters.</small>
                            </div>

                            <div class="course-field mb--20">
                                <label for="field-4">Post Category</label>
                                <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                    <select class="w-100" id="field-4">
                                        @foreach (\App\Enums\PostCategory::asArray() as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small><i class="feather-info"></i> Post Category</small>
                            </div>

                            <div class="course-field mb--20">
                                <label for="field-4">Post Tag</label>
                                <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                    <select class="w-100" id="field-4">
                                        @foreach (\App\Enums\PostTag::asArray() as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small><i class="feather-info"></i> Post Tag</small>
                            </div>

                            <div class="course-field mb--20">
                                <label for="field-4">Post Content</label>
                                <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                    <textarea class="w-100" rows="3" name="note" id="myeditorinstance">Hello, World!</textarea>
                                </div>
                                <small><i class="feather-info"></i> Post Content</small>
                            </div>

                        </div>

                        <div class="mt--10 row g-5">
                            <div class="col-lg-4">
                                <a class="rbt-btn hover-icon-reverse bg-primary-opacity w-100 text-center" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Preview</span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <a class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Create Post</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="rbt-create-course-sidebar course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="section-title mb--30">
                                    <h4 class="title">Post Upload Tips</h4>
                                </div>
                                <div class="rbt-course-upload-tips">
                                    <ul class="rbt-list-style-1">
                                        <li><i class="feather-check"></i> Set the Post Title for 10 word max length
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="https://cdn.tiny.cloud/1/free/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            height: 270,
            plugins: 'advcode table checklist image advlist autolink lists link charmap preview codesample imagetool fullscreen',
            toolbar: 'insertfile | blocks| bold italic | fullscreen | image | link | preview | codesample | bullist numlist checklist |  alignleft aligncenter alignright',
            menubar: 'insert view',
            mobile: {
                menubar: true
            },
            setup: function(editor) {
                editor.on('init', function (e) {
                    setTimeout(function() {
                        $("button[tabindex='-1'].tox-notification__dismiss.tox-button.tox-button--naked.tox-button--icon")[0].click()
                    }, 10);

                })
            },
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input')
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*')
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader()
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime()
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache
                        var base64 = reader.result.split(',')[1]
                        var blobInfo = blobCache.create(id, file, base64)
                        blobCache.add(blobInfo)
                        cb(blobInfo.blobUri(), { title: file.name })
                    }
                    reader.readAsDataURL(file)
                }
                input.click()
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
@endsection
