<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="close()"><span aria-hidden="true">&times;</span></button>
</div>

<div class="modal-body"
     flow-init="{ target: '/api/upload', singleFile: true, testChunks: true, query: { '_token':  '{{ csrf_token() }}', 'path': 'tmp'} }"
     flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
     flow-files-submitted="upload( $files, $event, $flow )"
     flow-file-success="success( $file, $message, $flow )"
     flow-file-error="error( $file, $message, $flow )"
     flow-error="error( $file, $message, $flow )" ng-controller="AuthController">
    <div>
        <div class="thumbnail" ng-show="$flow.files.length">
            <img flow-img="$flow.files[0]" class="img-responsive"/>
        </div>

        <div class="alert alert-warning profile-image-drop" ng-hide="$flow.files.length" flow-btn flow-attrs="{accept:'image/*'}" flow-drop flow-drag-enter="style={border:'4px solid red'}" flow-drag-leave="style={}" ng-style="style">
            Drag And Drop your file here
        </div>

        <p class="help-block">Only PNG,GIF,JPG files allowed.</p>

    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="close()">Close</button>
</div>
